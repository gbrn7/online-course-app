<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MOOC UNJ | Login</title>
  <!-- Icon -->
  <link rel="icon" type="image/x-icon" href="{{asset('img/logo_UNJ.png')}}" />

  <!-- CSS Bootsrap-->
  <link rel="stylesheet" href="{{asset('vendor/bootstrap-5.2/css/bootstrap.min.css')}}" />

  <!-- Link Remixicon -->
  <link rel="stylesheet" href="{{asset('vendor/RemixIcon-master/fonts/remixicon.css')}}" />

  <!-- CSS -->
  <link rel="stylesheet" href="{{asset('css/Login_style/main.css')}}" />

  {{-- Preload --}}
  <link rel="stylesheet" href="{{asset('css/Preloader/main.css')}}" />

</head>

<body>
  <section class="login row justify-content-between">
    <div class="h-100 content-right">
      <div class="row justify-content-center align-items-center h-100">
        <div class="border border-2 signin-box p-3 p-sm-4 rounded rounded-5 col-7 col-lg-4 col-xl-3">
          <div class="header">
            <div class="text-center">
              <div class="logo-wrapper d-flex justify-content-center">
                <img src="{{asset('img/logo_UNJ.png')}}" class="header-logo" />
              </div>
              <h1 class="my-0 mt-4 fs-4 fw-normal" data-cy="title">Sign In Mahasiswa</h1>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger mt-1">
              <ul>
                @foreach ($errors->all() as $message)
                <li>{{ $message }}</li>
                @endforeach
              </ul>
            </div>
            @endif
          </div>
          <form id="form-tag" action={{route('login.auth')}} method="post">
            @csrf
            <div class="login-form d-flex flex-column gap-1 gap-lg-3 mt-3">
              <div class="nim-input-wrapper">
                <input name="nim" data-cy="input-nim" value="{{old('nim')}}" class="form-control text-black" id="nim"
                  placeholder="Masukkan Nim Anda" />
                @error('nim')
                <small class="form-text mt-1 text-danger">{{ $message }}</small>
                @enderror
              </div>
              <div class="password-container position-relative">
                <div class="pass-wrapper">
                  <input name="password" data-cy="input-password" type="password" class="form-control" id="password"
                    placeholder="Masukkan Password Anda" />
                  <i class="ri-eye-close-fill pass-icon eye-pass position-absolute"></i>
                </div>
              </div>
              <button class="btn login-btn mt-1 mt-lg-2 btn-submit" type="submit" data-cy="btn-login">
                Log In
              </button>
            </div>
          </form>
          <div class="auth-footer text-center text-secondary mt-1">
            <span class="copyright">Copyright ©{{date('Y')}} <br> Sistem Pembelajaran Anak dengan Hambatan
              Pendengaran</span>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
{{-- jquery --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
  integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
  $(document).ready(function () {
  $('.loading-wrapper').addClass('d-none');
  });

  $('.pass-icon').click(function (e) { 
    e.preventDefault();
    $('.pass-icon').toggleClass('ri-eye-fill');
    $('#password').prop("type") == 'password' ?  $('#password').attr('type', 'text') :  $('#password').attr('type', 'password'); 
  });

</script>

<!-- Bootstrap js -->
<script src="{{asset('vendor/bootstrap-5.2/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/preloader.js')}}"></script>

</html>