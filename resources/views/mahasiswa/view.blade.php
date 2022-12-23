@extends("blank")
@section("konten")
<table class="table table-hover" >
	<thead class="table-dark">
		<tr>
			<th>ID</th>
			<th>Users Id</th>
			<th>Nama</th>
			<th>Foto</th>
			<th>NIM</th>
			<th>Hp</th>
			<th>Angkatan</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data_mahasiswa as $data)
		<tr>
			
			<td>{{ $data->id}}</td>
			<td>{{ $data->users_id}}</td>
			<td>{{ $data->nama}}</td>
			<td><img src="{{ $data->foto}}" width="30px"></td>
			<td>{{ $data->nim}}</td>
			<td>{{ $data->hp}}</td>
			<td>{{ $data->angkatan}}</td>
			<td width="15%">
				<a href="{{route("form_edit_mahasiswa", ["id"=>$data->id])}}">Edit</a>
				<form action="{{route("delete_mahasiswa", ['id'=>$data->id])}}", method="post">
					@csrf
					@method("delete")
					<button>Delete</button>
				</form>
			</td>

		</tr>
		@endforeach
	</tbody>

</table>

<a href="{{route("form_new_mahasiswa")}}">Add Mahasiswa</a>
@endsection
