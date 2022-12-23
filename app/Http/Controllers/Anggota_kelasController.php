<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota_kelas;
use App\Models\Dosen;
use App\Models\Mahasiswa;

class Anggota_kelasController extends Controller
{
    public function showAnggota($id){
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
        #dd($tess);
        return view('kelas.view_anggota_kelas')->with('data_anggota_kelas', $tess);
    }
}
