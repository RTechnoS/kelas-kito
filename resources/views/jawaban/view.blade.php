@extends("blank")
@section("konten")

<table class="table table-hover" >
	<thead class="table-dark">
		<tr>
			<th>ID</th>
			<th>Users Id</th>
			<th>Tugas Id</th>
			<th>Isi</th>
			<th>Aksi</th>
		</tr>
	</thead>


	<tbody>
		@foreach($data_jawaban as $data)
		<tr>			
			<td>{{ $data->id}}</td>
			<td>{{ $data->users_id}}</td>
			<td>{{ $data->tugas_id}}</td>
			<td>{{ $data->isi}}</td>
			<td width="15%">
				<a href="{{route("form_edit_jawaban", ["id"=>$data->id])}}">Edit</a>
				<form action="{{route("delete_jawaban", ['id'=>$data->id])}}", method="post">
					@csrf
					@method("delete")
					<button>Delete</button>
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>


</table>

<a href="{{route("form_new_jawaban")}}">Add Jawaban</a>
@endsection