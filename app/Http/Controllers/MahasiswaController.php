<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
#use App\Http\Requests\UserRequest;

class MahasiswaController extends Controller
{
    public function showAll(){
        $data = Mahasiswa::all();
        return view("mahasiswa.view")->with('data_mahasiswa', $data);
    }

    public function formEdit($id){
        $mahasiswa = Mahasiswa::find($id);
        $user = User::find($mahasiswa->users_id);
        return view("mahasiswa.edit")->with(['id'=> $id, 'user'=>$user, 'mahasiswa'=>$mahasiswa]);
    }

    public function formNew(){
        return view("mahasiswa.new");
    }

    public function editMahasiswa(request $request, $id){
        $data = Mahasiswa::find($id);
        $data_user = User::find($data->users_id);

        $data_user->username = $request->get("username");
        $data_user->email = $request->get("email");
        $data_user->save();

        $data->nama = $request->get("nama");
        $data->foto = $request->get("foto");
        $data->nim = $request->get("nim");
        $data->hp = $request->get("hp");
        $data->angkatan = $request->get("angkatan");
        $data->save();
        return redirect(route("show_mahasiswa"));
    }

    public function newMahasiswa(request $request){
        $data_user = new User();
        $data_user->username = $request->get("username");
        $data_user->email = $request->get("email");
        $data_user->password = Hash::make($request->get("password"));
        $data_user->level = 3;
        $data_user->save();

        $data = new Mahasiswa();
        $data->users_id = $data_user->id;
        $data->nama = $request->get("nama");
        $data->foto = $request->get("foto");
        $data->nim = $request->get("nim");
        $data->hp = $request->get("hp");
        $data->angkatan = $request->get("angkatan");
        $data->save();
        return redirect(route("show_mahasiswa"));
    }

    public function deleteMahasiswa($id){
        Mahasiswa::destroy($id);
        return redirect(route("show_mahasiswa"));

    }
}
