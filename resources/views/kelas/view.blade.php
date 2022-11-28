<table border="1px">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nama</th>
			<th>Deskripsi</th>
			<th>Foto</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data_kelas as $data)
		<tr>
			
			<td>{{ $data->id}}</td>
			<td>{{ $data->nama}}</td>
			<td>{{ $data->deskripsi}}</td>
			<td><img src="{{ $data->foto}}" width="30px"></td>
			<td width="15%">
				<a href="{{route("form_edit_kelas", ["id"=>$data->id])}}">Edit</a>
				<form action="{{route("delete_kelas", ['id'=>$data->id])}}", method="post">
					@csrf
					@method("delete")
					<button>Delete</button>
				</form>
			</td>

		</tr>
		@endforeach
	</tbody>

</table>

<a href="{{route("form_new_kelas")}}">Add Kelas</a>
