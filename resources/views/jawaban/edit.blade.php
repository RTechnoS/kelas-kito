@extends("blank")
@section("konten")
<form action="{{route("update_jawaban", ['id'=>$id])}}", method="post">
	@csrf
	@method("put")

	<label>Isi	</label>
	<textarea name="isi" id="isi">{{$jawaban['isi']}}</textarea>
	<br>

	<button type="submit">Simpan</button>

</form>
@endsection