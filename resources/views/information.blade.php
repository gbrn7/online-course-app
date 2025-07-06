@extends('layouts.base')

@section('title', 'Informasi')

@section('custom_css_link', asset('css/Feature_style/main.css'))

@section('main-content')
<section class="information one-page" id="information">
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-decoration-none text-black" href={{route('home')}}>Beranda</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Informasi</li>
    </ol>
  </nav>
  <div class="container information-detail-wrapper">
    <div class="row">
      <div class="col-12 text-center">
        <p class="head-section mb-0 mb-2" data-aos="fade-up" data-aos-duration="300">
          Informasi
        </p>
        <h1 class="title m-0 mb-4 fw-bold" data-aos="fade-up" data-aos-delay="200" data-aos-duration="400">
          📰 Daftar Informasi
        </h1>
      </div>
    </div>
    <div class="row mt-3 justify-content-center row-cols-1 news-box-wrapper row-cols-sm-2 row-cols-md-3"
      data-aos="fade-up" data-aos-delay="500" data-aos-duration="300">
      @forelse ($news as $item)
      <a href={{route('information.detail', $item->id)}}
        class="col text-decoration-none news-box-wrap p-1 text-center mt-1 mt-md-0">
        <div class="news-box border rounded-3 py-2 h-100">
          <p class="fw-bold text-black title">{{$item->title}}</p>
          <p class="fw-light text-secondary">{{$item->created_at_human}}</p>
        </div>
      </a>
      @empty
      <p class="text-center fw-semibold text-secondary">Informasi Tidak Ditemukan</p>
      @endforelse
    </div>
    <div class="row justify-content-end mt-3">
      {{$news->links('pagination::simple-bootstrap-5')}}
    </div>
  </div>
</section>
@endsection