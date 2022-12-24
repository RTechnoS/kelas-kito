<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;// import model user

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SecurityController extends Controller
{
    public function formLogin()
    {
        return view("security.login");
    }

    public function processLogin(Request $request)
    {
        $login = false;
        $get_user = $request->get("user");
        #$password = Hash::make($request->get("password"));
        
        $user = User::where('username', $get_user)->first();
        
        if ($user == null) {
            $user = User::where('email', $get_user)->first();
        }

        #dd($user_detail);
        if ($user != null) {
            if(Hash::check($request->get("password"), $user['password'])){

                if($user->level == 1){
                    $user_detail = User::join("operator", "users.id", "=", "operator.users_id")->where("operator.users_id",$user->id)->get(["users.id","operator.nama","operator.foto", "operator.hp","users.username", "users.email", "users.level"])->first();
                }elseif($user->level == 2){
                    $user_detail = User::join("dosen", "users.id", "=", "dosen.users_id")->where("dosen.users_id",$user->id)->get(["users.id","dosen.nama","dosen.foto", "dosen.hp","users.id","users.username", "users.email", "users.level"])->first();
                }elseif($user->level == 3){
                    $user_detail = User::join("mahasiswa", "users.id", "=", "mahasiswa.users_id")->where("mahasiswa.users_id",$user->id)->get(["users.id","mahasiswa.nama","mahasiswa.foto", "mahasiswa.hp","users.username", "users.email", "users.level"])->first();
                }
                print($user);
                print($user_detail);

                Auth::login($user_detail);
                #dd(auth()->user());
                return redirect(route("dashboard"));
            }else{
                return back();
            }
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
