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
					<a href="{{route("show_detail_kelas", ["id"=>$data->id])}}">
						<button class="btn btn-primary">Buka</button>
					</a>
				@else
					<a href="{{route("form_edit_kelas", ["id"=>$data->id])}}">
						<button class="btn btn-warning btn-sm">Edit</button>
					</a>
					<form action="{{route("delete_kelas", ['id'=>$data->id])}}", method="post">
						@csrf
						@method("delete")
						<button class="btn btn-danger btn-sm">Delete</button>
					</form>
					<a href="{{route("show_detail_kelas", ["id"=>$data->id])}}">
						<button class="btn btn-primary btn-sm">Buka</button>
					</a>
				@endif
			</td>

		</tr>
		@endforeach
	</tbody>

</table>
@if(auth()->user()->level == 3)
	
  	<form action="{{route('join_kelas') }}" method="post">
		@csrf
		<div class="input-group mb-3 " style="width: 18rem;">
			<input type="id" class="form-control" placeholder="Kelas ID" name="idKelas">
			<button class="btn btn-outline-secondary" type="submit">Join</button>
		</div>
	</form>
	  
	

@else	
	<a href="{{route("form_new_kelas")}}">Add Kelas</a>
@endif
@endsection
