@extends('layouts.base')

@section('title', 'Home')

@section('custom_css_link', asset('css/Feature_style/main.css'))

@section('main-content')
<section class="service" id="service">
  <div class="container service-wrapper">
    <div class="row">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="text-decoration-none text-black"
              href={{route('information')}}>Informasi</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">{{$news->title}}</li>
        </ol>
      </nav>
    </div>
    <div class="row">
      <div class="col-12 text-center">
        <p class="head-section mb-0 mb-2" data-aos="fade-up" data-aos-duration="300">
          Informasi
        </p>
        <h1 class="title m-0 mb-1 fw-bold" data-aos="fade-up" data-aos-delay="200" data-aos-duration="400">
          {{$news->title}}
        </h1>
        <p class="mt-0 text-secondary">
          {{$news->created_at_formatted}}
        </p>
      </div>
      <div class="col-12 border rounded-2 py-3 px-2">
        {!!$news->content!!}
      </div>
    </div>
  </div>
</section>
@endsection