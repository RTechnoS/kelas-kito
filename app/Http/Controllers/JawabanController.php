<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jawaban;
use App\Models\Tugas;
#use App\Http\Requests\UserRequest;

class JawabanController extends Controller
{
    public function showAll(){
        #$data = Jawaban::all();
        if (auth()->user()->level == 1) {
            $jawaban = Jawaban::join("tugas", "jawaban.tugas_id", "=", "tugas.id")->join("mahasiswa", "jawaban.users_id", "=", "mahasiswa.users_id")->join("kelas", "tugas.kelas_id", "=", "kelas.id")->get(["jawaban.*","tugas.tugas","tugas.soal","mahasiswa.nama", "kelas.kelas"]);
        }elseif(auth()->user()->level == 2){
            $jawaban = Jawaban::join("tugas", "jawaban.tugas_id", "=", "tugas.id")->join("mahasiswa", "jawaban.users_id", "=", "mahasiswa.users_id")->join("kelas", "tugas.kelas_id", "=", "kelas.id")->where("tugas.users_id", auth()->user()->id)->get(["jawaban.*","tugas.tugas","tugas.soal","mahasiswa.nama", "kelas.kelas"]);
        }else{
            $jawaban = Jawaban::join("tugas", "jawaban.tugas_id", "=", "tugas.id")->join("mahasiswa", "jawaban.users_id", "=", "mahasiswa.users_id")->join("kelas", "tugas.kelas_id", "=", "kelas.id")->where("jawaban.users_id", auth()->user()->id)->get(["jawaban.*","tugas.tugas","tugas.soal","mahasiswa.nama", "kelas.kelas"]);
        }
        
        #dd($jawaban);
        return view("jawaban.view")->with('data_jawaban', $jawaban);
    }

    public function formEdit($id){
        $jawaban = Jawaban::find($id);
        return view("jawaban.edit")->with(['id'=>$id, 'jawaban'=>$jawaban]);
    }

    public function formNew($id){
        $tugas = Tugas::find($id);
        return view("jawaban.new")->with(['id'=>$id, 'tugas' => $tugas]);
    }

    public function showJawabanTugas($id){
        $jawaban = Jawaban::join("tugas", "jawaban.tugas_id", "=", "tugas.id")->join("mahasiswa", "jawaban.users_id", "=", "mahasiswa.users_id")->join("kelas", "tugas.kelas_id", "=", "kelas.id")->where("jawaban.tugas_id", $id)->get(["jawaban.*","tugas.tugas","tugas.soal","mahasiswa.nama", "kelas.kelas"]);

        #dd($jawaban);
        return view("jawaban.list")->with(['id'=>$id, 'data_jawaban'=>$jawaban]);
    }

    public function editJawaban(request $request, $id){
        $data = Jawaban::find($id);
        $data->isi = $request->get("isi");
        $data->save();
        return redirect(route("show_jawaban"));
    }

    public function newJawaban(request $request){
        $data = new Jawaban();
        $data->users_id = auth()->user()->id;
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
