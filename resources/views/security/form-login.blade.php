<form action="{{route("process_login") }}" method="post">
	@csrf
	Email / Username <input type="text" name="user" > <br>
	Password <input type="password" name="password" > <br>
	<button type="submit">Login</button>
</form>
