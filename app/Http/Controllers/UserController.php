<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function showAll(){
        $data = User::all();
        return view("user.view_user")->with('data_user', $data);
    }

    public function formEdit($id){
        return view("user.edit_user")->with('id', $id);
    }

    public function formNew(){
        return view("user.new_user");
    }

    public function editUser(UserRequest $request, $id){
        $data = User::find($id);
        $data->username = $request->get("username");
        $data->email = $request->get("email");
        $data->password = $request->get("password");
        $data->level = $request->get("level");
        $data->save();
        return redirect(route("show_user"));
    }

    public function newUser(UserRequest $request){
        $data = new User();
        $data->username = $request->get("username");
        $data->email = $request->get("email");
        $data->password = $request->get("password");
        $data->level = $request->get("level");
        $data->save();
        return redirect(route("show_user"));
    }

    public function deleteUser($id){
        User::destroy($id);
        return redirect(route("show_user"));

    }
}
