@extends("blank")
@section("konten")

<form action="{{route("update_dosen", ['id'=>$id])}}", method="post">
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
	<input type="text" name="nama" id="nama" value="{{$dosen['nama']}}">
	<br>
	<label>Foto	</label>
	<input type="text" name="foto" id="foto" value="{{$dosen['foto']}}">
	<br>
	<label>NIDN	</label>
	<input type="text" name="nidn" id="nidn" value="{{$dosen['nidn']}}">
	<br>
	<label>Hp	</label>
	<input type="text" name="hp" id="hp" value="{{$dosen['hp']}}">
	<br>
	<label>Pendidikan	</label>
	<input type="text" name="pendidikan" id="pendidikan" value="{{$dosen['pendidikan']}}">
	<br>

	<button type="submit">Simpan</button>

</form>

@endsection