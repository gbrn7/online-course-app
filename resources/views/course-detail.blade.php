@extends('layouts.base')

@section('title', 'Detail Informasi')

@section('custom_css_link', asset('css/Feature_style/main.css'))

@section('main-content')
<section class="course-detail one-page" id="course-detail">
  <div class="container course-detail-wrapper">
    <div class="row">
      <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class="text-decoration-none text-black" href={{route('home')}}>Beranda</a>
          </li>
          <li class="breadcrumb-item"><a class="text-decoration-none text-black" href={{route('courses')}}>Materi</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">{{$course->title}}</li>
        </ol>
      </nav>
    </div>
    <div class="row">
      <div class="col-12 text-center">
        <p class="head-section mb-0 mb-2" data-aos="fade-up" data-aos-duration="200">
          Materi
        </p>
        <h1 class="title m-0 mb-1 fw-bold" data-aos="fade-up" data-aos-delay="300" data-aos-duration="200">
          {{$course->title}}
        </h1>
        <p class="mt-0 text-secondary" data-aos="fade-up" data-aos-delay="400" data-aos-duration="200">
          Pertemuan-{{$course->meeting_number}}
        </p>
      </div>
      @isset($course->google_drive_link)
      <div class="col-12 border rounded-2 py-3 px-2 ratio ratio-16x9" data-aos="fade-up" data-aos-delay="400"
        data-aos-duration="200">
        <iframe src="{{ $course->embed_link }}" title="YouTube video" allowfullscreen></iframe>
      </div>
      @endisset
      <div class="col-12 mt-2 border rounded-2 py-3 px-2">
        📕 <a href={{asset('storage/'.$course->document_filename )}} download class ="text-decoration-none">Download
          Modul
          {{$course->title}}</a>
      </div>
      <div class="col-12 mt-2 border rounded-2 py-3 px-2 mb-4">
        {!!$course->content!!}
      </div>
    </div>
  </div>
</section>
@endsection