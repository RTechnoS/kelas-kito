<form action="{{route("update_user", ['id'=>$id])}}", method="post">
	@csrf
	@method("put")
	<label>Username		</label>
	<input type="text" name="username" id="username">
	<br>
	<label>Email	</label>
	<input type="email" name="email" id="email" placeholder="Enter Email">
	<br>
	<label>Password	</label>
	<input type="password" name="password" id="password">
	<br>
	<label>Level	</label>
	<input type="number" name="level" id="level">

	<button type="submit">Simpan</button>

</form>