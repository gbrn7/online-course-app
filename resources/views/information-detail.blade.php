@extends('layouts.base')

@section('title', 'Detail Informasi')

@section('custom_css_link', asset('css/Feature_style/main.css'))

@section('main-content')
<section class="information-detail one-page" id="information-detail">
  <div class="container information-detail-wrapper">
    <div class="row">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="text-decoration-none text-black" href={{route('home')}}>Beranda</a>
          </li>
          <li class="breadcrumb-item"><a class="text-decoration-none text-black"
              href={{route('information')}}>Informasi</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">{{$news->title}}</li>
        </ol>
      </nav>
    </div>
    <div class="row">
      <div class="col-12 text-center">
        <p class="head-section mb-0 mb-2" data-aos="fade-up" data-aos-duration="200">
          Informasi
        </p>
        <h1 class="title m-0 mb-1 fw-bold" data-aos="fade-up" data-aos-delay="300" data-aos-duration="200">
          {{$news->title}}
        </h1>
        <p class="mt-0 text-secondary" data-aos="fade-up" data-aos-delay="400" data-aos-duration="200">
          {{$news->created_at_formatted}}
        </p>
      </div>
      <div class="col-12 border rounded-2 py-3 px-2" data-aos="fade-up" data-aos-delay="400" data-aos-duration="200">
        {!!$news->content!!}
      </div>
    </div>
  </div>
</section>
@endsection