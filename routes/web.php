<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestingController;
use App\Http\Controllers\SecurityController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\JawabanController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\Anggota_kelasController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name("index");


Route::middleware("auth")->group(function() {
    ## User CRUD
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name("dashboard");

    Route::get('/dashboard/user', [UserController::class, "showAll"])->name("show_user");
    Route::get('/dashboard/user/edit/{id}', [UserController::class, "formEdit"])->name("form_edit_user");
    Route::put('/dashboard/user/edit/save/{id}', [UserController::class, "editUser"])->name("update_user");
    Route::get('/dashboard/user/new', [UserController::class, "formNew"])->name("form_new_user");
    Route::post('/dashboard/user/new/save', [UserController::class, "newUser"])->name("new_user");
    Route::delete('/dashboard/user/delete/{id}', [UserController::class, "deleteUser"])->name("delete_user");


    ## Mahasiswa CRUD
    Route::get('/dashboard/mahasiswa', [MahasiswaController::class, "showAll"])->name("show_mahasiswa");
    Route::get('/dashboard/mahasiswa/edit/{id}', [MahasiswaController::class, "formEdit"])->name("form_edit_mahasiswa");
    Route::put('/dashboard/mahasiswa/edit/save/{id}', [MahasiswaController::class, "editUser"])->name("update_mahasiswa");
    Route::get('/dashboard/mahasiswa/new', [MahasiswaController::class, "formNew"])->name("form_new_mahasiswa");
    Route::post('/dashboard/mahasiswa/new/save', [MahasiswaController::class, "newUser"])->name("new_mahasiswa");
    Route::delete('/dashboard/mahasiswa/delete/{id}', [MahasiswaController::class, "deleteUser"])->name("delete_mahasiswa");


    ## Dosen CRUD
    Route::get('/dashboard/dosen', [DosenController::class, "showAll"])->name("show_dosen");
    Route::get('/dashboard/dosen/edit/{id}', [DosenController::class, "formEdit"])->name("form_edit_dosen");
    Route::put('/dashboard/dosen/edit/save/{id}', [DosenController::class, "editDosen"])->name("update_dosen");
    Route::get('/dashboard/dosen/new', [DosenController::class, "formNew"])->name("form_new_dosen");
    Route::post('/dashboard/dosen/new/save', [DosenController::class, "newDosen"])->name("new_dosen");
    Route::delete('/dashboard/dosen/delete/{id}', [DosenController::class, "deleteDosen"])->name("delete_dosen");


    ## Kelas CRUD
    Route::get('/dashboard/kelas', [KelasController::class, "showAll"])->name("show_kelas");
    Route::get('/dashboard/kelas/edit/{id}', [KelasController::class, "formEdit"])->name("form_edit_kelas");
    Route::put('/dashboard/kelas/edit/save/{id}', [KelasController::class, "editKelas"])->name("update_kelas");
    Route::get('/dashboard/kelas/new', [KelasController::class, "formNew"])->name("form_new_kelas");
    Route::post('/dashboard/kelas/new/save', [KelasController::class, "newKelas"])->name("new_kelas");
    Route::delete('/dashboard/kelas/delete/{id}', [KelasController::class, "deleteKelas"])->name("delete_kelas");

        ## Kelas semua anggota
        Route::get('/dashboard/kelas/member/{id}', [Anggota_kelasController::class, "showAnggota"])->name("show_anggota_kelas");


    ## Tugas CRUD
    Route::get('/dashboard/tugas', [TugasController::class, "showAll"])->name("show_tugas");
    Route::get('/dashboard/tugas/edit/{id}', [TugasController::class, "formEdit"])->name("form_edit_tugas");
    Route::put('/dashboard/tugas/edit/save/{id}', [TugasController::class, "editTugas"])->name("update_tugas");
    Route::get('/dashboard/tugas/new', [TugasController::class, "formNew"])->name("form_new_tugas");
    Route::post('/dashboard/tugas/new/save', [TugasController::class, "newTugas"])->name("new_tugas");
    Route::delete('/dashboard/tugas/delete/{id}', [TugasController::class, "deleteTugas"])->name("delete_tugas");


    ## Jawaban CRUD
    Route::get('/dashboard/jawaban', [JawabanController::class, "showAll"])->name("show_jawaban");
    Route::get('/dashboard/jawaban/edit/{id}', [JawabanController::class, "formEdit"])->name("form_edit_jawaban");
    Route::put('/dashboard/jawaban/edit/save/{id}', [JawabanController::class, "editJawaban"])->name("update_jawaban");
    Route::get('/dashboard/jawaban/new', [JawabanController::class, "formNew"])->name("form_new_jawaban");
    Route::post('/dashboard/jawaban/new/save', [JawabanController::class, "newJawaban"])->name("new_jawaban");
    Route::delete('/dashboard/jawaban/delete/{id}', [JawabanController::class, "deleteJawaban"])->name("delete_jawaban");

    Route::get("/logout", [SecurityController::class, "logout"])->name("logout");
});


Route::get("/login", [SecurityController::class, "formLogin"])->name("login");
Route::post("/process-login", [SecurityController::class,"processLogin"])->name("process_login");



