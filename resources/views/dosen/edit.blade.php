<form action="{{route("update_dosen", ['id'=>$id])}}", method="post">
	@csrf
	@method("put")
	<label>Users Id		</label>
	<input type="number" name="users_id" id="users_id">
	<br>
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