<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

use Illuminate\View\View;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Core\PasswordTools;
use App\Core\InputType;
use App\Core\JsonResponseGenerator;

use App\Models\User;

class SignupController extends Controller {
    private const SUCCESS_URL = '/signup/hello';


    public function view(): View {
        return view('/account/signup');
    }


    public function submit(Request $request): JsonResponse {
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


        $body = [
            'url' => URL::to(self::SUCCESS_URL),
            'message' => "ok"
        ];

        return response()->json($body)->setStatusCode(Response::HTTP_CREATED);
    }


    public function hello(Request $request): JsonResponse {
        $user = Auth::user();
        $body = [
            "user" => $user,
            "status" => "ok"
        ];
        $body["test"] = "Hello world";
        return response()->json($body);
    }
}
