@extends("blank")
@section("konten")

<form action="{{route("update_tugas", ['id'=>$id])}}", method="post">
	@csrf
	@method("put")
	<label>Users Id		</label>
	<input type="number" name="users_id" id="users_id">
	<br>
	<label>Nama		</label>
	<input type="text" name="nama" id="nama">
	<br>
	<label>Tugas	</label>
	<textarea name="tugas" id="tugas"></textarea>
	<br>

	<button type="submit">Simpan</button>

</form>

@endsection