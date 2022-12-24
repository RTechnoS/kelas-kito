<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\User;
#use App\Http\Requests\UserRequest;

class DosenController extends Controller
{
    public function showAll(){
        $data = Dosen::all();
        return view("dosen.view")->with('data_dosen', $data);
    }

    public function formEdit($id){
        $dosen = Dosen::find($id);
        $user = User::find($dosen->users_id);
        return view("dosen.edit")->with(['id'=>$id, 'user'=>$user, 'dosen'=>$dosen]);
    }

    public function formNew(){
        return view("dosen.new");
    }

    public function editDosen(request $request, $id){
        $data = Dosen::find($id);
        $data_user = User::find($data->users_id);

        $data_user->username = $request->get("username");
        $data_user->email = $request->get("email");
        $data_user->password = Hash::make($request->get("password"));
        $data_user->save();
        
        $data->nama = $request->get("nama");
        $data->foto = $request->get("foto");
        $data->nidn = $request->get("nidn");
        $data->hp = $request->get("hp");
        $data->pendidikan = $request->get("pendidikan");
        $data->save();
        return redirect(route("show_dosen"));
    }

    public function newDosen(request $request){
        $data_user = new User();
        $data_user->username = $request->get("username");
        $data_user->email = $request->get("email");
        $data_user->password = $request->get("password");
        $data_user->level = 2;
        $data_user->save();


        $data = new Dosen();
        $data->users_id = $data_user->id;
        $data->nama = $request->get("nama");
        $data->foto = $request->get("foto");
        $data->nidn = $request->get("nidn");
        $data->hp = $request->get("hp");
        $data->pendidikan = $request->get("pendidikan");
        $data->save();
        return redirect(route("show_dosen"));
    }

    public function deleteDosen($id){
        Dosen::destroy($id);
        return redirect(route("show_dosen"));
    }
}
