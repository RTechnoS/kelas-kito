<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Anggota_kelas;
#use App\Http\Requests\UserRequest;

class KelasController extends Controller
{
    public function showAll(){
        if(auth()->user()->level == 1){
            $data = Kelas::join('dosen', 'kelas.users_id', '=', 'dosen.users_id')->get(['kelas.*', 'dosen.nama']);
        }elseif (auth()->user()->level == 2) {
            $data = Kelas::join('anggota_kelas', 'kelas.id', '=', 'anggota_kelas.kelas_id')->join('dosen', 'kelas.users_id', '=', 'dosen.users_id')->where('anggota_kelas.users_id', auth()->user()->id)->get(['kelas.*', 'dosen.nama']);
        }elseif(auth()->user()->level == 3){
            $data = Anggota_kelas::join('mahasiswa', 'anggota_kelas.users_id', '=', 'mahasiswa.users_id')->join("kelas", "anggota_kelas.kelas_id", "=", "kelas.id")->where('anggota_kelas.users_id', auth()->user()->id)->join('dosen', 'kelas.users_id', '=', 'dosen.users_id')->get(['kelas.*', 'dosen.nama']);
        }

        #dd($data);
        return view("kelas.view")->with('data_kelas', $data);
    }

    public function showDetail($id){
        $data = Kelas::join('dosen', 'kelas.users_id', '=', 'dosen.users_id')->where('kelas.id', $id)->get(['kelas.*', 'dosen.nama']);
        return $data;
    }

    public function formEdit($id){
        $kelas = Kelas::find($id);
        return view("kelas.edit")->with(['id'=> $id, 'kelas'=>$kelas]);
    }

    public function formNew(){
        return view("kelas.new");
    }

    public function editKelas(request $request, $id){
        $data = Kelas::find($id);
        $data->kelas = $request->get("kelas");
        $data->deskripsi = $request->get("deskripsi");
        $data->foto = $request->get("foto");
        $data->save();
        return redirect(route("show_kelas"));
    }

    public function newKelas(request $request){
        $data = new Kelas();
        $data->users_id = auth()->user()->id;
        $data->kelas = $request->get("kelas");
        $data->deskripsi = $request->get("deskripsi");
        $data->foto = $request->get("foto");
        $data->save();

        $data_kelas = new Anggota_kelas();
        $data_kelas->users_id = auth()->user()->id;
        $data_kelas->kelas_id = $data->id;
        $data_kelas->save();

        return redirect(route("show_kelas"));
    }

    public function deleteKelas($id){
        Kelas::destroy($id);
        return redirect(route("show_kelas"));
    }

}
