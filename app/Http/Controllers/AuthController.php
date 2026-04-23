<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials)){

            $user = Auth::user();

            if($user->usertype == 'master'){
                return redirect()->away('https://documentation.officelescloud.sizaf.com/master/books');
            }

            if($user->usertype == 'partner'){
                return redirect()->away('https://documentation.officelescloud.sizaf.com/Partner/books');
            }

            if($user->usertype == 'company'){
                return redirect()->away('https://documentation.officelescloud.sizaf.com/company/books');
            }

            if($user->usertype == 'user'){
                return redirect()->away('https://documentation.officelescloud.sizaf.com/user/books');
            }

        }

        return back()->with('error','Invalid login details');

    }

}
