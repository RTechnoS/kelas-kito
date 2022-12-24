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
			<th>Nama</th>
			<th>Deskripsi</th>
			<th>Foto</th>
			<th>Dosen</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		@foreach($data_kelas as $data)
		<tr>
			
			<td>{{ $data->id}}</td>
			<td>{{ $data->kelas}}</td>
			<td>{{ $data->deskripsi}}</td>
			<td><img src="{{ $data->foto}}" width="30px"></td>
			<td>{{ $data->nama}}</td>
			<td width="15%">
				@if(auth()->user()->level == 3)
					<form>
						<button>Join</button>
					</form>
				@else
					<a href="{{route("form_edit_kelas", ["id"=>$data->id])}}">Edit</a>
					<form action="{{route("delete_kelas", ['id'=>$data->id])}}", method="post">
						@csrf
						@method("delete")
						<button>Delete</button>
					</form>
					<a href="{{route("show_anggota_kelas", ["id"=>$data->id])}}">Isi Kelas</a>
				@endif
			</td>

		</tr>
		@endforeach
	</tbody>

</table>
@endsection
