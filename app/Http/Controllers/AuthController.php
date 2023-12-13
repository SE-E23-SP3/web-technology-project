<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;

use Illuminate\View\View;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Core\PasswordTools;
use App\Core\InputType;
use App\Core\JsonResponseGenerator;

use App\Models\User;

class AuthController extends Controller {
    private const SUCCESS_URL = '/';

    private static function generateSucessResponse(Request $request): JsonResponse {
        // https://laraveldaily.com/post/auth-after-registration-redirect-to-previous-intended-page
        return new JsonResponse([
            'url' => $request->session()->pull('url.intended', URL::to(self::SUCCESS_URL)),
            'message' => "ok"
        ], Response::HTTP_ACCEPTED);
    }

    public function submitLogin(Request $request): JsonResponse {
        $password = $request->input('hashedPassword', "");
        $email = $request->input('email', "");
        if (!(InputType::isValidClientHashedPasswordFormat($password) && InputType::isValidEmailFormat($email))) {
            return JsonResponseGenerator::badRequest();
        }

        $user = User::where('email', $email)->first();
        if ($user == NULL) {
            Hash::make($password); // calculate hash, as to avoid tmining analysis
            return JsonResponseGenerator::unauthorized();
        }

        if (!Hash::check($password, $user->password)) {
            return JsonResponseGenerator::unauthorized();
        }


        Auth::login($user, $remember = true);


        return self::generateSucessResponse($request);
    }

    public function viewLogin(): View {
        return view('/account/login');
    }




    public function viewSignup(): View {
        return view('/account/signup');
    }


    public function submitSignup(Request $request): JsonResponse {
        $username = $request->input('username', "");
        $password = $request->input('hashedPassword', "");
        $email = $request->input('email', "");

        if (!(InputType::isValidClientHashedPasswordFormat($password) && InputType::isValidEmailFormat($email) && InputType::isValidUsernameFormat($username))) {
            return JsonResponseGenerator::badRequest();
        }

        if (User::where("username", $username)->count() != 0) {
            return JsonResponseGenerator::badRequest("User: taken");
        }
        if (User::where("email", $email)->count() != 0) {
            return JsonResponseGenerator::badRequest("Email: taken");
        }


        $user = new User([
            'email' => $email,
            'username' => $username,
            'password' => Hash::make($password)
        ]);

        $user->save();

        Auth::login($user, $remember = true);


        return self::generateSucessResponse($request);
    }


    public function hello(Request $request): JsonResponse {
        return abort(Response::HTTP_NOT_FOUND); // comment out for debug

        $user = Auth::user();
        $body = [
            "user" => $user,
            "status" => "ok"
        ];
        $body["test"] = "Hello world";
        return response()->json($body);
    }

    public function logout(Request $request): RedirectResponse {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
