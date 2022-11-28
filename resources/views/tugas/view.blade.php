<table border="1px">

	<thead>
		<tr>
			<th>ID</th>
			<th>Users Id</th>
			<th>Nama</th>
			<th>Tugas</th>
			<th>Aksi</th>
		</tr>
	</thead>


	<tbody>
		@foreach($data_tugas as $data)
		<tr>			
			<td>{{ $data->id}}</td>
			<td>{{ $data->users_id}}</td>
			<td>{{ $data->nama}}</td>
			<td>{{ $data->tugas}}</td>
			<td width="15%">
				<a href="{{route("form_edit_tugas", ["id"=>$data->id])}}">Edit</a>
				<form action="{{route("delete_tugas", ['id'=>$data->id])}}", method="post">
					@csrf
					@method("delete")
					<button>Delete</button>
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>


</table>

<a href="{{route("form_new_tugas")}}">Add Tugas</a>
