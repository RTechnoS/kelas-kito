@extends("blank")
@section("konten")

@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

<form action="{{route("new_tugas")}}", method="post">
	@csrf
	<input hidden name="kelas_id" value="{{$id}}">
	<label>Tugas		</label>
	<input type="text" name="tugas" id="tugas">
	<br>
	<label>Soal	</label>
	<textarea class="form-control" id="summary-ckeditor" name="soal"></textarea>
	<br>

	<button type="submit">Simpan</button>

</form>

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace( 'summary-ckeditor' );
</script>
@endsection