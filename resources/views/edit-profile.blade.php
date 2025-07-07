@extends('layouts.base')

@section('title', 'Edit Profil')

@section('custom_css_link', asset('css/Feature_style/main.css'))

@section('main-content')
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a class="text-decoration-none text-black" href={{route('home')}}>Beranda</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">Edit Profil</li>
  </ol>
</nav>
<div class="main-content mt-3 one-page">
  @if ($errors->any())
  <div class="alert alert-danger mt-1">
    <ul>
      @foreach ($errors->all() as $message)
      <li>{{ $message }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  @if (session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
  @endif
  <form id="form-tag" action="{{route('editProfile.updateProfile', auth()->user()->id)}}" method="POST"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-2">
      <label class="form-label">Password Lama</label>
      <input type="password" class="form-control" data-cy="input-old-password" placeholder="Masukkan password lama anda"
        name="old_password" />
    </div>
    <div class="mb-2">
      <label class="form-label">Password Baru</label>
      <input type="password" class="form-control" data-cy="input-new-password" placeholder="Masukkan password baru anda"
        name="new_password" />
    </div>
    <div class="mb-2">
      <label class="form-label">Ulangi Password Baru</label>
      <input type="password" class="form-control" data-cy="input-confirm-new-password"
        placeholder="Masukkan konfirmasi password baru anda" name="confirm_password" />
    </div>
    <div class="wrapper d-flex justify-content-end">
      <button type="submit" class="btn btn-submit fw-bold text-white px-5 btn-warning"
        data-cy="btn-edit-profile-submit">Submit</button>
    </div>
  </form>
</div>
@endsection