@extends("blank")
@section("konten")

<form action="{{route("update_kelas", ['id'=>$id])}}", method="post">
	@csrf
	@method("put")
	<label>Kelas		</label>
	<input type="text" name="kelas" id="kelas" value="{{$kelas['kelas']}}">
	<br>
	<label>Deskripsi	</label>
	<textarea name="deskripsi" id="deskripsi">{{$kelas['deskripsi']}}</textarea>
	<br>
	<label>Foto	</label>
	<input type="text" name="foto" id="foto" value="{{$kelas['foto']}}">
	<br>

	<button type="submit">Simpan</button>

</form>

@endsection