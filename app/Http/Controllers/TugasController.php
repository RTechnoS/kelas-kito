<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tugas;
#use App\Http\Requests\UserRequest;

class TugasController extends Controller
{
    public function showAll(){
        $data = Tugas::all();
        return view("tugas.view")->with('data_tugas', $data);
    }

    public function formEdit($id){
        return view("tugas.edit")->with('id', $id);
    }

    public function formNew(){
        return view("tugas.new");
    }

    public function editTugas(request $request, $id){
        $data = Tugas::find($id);
        $data->users_id = $request->get("users_id");
        $data->nama = $request->get("nama");
        $data->tugas = $request->get("tugas");
        $data->save();
        return redirect(route("show_tugas"));
    }

    public function newTugas(request $request){
        $data = new Tugas();
        $data->users_id = $request->get("users_id");
        $data->nama = $request->get("nama");
        $data->tugas = $request->get("tugas");
        $data->save();
        return redirect(route("show_tugas"));
    }

    public function deleteTugas($id){
        Tugas::destroy($id);
        return redirect(route("show_tugas"));
    }
}
