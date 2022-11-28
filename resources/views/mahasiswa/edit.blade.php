<form action="{{route("update_mahasiswa", ['id'=>$id])}}", method="post">
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
	<label>NIM	</label>
	<input type="text" name="nim" id="nim">
	<br>
	<label>Hp	</label>
	<input type="text" name="hp" id="hp">
	<br>
	<label>Angkatan	</label>
	<input type="number" name="angkatan" id="angkatan">
	<br>

	<button type="submit">Simpan</button>

</form>