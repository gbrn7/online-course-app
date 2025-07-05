@extends('layouts.base')

@section('title', 'Home')

@section('custom_css_link', asset('css/Home_style/main.css'))

@section('main-content')
{{-- Home --}}
<section class="home" id="home">
  <div class="container home-wrapper">
    <div class="row align-items-center">
      <div class="content-left col-12 col-lg-6 text-center text-lg-start" data-aos="fade-right"
        data-aos-duration="1500">
        <h1 class="heading">Selamat Datang di MOOC Universitas Negeri Jakarta</h1>
        <p class="subHeading"> Melalui kursus daring ini, Anda akan belajar strategi
          pembelajaran, komunikasi, dan
          pendekatan untuk mendukung tumbuh kembang anak Tunarungu di lingkungannya.
        </p>
        <div class="cursor-pointer mt-2">
          <a href="#" class="text-white start-study-btn text-decoration-none btn-cta rounded-3 p-2">Mulai
            Belajar</a>
        </div>
      </div>
      <div class="content-right col-12 mt-4 lg-mt-0 col-lg-6 text-center text-lg-start" data-aos="fade-left"
        data-aos-duration="1000">
        <img src={{asset('img/hero-image.jpg')}} class="w-100 rounded rounded-3">
      </div>
    </div>
  </div>
</section>
{{-- End Home --}}

<!-- Service Start -->
<section class="service" id="service">
  <div class="container service-wrapper">
    <div class="row">
      <div class="col-12 text-center">
        <p class="head-section mb-0 mb-2" data-aos="fade-up" data-aos-duration="800">
          Layanan
        </p>
        <h1 class="title m-0 mb-4" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
          Belajar Fleksibel, Dari Mana Saja
        </h1>
      </div>
    </div>
    <div class="row text-center justify-content-center">
      <div class="col-lg-8" data-aos="fade-up" data-aos-delay="400" data-aos-duration="800">
        <p class="desc">
          Dengan media platform dan materi yang kami sediakan, Anda dapat mengikuti MOOC ini kapan pun dan di
          mana pun.
        </p>
      </div>
    </div>
    <div class="row row-3 justify-content-center align-items-center gap-3 mt-3">
      <div
        class="col-4 col-lg-2 border rounded rounded-3  border-dark d-flex flex-column flex-wrap justify-content-center align-items-center py-md-4 p-2"
        data-aos="fade-up" data-aos-delay="700" data-aos-duration="800">
        <i class="ri-signal-wifi-3-fill"></i>
        <p class="desc mb-0 mt-2 text-center">100% Online</p>
      </div>
      <div
        class="col-4 col-lg-2 border rounded rounded-3  border-dark d-flex flex-column flex-wrap justify-content-center align-items-center py-md-4 p-2"
        data-aos="fade-down" data-aos-delay="700" data-aos-duration="800">
        <i class="ri-book-open-line"></i>
        <p class="desc mb-0 mt-2 text-center">Video dan Materi</p>
      </div>
      <div
        class="col-4 col-lg-2 border rounded rounded-3  border-dark d-flex flex-column flex-wrap justify-content-center align-items-center py-md-4 p-2"
        data-aos="fade-up" data-aos-delay="700" data-aos-duration="800">
        <i class="ri-file-download-line"></i>
        <p class="desc mb-0 mt-2 text-center">Download Materi</p>
      </div>
    </div>
  </div>
</section>
<!-- Service end -->

<!-- Banner Start -->
<section class="banner">
  <div class="container banner-wrapper">
    <div class="row row-1 align-items-center">
      <div class="col-12 col-lg-5 column-1">
        <img src={{asset('img/banner-1.jpg')}} class="img-fluid w-100 rounded rounded-3" data-aos="zoom-in"
          data-aos-duration="800" />
      </div>
      <div class="col-12 col-lg-7 column-2 text-center text-lg-start">
        <h1 class="title mt-4" data-aos="fade-down" data-aos-delay="200" data-aos-duration="800">
          Mengapa Anda Perlu Mengikuti Kursus Ini?
        </h1>
        <p class="desc banner-desc" data-aos="fade-down" data-aos-delay="400" data-aos-duration="800">
          Anak dengan hambatan pendengaran menghadapi tantangan dalam memahami komunikasi verbal, berinteraksi sosial,
          dan mengikuti pelajaran di kelas reguler. Tanpa pendekatan yang tepat, mereka berisiko tertinggal.
        </p>
        <p class="desc banner-desc" data-aos="fade-down" data-aos-delay="600" data-aos-duration="800">
          Pendidikan yang inklusif bukan sekadar menyediakan ruang belajar bagi semua, tetapi juga memastikan bahwa
          setiap anak dipahami, dihargai, dan didampingi sesuai kebutuhannya.
        </p>
      </div>
    </div>
  </div>
</section>
<!-- Banner End -->

{{-- Course Start --}}
<section class="course">
  <div class="container course-wrapper">
    <div class="row row-1 align-items-center">
      <div class="row">
        <div class="col-12 text-center">
          <p class="head-section mb-0 mb-2" data-aos="fade-up" data-aos-duration="800">
            Materi
          </p>
          <h1 class="title m-0 mb-4" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
            Materi Pembelajaran
          </h1>
        </div>
      </div>
      <div class="row text-center justify-content-center">
        <div class="col-lg-8" data-aos="fade-up" data-aos-delay="400" data-aos-duration="800">
          <p class="desc">
            Materi disusun untuk mendukung Pembelajaran Anak dengan Hambatan Pendengaran
          </p>
        </div>
      </div>
      <div class="row row-3 justify-content-center align-items-center mt-3">
        @forelse ($courses as $course)
        <div class="col-12 col-md-6 col-lg-4 p-2 course-box-wrapper">
          <a href="#"
            class="w-100 text-black p-0 text-decoration-none border rounded rounded-3 course-box-wrap d-flex flex-column flex-wrap justify-content-center align-items-center"
            data-aos="fade-up" data-aos-delay="700" data-aos-duration="800">
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
        <div class="col-12 p-2 course-box-wrapper text-center">
          <p class="text-secondary fw-semibold">Materi Tidak Ditemukan</p>
        </div>
        @endforelse
      </div>
    </div>
  </div>
</section>
{{-- Course End --}}
@endsection