<nav class="navbar navbar-expand-lg navbar-light position-relative">
  <div class="container-lg">
    <a class="navbar-brand d-flex gap-2 align-items-center" href="#">
      <img src={{asset('img/logo_UNJ.png')}} class="logo-brand">
      <div>
        <p class="mb-0 fw-bold">MOOC</p>
        <p class="mb-0 second-text-logo">Universitas Negeri Jakarta</p>
      </div>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse toggle" id="navbarNav">
      <ul class="navbar-nav ms-auto text-center text-lg-start mt-4 mb-4 mb-lg-0 mt-lg-0 d-flex align-items-center">
        <li class="nav-item mt-3 mt-lg-0">
          <a class="nav-link" href="#home">Beranda</a>
        </li>
        <li class="nav-item mt-3 mt-lg-0">
          <a class="nav-link" href="#service">Informasi</a>
        </li>
        <li class="nav-item mt-3 mt-lg-0">
          @if (Auth::guard('student')->check())
          <div class="dropdown" data-cy="btn-dropdown-account">
            <a class="nav-link d-flex gap-2 pt-3 pt-md-0 align-items-center justify-content-end dropdown-toggle"
              href="user-edit-profile.html" role="button" aria-current="page" data-bs-toggle="dropdown"
              aria-expanded="false">
              @auth('student')
              <img src={{asset('img/default-profile.png')}} class="img-fluid img-avatar" />
              @endauth
            </a>
            <ul class="dropdown-menu dropdown-menu-end px-2">
              <li class="rounded-2 dropdown-list">
                <p class="mb-0 text-white text-center">
                  {{Auth::guard('student')->user()->name}}
                </p>
              </li>
              <li class="rounded-2 dropdown-list my-profile">
                <a class="dropdown-item text-white rounded-2" href="" data-cy="btn-edit-account"><i
                    class="ri-user-3-line me-2 text-white"></i>Edit Profil</a>
              </li>
              <li class="rounded-2 dropdown-list">
                <form id="form-tag" action="" method="POST">
                  @csrf
                  <button data-cy="btn-logout" type="submit" class="dropdown-item btn-submit rounded-2 text-white"><i
                      class="ri-logout-circle-line me-2 text-white"></i>Log Out</button>
                </form>
              </li>
            </ul>
          </div>
          @else
          <a href="{{''}}" class="login-link navbar-text text-decoration-none d-flex align-items-center gap-1">
            <i class="ri-login-circle-line"></i>
            Log In
          </a>
          @endif
        </li>
      </ul>
    </div>
  </div>
</nav>