@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif


<form action="{{route("new_jawaban")}}", method="post">
	@csrf
	<label>Users Id		</label>
	<input type="number" name="users_id" id="users_id">
	<br>
	<label>Tugas Id		</label>
	<input type="number" name="tugas_id" id="tugas_id">
	<br>
	<label>Isi	</label>
	<textarea name="isi" id="isi"></textarea>
	<br>

	<button type="submit">Simpan</button>

</form>