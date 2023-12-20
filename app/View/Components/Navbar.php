<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class Navbar extends Component
{

    /**
     * Create a new component instance.
     */
    public function __construct() {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $navbar = [
            "Home" => route('welcome')
        ];

        if (Auth::check()) {
            $navbar = array_merge($navbar, [
                "Watchlist" => URL::to("/watchlist"),
                "Profile" => route('user-profile')
            ]);
        } else {
            $navbar = array_merge($navbar, [
                "Login" => route('login')
            ]);
        }

        return view('components.navbar', ['navbarElements' => $navbar]);
    }


    public function shouldRender(): bool {
        return true;
    }
}
