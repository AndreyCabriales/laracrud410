@extends('layout/main_template')

@section('content')

<div id="carouselExampleAutoplaying" class="carousel slide" width="300" height="800" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://vallartasupermarkets.com/wp-content/uploads/2020/12/DulceriaHero.jpg" class="d-block w-100" alt="La dulceria del año" width="300" height="300">
      </div>
      <div class="carousel-item">
        <img src="https://i0.wp.com/www.confitexpoinforma.com/wp-content/uploads/2023/05/Descubre-como-brindar-una-experiencia-de-compra-unica-en-tu-dulceria840.jpg?w=840&ssl=1" width="300" height="800" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="..." width="300" height="300" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

@endsection