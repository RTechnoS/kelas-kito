<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;// import model user

use Illuminate\Support\Facades\Auth;

class SecurityController extends Controller
{
    public function formLogin()
    {
        return view("security.form-login");
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
            return "Login Berhasil";
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
