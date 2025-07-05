<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>MOOC UNJ | @yield('title')</title>
  <!-- Icon -->
  <link rel="icon" type="image/x-icon" href="{{asset('img/logo_UNJ.png')}}" />

  <!-- CSS Bootsrap-->
  <link rel="stylesheet" href="{{asset('vendor/bootstrap-5.2/css/bootstrap.min.css')}}" />

  <!-- Link Remixicon -->
  <link rel="stylesheet" href="{{asset('vendor/RemixIcon-master/fonts/remixicon.css')}}" />

  <!-- CSS -->
  <link rel="stylesheet" href="@yield('custom_css_link')" />
  <link rel="stylesheet" href="{{asset('css/Navbar_style/main.css')}}" />

  <!-- Link AOS -->
  <link rel="stylesheet" href={{asset('vendor/aos-2/dist/aos.css')}} />

  @yield('custom-header')
</head>

<body class="d-flex flex-column justify-content-between">

  <div class="content-up">
    <!-- Navbar -->
    @include('layouts.navbar')

    <!-- Content -->
    <div class="container-lg content-wrapper pt-3">
      @yield('main-content')
    </div>

  </div>


</body>
<footer class="text-center bg-main footer p-2">
  <div class="container d-flex justify-content-between">
    <p class="text-white fw-semibold mb-0">Sistem Pembelajaran Anak dengan Hambatan Pendengaran</p>
    <a href={{route('filament.admin.pages.dashboard')}} class="fw-light text-white text-decoration-none">Admin</a>
  </div>
</footer>
{{-- jquery --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
  integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<!-- jquery Table -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<!-- Bootstrap js -->
<script src="{{asset('vendor/bootstrap-5.2/js/bootstrap.bundle.min.js')}}"></script>

<!-- AOS -->
<script src={{asset('vendor/aos-2/dist/aos.js')}}></script>
<script>
  AOS.init();
</script>

@stack('js')

<script src="{{asset('js/preloader.js')}}"></script>

</html>