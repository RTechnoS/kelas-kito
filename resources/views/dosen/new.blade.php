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


<form action="{{route("new_dosen")}}", method="post">
	@csrf
	<label>username		</label>
	<input type="text" name="username" id="username">
	<br>
	<label>Email	</label>
	<input type="email" name="email" id="email" placeholder="Enter Email">
	<br>
	<label>Password	</label>
	<input type="password" name="password" id="password">
	<br>
	<hr>
	<label>Nama	</label>
	<input type="text" name="nama" id="nama">
	<br>
	<label>Foto	</label>
	<input type="text" name="foto" id="foto">
	<br>
	<label>NIDN	</label>
	<input type="text" name="nidn" id="nidn">
	<br>
	<label>Hp	</label>
	<input type="text" name="hp" id="hp">
	<br>
	<label>Pendidikan	</label>
	<input type="text" name="pendidikan" id="pendidikan">
	<br>

	<button type="submit">Simpan</button>

</form>

@endsection