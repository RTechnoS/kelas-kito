<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;// import model user

use Illuminate\Support\Facades\Auth;

class SecurityController extends Controller
{
    public function formLogin()
    {
        return view("security.login");
    }

    public function processLogin(Request $request)
    {
        $get_user = $request->get("user");
        $password = $request->get("password");
        $user = User::where('username', $get_user)->where("password", $password)->first();
        if ($user == null) {
            $user = User::where('email', $get_user)->where("password", $password)->first();
        }

        if ($user != null) {
            Auth::login($user);
            return redirect(route("dashboard"));
        } else {
            return back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route("login"));
    }



}
