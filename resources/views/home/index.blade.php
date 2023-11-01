@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div id="carouselExampleCaptions" class="carousel slide w-100" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
    <img src="{{ asset('/img/banner.jpg') }}" class="img-fluid rounded">
      <div class="carousel-caption d-none d-md-block">
        <h5>Choose Our Services</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
        <img src="{{ asset('/img/banner.jpg') }}" class="img-fluid rounded">
      <div class="carousel-caption d-none d-md-block">
        <h5>Cheap and easy maintainance</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
        <img src="{{ asset('/img/banner.jpg') }}" class="img-fluid rounded">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>
<div class="row">
<div class="card-header text-center fw-bold ">Product Reviews</div>
    <div class="col-md-6 col-lg-4 mb-2">
        <img src="{{ asset('/img/hk1.jpg') }}" class="img-fluid rounded">
    </div>
    <div class="col-md-6 col-lg-4 mb-2">
        <img src="{{ asset('/img/hk2.jpg') }}" class="img-fluid rounded">
    </div>
    <div class="col-md-6 col-lg-4 mb-2">
        <img src="{{ asset('/img/hk3.png') }}" class="img-fluid rounded">
    </div>
    <div class="col-md-6 col-lg-4 mb-2">
        <img src="{{ asset('/img/dvr.jpg') }}" class="img-fluid rounded">
    </div>
    <div class="col-md-6 col-lg-4 mb-2">
        <img src="{{ asset('/img/hk3.png') }}" class="img-fluid rounded">
    </div>
</div>
@endsection