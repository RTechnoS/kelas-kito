@extends("blank")
@section("konten")
@include("menu")

<center><h1>Menu Dashboard Awal</h1>

Hai, ini adalah dashboard admin</center>

<div class="card" style="width: 18rem;">
  <img src="/Images/logo umb.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>

{{print_r(auth()->user())}}

@endsection