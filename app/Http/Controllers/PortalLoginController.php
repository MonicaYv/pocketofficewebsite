<?php

namespace App\Http\Controllers;
use App\Models\users_data;
use App\Models\UsersData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PortalLoginController extends Controller
{

    public function showLogin()
    {
        return view('docs-login');
    }

public function login(Request $request)
{

    $email = $request->email;
    $password = $request->password;

    $user = UsersData::where('email',$email)->first();

    if($user){

        Auth::login($user);

        if($user->userType == 'master'){
            return redirect('https://documentation.pocketoffice.sizaf.com/master/');
        }

        if($user->userType == 'partner'){
            return redirect('/Partner/books');
        }

        if($user->userType == 'company'){
            return redirect('/company/books');
        }

        if($user->userType == 'user'){
            return redirect('https://documentation.pocketoffice.sizaf.com/user/books');
        }

    }

    return back()->with('error','Invalid email or password');
}

}