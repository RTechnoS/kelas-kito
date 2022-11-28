<table border="1px">
	<thead>
		<tr>
			<th>ID</th>
			<th>Username</th>
			<th>Email</th>
			<th>Password</th>
			<th>Level</th>
			<th>Created at</th>
			<th>Update</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data_user as $data)
		<tr>
			
			<td>{{ $data->id}}</td>
			<td>{{ $data->username}}</td>
			<td>{{ $data->email}}</td>
			<td>{{ $data->password}}</td>
			<td>{{ $data->level}}</td>
			<td>{{ $data->created_at}}</td>
			<td>{{ $data->updated_at}}</td>
			<td width="15%">
				<a href="{{route("form_edit_user", ["id"=>$data->id])}}">Edit</a>
				<form action="{{route("delete_user", ['id'=>$data->id])}}", method="post">
					@csrf
					@method("delete")
					<button>Delete</button>
				</form>
			</td>
			

		</tr>
		@endforeach
	</tbody>

</table>
<a href="{{route("form_new_user")}}">Add User</a>