<?php 
use App\Models\User;
use Illuminate\Support\Facades\Auth;
 ?>
<center>
<a href="<?php echo route("show_user") ?>">User</a> |
<a href="<?php echo route("show_mahasiswa") ?>">Mahasiswa</a> |
<a href="<?php echo route("show_dosen") ?>">Dosen</a> |
<a href="<?php echo route("show_kelas") ?>">Kelas</a> |
<a href="<?php echo route("show_tugas") ?>">Tugas</a> |
<a href="<?php echo route("show_jawaban") ?>">Jawaban</a> |
@if(Auth::check())
	<a href="<?php echo route("logout") ?>">Logout</a> |
@else
	<a href="<?php echo route("login") ?>">Login</a> |
@endif
</center>