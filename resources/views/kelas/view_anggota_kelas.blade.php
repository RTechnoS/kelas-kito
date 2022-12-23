@extends("blank")
@section("konten")

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
		@for($i=0; $i < count($data_anggota_kelas["mahasiswa"]); $i++)
			<?php $data = $data_anggota_kelas["mahasiswa"][$i][0] ?>
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

<!-- <a href="{{route("form_new_kelas")}}">Add Kelas</a> -->

@endsection
