<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
#use App\Http\Requests\UserRequest;

class MahasiswaController extends Controller
{
    public function showAll(){
        $data = Mahasiswa::all();
        return view("mahasiswa.view")->with('data_mahasiswa', $data);
    }

    public function formEdit($id){
        return view("mahasiswa.edit")->with('id', $id);
    }

    public function formNew(){
        return view("mahasiswa.new");
    }

    public function editMahasiswa(request $request, $id){
        $data = Mahasiswa::find($id);
        $data->users_id = $request->get("users_id");
        $data->nama = $request->get("nama");
        $data->foto = $request->get("foto");
        $data->nim = $request->get("nim");
        $data->hp = $request->get("hp");
        $data->angkatan = $request->get("angkatan");
        $data->save();
        return redirect(route("show_mahasiswa"));
    }

    public function newUser(request $request){
        $data = new Mahasiswa();
        $data->users_id = $request->get("users_id");
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
