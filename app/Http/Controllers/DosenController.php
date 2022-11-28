<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
#use App\Http\Requests\UserRequest;

class DosenController extends Controller
{
    public function showAll(){
        $data = Dosen::all();
        return view("dosen.view")->with('data_dosen', $data);
    }

    public function formEdit($id){
        return view("dosen.edit")->with('id', $id);
    }

    public function formNew(){
        return view("dosen.new");
    }

    public function editDosen(request $request, $id){
        $data = Dosen::find($id);
        $data->users_id = $request->get("users_id");
        $data->nama = $request->get("nama");
        $data->foto = $request->get("foto");
        $data->nidn = $request->get("nidn");
        $data->hp = $request->get("hp");
        $data->pendidikan = $request->get("pendidikan");
        $data->save();
        return redirect(route("show_dosen"));
    }

    public function newDosen(request $request){
        $data = new Dosen();
        $data->users_id = $request->get("users_id");
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
