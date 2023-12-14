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
use App\Core\JsonResponseGen;

class AccountController extends Controller
{
    //
    //
    public function viewAccount(Request $request) {
        return view('account/user-edit');
    }
}
