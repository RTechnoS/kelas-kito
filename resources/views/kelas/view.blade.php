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

<div class="row row-cols-1 ">
	@foreach($data_kelas as $data)

	<div class="col-md-3 card m-3" style="width: 18rem;">
	  <img height="50%" src="{{$data->foto}}" class="card-img-top">
	  <div class="card-body">
	    <h5 class="card-title">{{$data->kelas}}</h5>
	    <p class="card-text">{{$data->deskripsi}}</p>
	    @if(auth()->user()->level == 3)
			<a href="{{route("show_detail_kelas", ["id"=>$data->id])}}">
				<button class="btn btn-primary">Buka</button>
			</a>
		@else
			<div class="row">

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
			</div>
		@endif
	  </div>
	  <div class="card-footer text-muted">
	    {{$data->nama}}
	  </div>
	</div>
	@endforeach
</div>

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
