@extends("blank")
@section("konten")
<form action="{{route("update_mahasiswa", ['id'=>$id])}}", method="post">
	@csrf
	@method("put")
	<label>Username		</label>
	<input type="text" name="username" id="username" value="{{$user['username']}}">
	<br>
	<label>Email	</label>
	<input type="email" name="email" id="email" placeholder="Enter Email" value="{{$user['email']}}">
	<br>
	<hr>
	<label>Nama	</label>
	<input type="text" name="nama" id="nama" value="{{$mahasiswa['nama']}}">
	<br>
	<label>Foto	</label>
	<input type="text" name="foto" id="foto" value="{{$mahasiswa['foto']}}">
	<br>
	<label>NIM	</label>
	<input type="text" name="nim" id="nim" value="{{$mahasiswa['nim']}}">
	<br>
	<label>Hp	</label>
	<input type="text" name="hp" id="hp" value="{{$mahasiswa['hp']}}">
	<br>
	<label>Angkatan	</label>
	<input type="number" name="angkatan" id="angkatan" value="{{$mahasiswa['angkatan']}}">
	<br>

	<button type="submit">Simpan</button>

</form>
@endsection