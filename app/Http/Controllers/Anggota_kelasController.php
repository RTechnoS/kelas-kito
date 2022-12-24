<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Anggota_kelas;
use App\Models\Mahasiswa;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\TugasController;

class Anggota_kelasController extends Controller
{
    public function getMahasiswa($id){
        $data = Anggota_kelas::where('kelas_id', '=', $id)->get();
        $tess = ["mahasiswa"=>[], "dosen"=>[]];
        foreach($data as $d){
            #echo $d;
            $tmp = [];
            $tes = Mahasiswa::where('users_id', '=', $d->users_id)->first();
            if ($tes == null) {
                $tes = Dosen::where('users_id', '=', $d->users_id)->first();
                array_push($tmp, $tes);
                array_push($tess["dosen"], $tmp);
            }else{
                array_push($tmp, $tes);
                array_push($tess["mahasiswa"], $tmp);
            }
            
        }
        return $tess;
    }
    public function showDetail($id){
        $isi_kelas = $this->getMahasiswa($id);
        $detail_kelas = (new KelasController)->showDetail($id);
        $tugas = (new TugasController)->findFromKelas($id);
        #print_r($detail_kelas);
        $isi = ["detail"=>$detail_kelas, "isi_kelas"=>$isi_kelas, "tugas"=>$tugas];
        #dd($isi);
        return view("kelas.view_detail_kelas")->with('data_kelas', $isi);
    }

    public function joinKelas($kelasId, $userId){
        $data = new Anggota_kelas();
        $data->users_id = $userId;
        $data->kelas_id = $kelasId;
        $data->save();

        return $data;
    }
    
    public function findKelas(Request $request){
        #print($request->get("idKelas"));


        $cek_join = Anggota_kelas::where('kelas_id', '=', $request->get("idKelas"))->where('users_id', '=', auth()->user()->id)->first();
        if($cek_join == null){
            $join = $this->joinKelas($request->get("idKelas"), auth()->user()->id);
            print_r($join);
        }
        return redirect(route("show_kelas"));
        #dd($request);
        #Kelas::find($id);
        #return redirect(route(""));
    }
}
