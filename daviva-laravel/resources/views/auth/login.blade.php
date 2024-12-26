@extends('layouts.guest')
@section('title')
    Giriş Yap
@endsection


@section('content')
<div class="col-lg-4 mx-auto">
    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
      <div class="brand-logo">
        <img src="/images/logo.svg" alt="logo">
      </div>
      <h4>Giriş yapmak için bilgilerinizi doğrulayın!</h4>
      <form class="pt-3" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
          <input type="email" class="form-control form-control-lg" name="email" id="exampleInputEmail1" placeholder="Email">
        </div>
        <div class="form-group">
          <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Şifre">
        </div>
        <div class="mt-3">
          <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Giriş Yap</button>
        </div>
        <div class="my-2 d-flex justify-content-between align-items-center">
          <div class="form-check">
            <label class="form-check-label text-muted">
              <input type="checkbox" class="form-check-input" name="benihatirla">
              Beni Hatırla
            </label>
          </div>
          <a href="#" class="auth-link text-black">Şifremi unuttum?</a>
        </div>
        <div class="text-center mt-4 font-weight-light">
          Hesabınız yok mu? <a href="{{route('register')}}" class="text-primary">Kayıt Ol</a>
        </div>
      </form>
    </div>
  </div>
@endsection


