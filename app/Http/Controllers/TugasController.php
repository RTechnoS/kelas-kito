<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tugas;
use App\Models\Anggota_kelas;
#use App\Http\Requests\UserRequest;

class TugasController extends Controller
{
    public function showAll(){
        #$data = Tugas::all();

        if(auth()->user()->level == 1){
            $data = Tugas::join('kelas', 'tugas.kelas_id', '=', 'kelas.id')->get(['kelas.kelas', 'tugas.*']);
        }elseif (auth()->user()->level == 2) {
            $data = Tugas::join('kelas', 'tugas.kelas_id', '=', 'kelas.id')->where('tugas.users_id', auth()->user()->id)->get(['kelas.kelas', 'tugas.*']);
        }elseif(auth()->user()->level == 3){
            $data = Anggota_kelas::join('mahasiswa', 'anggota_kelas.users_id', '=', 'mahasiswa.users_id')->join("kelas", "kelas.id", "=", "anggota_kelas.kelas_id")->join("tugas", "anggota_kelas.kelas_id", "=", "tugas.kelas_id")->where('anggota_kelas.users_id', auth()->user()->id)->get(['kelas.kelas','tugas.*', 'mahasiswa.nama']);
        }

        #dd($data);
        return view("tugas.view")->with('data_tugas', $data);
    }

    public function formEdit($id){
        $tugas = Tugas::find($id);
        return view("tugas.edit")->with(['id'=>$id, 'tugas'=>$tugas]);
    }

    public function formNew($id){
        return view("tugas.new")->with('id', $id);
    }

    public function editTugas(request $request, $id){
        $data = Tugas::find($id);
        $data->tugas = $request->get("tugas");
        $data->soal = $request->get("soal");
        $data->save();
        return redirect(route("show_tugas"));
    }

    public function newTugas(request $request){
        $data = new Tugas();
        $data->users_id = auth()->user()->id;
        $data->kelas_id = $request->get("kelas_id");
        $data->tugas = $request->get("tugas");
        $data->soal = $request->get("soal");
        $data->save();
        return redirect(route("show_tugas"));
    }

    public function deleteTugas($id){
        Tugas::destroy($id);
        return redirect(route("show_tugas"));
    }

    public function findFromKelas($kelas_id){
        $tes = Tugas::where('kelas_id', '=', $kelas_id)->get();
        #dd($tes);
        return $tes;
    }

    /*public function findFromUser($id){
        Tugas::destroy($id);
        return redirect(route("show_tugas"));
    }*/
}
