<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CookieController extends Controller
{
    public function acceptCookies(Request $request) {
        $submitType = $request->input('submit-type');
        $expirationTime = 30 * 24 * 60;
        $data = $request->all();
        unset($data['submit-type']);
        $data['essential-cookies'] = true;

        switch ($submitType) {
            case 'accept-all-cookies':
                foreach($data as $key) {
                    $key = true;
                }
                return redirect()->back()->cookie('acceptedCookies', serialize($data), $expirationTime);

            case 'accept-only-essential-cookies':
                foreach($data as $key) {
                    if ($key != 'essential-cookies') {
                        $key = false;
                    }
                }
                return redirect()->back()->cookie('acceptedCookies', serialize($data), $expirationTime);

            case 'accept-customized-cookies':
                return redirect()->back()->cookie('acceptedCookies', serialize($data), $expirationTime);
        }
    }
}
