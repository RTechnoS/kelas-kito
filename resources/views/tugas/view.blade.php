@extends("blank")
@section("konten")
@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif
<table class="table table-hover" >
	<thead class="table-dark">
		<tr>
			<th>ID</th>
			<th>Tugas</th>
			<th>Soal</th>
			<th>Kelas</th>
			<th>Dibuat</th>
			<th>Aksi</th>
		</tr>
	</thead>


	<tbody>
		@foreach($data_tugas as $data)
		<tr>			
			<td>{{ $data->id}}</td>
			<td>{{ $data->tugas}}</td>
			<td>{{ $data->soal}}</td>
			<td>{{ $data->kelas}}</td>
			<td>{{ $data->created_at}}</td>
			<td width="15%">
				@if(auth()->user()->level != 3)
					<a href="{{route("form_edit_tugas", ["id"=>$data->id])}}">Edit</a>
					<form action="{{route("delete_tugas", ['id'=>$data->id])}}", method="post">
						@csrf
						@method("delete")
						<button>Delete</button>
					</form>
					<a href="{{route("show_jawaban_tugas", ["id"=>$data->id])}}">
						<button class="btn btn-success" type="submit">Lihat</button>
					</a>
				@else
					<a href="{{route("isi_jawaban", ["id"=>$data->id])}}">
						<button class="btn btn-primary" type="submit">Kerjakan</button>
					</a>
				@endif
			</td>
		</tr>
		@endforeach
	</tbody>


</table>

<!-- -->

@endsection
