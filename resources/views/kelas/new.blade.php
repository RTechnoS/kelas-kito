@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif


<form action="{{route("new_kelas")}}", method="post">
	@csrf
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