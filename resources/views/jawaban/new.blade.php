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

<form class="justify-content-center" action="{{route("new_jawaban")}}", method="post">
	@csrf
	<input hidden type="number" name="tugas_id" id="tugas_id" value="{{$id}}">
	<div class="mb-3 row">
	    <label class="col-sm-2 col-form-label"><b>Tugas</b></label>
	    <div class="col-sm-10">
	      <label readonly class="form-control-plaintext">{{$tugas['tugas']}}</label>
	    </div>
	    <label class="col-sm-2 col-form-label"><b>Soal</b></label>
	    <div class="col-sm-10">
	      <label readonly class="form-control-plaintext">{{$tugas['soal']}}</label>
	    </div>
	    <label class="col-sm-2 col-form-label"><b>Isi</b></label>
	    <div class="col-sm-10">
	      <textarea name="isi" id="isi"></textarea>
	    </div>

	    <div class="col-sm-10">
	    	<br>
	    	<button class="btn btn-primary" type="submit">Simpan</button>
	    </div>
	</div>
</form>

@endsection