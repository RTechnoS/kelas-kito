@extends("blank")
@section("konten")
<form class="row g-3">
  <div class="col-md-3">
    <img width="100%" src="{{$data_kelas['detail'][0]['foto']}}">
  </div>
  <div class="col-md-6">
    <label>Nama</label>
    <h5>{{$data_kelas['detail'][0]['kelas']}}</h5><br>
    <label>Deskripsi</label>
    <h5>{{$data_kelas['detail'][0]['deskripsi']}}</h5><br>
    <label>Dosen</label>
    <h5>{{$data_kelas['detail'][0]['nama']}}</h5>
  </div>
  <div>
</div>
</form>
<br>
<h5>Mahasiswa</h5>
<table class="table table-hover" >
	<thead class="table-dark">
		<tr>
			<th>ID</th>
			<th>Nama</th>
			<th>HP</th>
			<th>Foto</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		@for($i=0; $i < count($data_kelas['isi_kelas']["mahasiswa"]); $i++)
			<?php $data = $data_kelas['isi_kelas']["mahasiswa"][$i][0] ?>
			<tr>
				<td>{{ $data->users_id}}</td>
				<td>{{ $data->nama}}</td>
				<td>{{ $data->hp}}</td>
				<td><img src="{{ $data->foto}}" width="30px"></td>
				<td width="15%">
					<!-- <form action="{{route("delete_kelas", ['id'=>$data->id])}}", method="post">
						@csrf
						@method("delete")
						<button>Delete</button>
					</form> -->
				</td>

			</tr>
		@endfor
	</tbody>

</table>


<h5>Tugas</h5>

<table class="table table-hover" >
	<thead class="table-dark">
		<tr>
			<th>ID</th>
			<th>Tugas</th>
			<th>Soal</th>
			<th>Dibuat</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		@for($i=0; $i < count($data_kelas['tugas']); $i++)
			<?php $data = $data_kelas['tugas'][$i] ?>
			<tr>
				<td>{{ $data->id}}</td>
				<td>{{ $data->tugas}}</td>
				<td>{{ $data->soal}}</td>
				<td>{{ $data->created_at}}</td>
				<td width="15%">
					@if(auth()->user()->level == 3)
						<a href="{{route("isi_jawaban", ["id"=>$data->id])}}">
							<button class="btn btn-primary" type="submit">Kerjakan</button>
						</a>
					@else
						<a href="{{route("show_jawaban_tugas", ["id"=>$data->id])}}">
							<button class="btn btn-success" type="submit">Lihat</button>
						</a>
					@endif

					<!-- <form action="{{route("delete_kelas", ['id'=>$data->id])}}", method="post">
						@csrf
						@method("delete")
						<button>Delete</button>
					</form> -->
				</td>

			</tr>
		@endfor
	</tbody>

</table>
@if(auth()->user()->level == 2)

	<a href="{{route("form_new_tugas", ["id"=>$data_kelas['detail'][0]['id']])}}">
		<button class="btn btn-primary" type="submit">Add Tugas</button>
	</a>
@endif
<!-- <a href="{{route("form_new_kelas")}}">Add Kelas</a> -->

@endsection
