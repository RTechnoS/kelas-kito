@extends("blank")
@section("konten")

<form action="{{route("update_tugas", ['id'=>$id])}}", method="post">
	@csrf
	@method("put")
	<label>Tugas		</label>
	<input type="text" name="tugas" id="tugas" value="{{$tugas['tugas']}}">
	<br>
	<label>Soal	</label>
	<textarea class="form-control" id="summary-ckeditor" name="soal">{{$tugas['soal']}}</textarea>
	<br>

	<button type="submit">Simpan</button>

</form>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace( 'summary-ckeditor' );
</script>
@endsection