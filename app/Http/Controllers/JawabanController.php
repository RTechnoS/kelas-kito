<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jawaban;
#use App\Http\Requests\UserRequest;

class JawabanController extends Controller
{
    public function showAll(){
        $data = Jawaban::all();
        return view("jawaban.view")->with('data_jawaban', $data);
    }

    public function formEdit($id){
        return view("jawaban.edit")->with('id', $id);
    }

    public function formNew(){
        return view("jawaban.new");
    }

    public function editJawaban(request $request, $id){
        $data = Jawaban::find($id);
        $data->users_id = $request->get("users_id");
        $data->tugas_id = $request->get("tugas_id");
        $data->isi = $request->get("isi");
        $data->save();
        return redirect(route("show_jawaban"));
    }

    public function newJawaban(request $request){
        $data = new Jawaban();
        $data->users_id = $request->get("users_id");
        $data->tugas_id = $request->get("tugas_id");
        $data->isi = $request->get("isi");
        $data->save();
        return redirect(route("show_jawaban"));
    }

    public function deleteJawaban($id){
        Jawaban::destroy($id);
        return redirect(route("show_jawaban"));
    }
}
