<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\URL;
use App\Core\PasswordTools;

class SignupController extends Controller {
    private const SUCCESS_URL = '/signup/hello';


    public function view(): View {
        return view('/account/signup');
    }


    public function submit(Request $request): JsonResponse {
        $username = $request->input('username');
        $password = $request->input('hashedPassword');
        $email = $request->input('email');
        $request->session()->put('email', $email);
        $request->session()->put('password', $password);

        $body = [
            'url' => URL::to(self::SUCCESS_URL),
            'status' => "ok",
            'message' => "hi"
        ];

        return response()->json($body)->setStatusCode(200);
    }


    public function hello(Request $request): JsonResponse {
        $password = $request->session()->get('password', '');
        $body = [
            'url' => URL::to(self::SUCCESS_URL),
            "email" => sprintf('%s', $request->session()->get('email', '')),
            "hashedPassword" => sprintf('%s', $password),
            "hashedPasswordPHP" => sprintf('%s', PasswordTools::makeClientHash("test@example.com", "test-password")),
            "clientHashedPasswordFormatOk" => PasswordTools::validateClientHashedPasswordFormat($password),
            "status" => "ok"
        ];
        return response()->json($body);
    }
}
