@extends('layouts.base')

@section('title', 'Materi')

@section('custom_css_link', asset('css/Feature_style/main.css'))

@section('main-content')
<section class="course one-page" id="course">
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-decoration-none text-black" href={{route('home')}}>Beranda</a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Materi</li>
    </ol>
  </nav>
  <div class="container course-wrapper">
    <div class="row">
      <div class="col-12 text-center">
        <p class="head-section mb-0 mb-2" data-aos="fade-up" data-aos-duration="300">
          Materi
        </p>
        <h1 class="title m-0 mb-4 fw-bold" data-aos="fade-up" data-aos-delay="200" data-aos-duration="300">
          📙 Daftar Materi
        </h1>
      </div>
    </div>
    <div data-aos="fade-up" data-aos-delay="500" data-aos-duration="300"
      class="row mt-3 justify-content-center row-cols-1 news-box-wrapper row-cols-sm-2 row-cols-md-3">
      @forelse ($courses as $course)
      <div class="col-12 col-md-6 col-lg-4 p-2 course-box-wrapper">
        <a href={{route('courses.detail', $course->id)}}
          class="w-100 text-black p-0 text-decoration-none border rounded rounded-3 course-box-wrap d-flex flex-column
          flex-wrap justify-content-center align-items-center">
          <div class="img-wrapper">
            <img src={{asset('storage/'.$course->thumbnail)}} class="img-fluid">
          </div>
          <div class="desc-wrapper w-100 py-2 px-3 text-center">
            <p class="title fw-semibold mb-0 mt-2">
              {{$course->title}}
            </p>
            <p class="fw-light text-secondary sub-title-course">Pertemuan-{{$course->meeting_number}}</p>
          </div>
        </a>
      </div>
      @empty
      <p class="text-center fw-semibold text-secondary">Materi Tidak Ditemukan</p>
      @endforelse
    </div>
    <div class="row justify-content-end mt-3">
      {{$courses->links('pagination::simple-bootstrap-5')}}
    </div>
  </div>
</section>
@endsection