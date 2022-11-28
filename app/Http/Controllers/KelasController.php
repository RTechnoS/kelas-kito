<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
#use App\Http\Requests\UserRequest;

class KelasController extends Controller
{
    public function showAll(){
        $data = Kelas::all();
        return view("kelas.view")->with('data_kelas', $data);
    }

    public function formEdit($id){
        return view("kelas.edit")->with('id', $id);
    }

    public function formNew(){
        return view("kelas.new");
    }

    public function editKelas(request $request, $id){
        $data = Kelas::find($id);
        $data->nama = $request->get("nama");
        $data->deskripsi = $request->get("deskripsi");
        $data->foto = $request->get("foto");
        $data->save();
        return redirect(route("show_kelas"));
    }

    public function newKelas(request $request){
        $data = new Kelas();
        $data->nama = $request->get("nama");
        $data->deskripsi = $request->get("deskripsi");
        $data->foto = $request->get("foto");
        $data->save();
        return redirect(route("show_kelas"));
    }

    public function deleteKelas($id){
        Kelas::destroy($id);
        return redirect(route("show_kelas"));
    }
}
