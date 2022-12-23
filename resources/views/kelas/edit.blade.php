@extends("blank")
@section("konten")

<form action="{{route("update_kelas", ['id'=>$id])}}", method="post">
	@csrf
	@method("put")
	<label>Nama		</label>
	<input type="text" name="nama" id="nama">
	<br>
	<label>Deskripsi	</label>
	<textarea name="deskripsi" id="deskripsi"></textarea>
	<br>
	<label>Foto	</label>
	<input type="text" name="foto" id="foto">
	<br>

	<button type="submit">Simpan</button>

</form>

@endsection