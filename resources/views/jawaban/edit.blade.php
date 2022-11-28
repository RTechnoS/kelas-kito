<form action="{{route("update_jawaban", ['id'=>$id])}}", method="post">
	@csrf
	@method("put")
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