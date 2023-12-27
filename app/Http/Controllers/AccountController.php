<?php
declare(strict_types=1);

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;

use Illuminate\View\View;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

use App\Core\PasswordTools;
use App\Core\InputType;
use App\Core\JsonResponseGenerator;
use App\Core\Hotp;

use App\Enums\HotpAlgorithms;

use App\Http\Controllers\AuthController;

use App\Models\User;
use App\Models\Totp;


class AccountController extends Controller {
    private const SUCCESS_URL = '/';

    private static function generateSucessResponse(Request $request, ?String $url = NULL): JsonResponse {
        // https://laraveldaily.com/post/auth-after-registration-redirect-to-previous-intended-page
        return new JsonResponse([
            'url' => $url ?? URL::to(self::SUCCESS_URL),
            'message' => "ok"
        ], Response::HTTP_ACCEPTED);
    }

    public function viewAccount(Request $request): View {
        return view('account/user-edit');
    }

    public function updateUsername(Request $request): JsonResponse {
        $username = AuthController::normalizeUsername($request->input('username', ""));
        $user = Auth::user();
        if ($user->username == $username) return JsonResponseGenerator::ok();

        if (!InputType::isValidUsernameFormat($username)) {
            return JsonResponseGenerator::badRequest();
        }


        if (User::where("username", $username)->count() != 0) {
            return JsonResponseGenerator::badRequest("User: taken");
        }

        DB::transaction(function() use ($user, $username) {
            $user->username = $username;
            $user->save();
        });

        return JsonResponseGenerator::accepted();
    }


    public function updateEmail(Request $request): JsonResponse {
        $user = Auth::user();
        $newEmail = AuthController::normalizeEmail($request->input('newEmail', ""));
		$passwordHashedWithOldEmail = $request->input("passwordHashedWithOldEmail", "");
		$passwordHashedWithNewEmail = $request->input('passwordHashedWithNewEmail', '');
        if ($user->email == $newEmail) return JsonResponseGenerator::ok();

        if (!(InputType::isValidClientHashedPasswordFormat($passwordHashedWithOldEmail) && InputType::isValidClientHashedPasswordFormat($passwordHashedWithNewEmail) && InputType::isValidEmailFormat($newEmail))) {
            return JsonResponseGenerator::badRequest();
        }



        if (User::where("email", $newEmail)->count() != 0) {
            return JsonResponseGenerator::badRequest("Email: taken");
        }


        if (!Hash::check($passwordHashedWithOldEmail, $user->password)) {
            return JsonResponseGenerator::unauthorized();
        }


        DB::transaction(function() use ($user, $newEmail, $passwordHashedWithNewEmail) {
            $user->email = $newEmail;
            $user->password = Hash::make($passwordHashedWithNewEmail);
            $user->save();
        });

        return JsonResponseGenerator::accepted();
    }


    public function updatePassword(Request $request): JsonResponse {
        $user = Auth::user();
		$oldPassword = $request->input('oldPassword', '');
		$newPassword = $request->input('newPassword', '');

        if (!(InputType::isValidClientHashedPasswordFormat($oldPassword) && InputType::isValidClientHashedPasswordFormat($newPassword))) {
            return JsonResponseGenerator::badRequest();
        }

        if (!Hash::check($oldPassword, $user->password)) {
            return JsonResponseGenerator::unauthorized();
        }


        DB::transaction(function() use ($user, $newPassword) {
            $user->password = Hash::make($newPassword);
            $user->save();
        });

        return JsonResponseGenerator::accepted();
    }

    public function deleteUser(Request $request): JsonResponse {
        DB::transaction(function() {
            Auth::user()->delete();
        });

        return self::generateSucessResponse($request, URL::to("logout"));
    }



    public function debug(Request $request): JsonResponse {
        return abort(Response::HTTP_NOT_FOUND); // comment out for debug

        $user = Auth::user();
        $body = [
            "user" => $user,
            "status" => "ok"
        ];
        $body["test"] = "Hello world";
        return response()->json($body);
    }


    public function enabletfa(Request $request): JsonResponse {
        $user = Auth::user();
		$password = $request->input('password', '');
		$totpSecret = $request->input('totpSecret', '');
		$totpVerificationCode = $request->input('totpVerificationCode', '');

        if ($user->totp !== NULL) {
            return JsonResponseGenerator::badRequest("Totp: already set");
        }

        if (!(InputType::isValidClientHashedPasswordFormat($password) && InputType::isValidTotpSecret($totpSecret))) {
            return JsonResponseGenerator::badRequest();
        }

        if (!Hash::check($password, $user->password)) {
            return JsonResponseGenerator::unauthorized();
        }

        $totp = new Totp(["encrypted_secret" => Crypt::encryptString($totpSecret)]);
        $totp->user()->associate($user);

        if (!$totp->validate($totpVerificationCode)) {
            $res = JsonResponseGenerator::badRequest("Totp: invalid verification code");
            $totp->discardChanges();
            return $res;
        }

        $totp->save();

        return JsonResponseGenerator::accepted();
    }
}
