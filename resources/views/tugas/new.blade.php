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