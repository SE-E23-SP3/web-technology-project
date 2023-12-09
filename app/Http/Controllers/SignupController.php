<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

use Illuminate\View\View;
use Illuminate\Support\Facades\URL;

use App\Core\PasswordTools;
use App\Core\InputType;
use App\Core\JsonResponseGenerator;

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


        $request->session()->put('email', $email);
        $request->session()->put('password', $password);
        $request->session()->put('username', $username);

        $body = [
            'url' => URL::to(self::SUCCESS_URL),
            'message' => "hi"
        ];

        return response()->json($body)->setStatusCode(Response::HTTP_OK);
    }


    public function hello(Request $request): JsonResponse {
        $password = $request->session()->get('password', '');
        $email = $request->session()->get('email', '');
        $username = $request->session()->get('username');
        $body = [
            'url' => URL::to(self::SUCCESS_URL),
            "email" => sprintf('%s', $email),
            "hashedPassword" => sprintf('%s', $password),
            "hashedPasswordPHP" => sprintf('%s', PasswordTools::makeClientHash("test@example.com", "test-password")),
            "clientHashedPasswordFormatOk" => InputType::isValidClientHashedPasswordFormat($password),
            "type" => InputType::interpretType($email),
            "status" => "ok"
        ];
        $body["test"] = "Hello world";
        return response()->json($body);
    }
}
