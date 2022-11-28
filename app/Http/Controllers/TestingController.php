<?php 

namespace App\Http\Controllers;

class TestingController extends Controller{
	public function CallTes($nama){
		return view("tes")
		->with("nama", $nama);
	}
}

?>