@extends("blank")
@section("konten")

<table class="table table-hover" >
	<thead class="table-dark">
		<tr>
			<th>ID</th>
			<th>Users Id</th>
			<th>Nama</th>
			<th>Foto</th>
			<th>NIDN</th>
			<th>Hp</th>
			<th>Pendidikan</th>
			<th>Aksi</th>
		</tr>
	</thead>


	<tbody>
		@foreach($data_dosen as $data)
		<tr>			
			<td>{{ $data->id}}</td>
			<td>{{ $data->users_id}}</td>
			<td>{{ $data->nama}}</td>
			<td><img src="{{ $data->foto}}" width="30px"></td>
			<td>{{ $data->nidn}}</td>
			<td>{{ $data->hp}}</td>
			<td>{{ $data->pendidikan}}</td>
			<td width="15%">
				<a href="{{route("form_edit_dosen", ["id"=>$data->id])}}">Edit</a>
				<form action="{{route("delete_dosen", ['id'=>$data->id])}}", method="post">
					@csrf
					@method("delete")
					<button>Delete</button>
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>


</table>

<a href="{{route("form_new_dosen")}}">Add Dosen</a>

@endsection