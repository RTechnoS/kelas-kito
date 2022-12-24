@extends("blank")
@section("konten")

<table class="table table-hover" >
	<thead class="table-dark">
		<tr>
			<th>ID</th>
			<th>Kelas</th>
			<th>Nama</th>
			<th>Tugas</th>
			<th>Soal</th>
			<th>Isi</th>
			<th>Aksi</th>
		</tr>
	</thead>


	<tbody>
		@foreach($data_jawaban as $data)
		<tr>			
			<td>{{ $data->id}}</td>
			<td>{{ $data->kelas}}</td>
			<td>{{ $data->nama}}</td>
			<td>{{ $data->tugas}}</td>
			<td>{{ $data->soal}}</td>
			<td>{{ $data->isi}}</td>
			<td width="15%">
				<!-- <a href="{{route("form_edit_jawaban", ["id"=>$data->id])}}">Edit</a>
				<form action="{{route("delete_jawaban", ['id'=>$data->id])}}", method="post">
					@csrf
					@method("delete")
					<button>Delete</button>
				</form> -->
			</td>
		</tr>
		@endforeach
	</tbody>


</table>
<!-- 
<a href="{{route("new_jawaban")}}">Add Jawaban</a> -->
@endsection