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
      <h4>Kayıt olmak için bilgilerinizi doğrulayın!</h4>
      <form class="pt-3" method="POST" action="{{ route('register') }}">
            @csrf
        <div class="form-group">
            <input type="text" class="form-control form-control-lg" name="name" placeholder="Adınız">
            @error('name')
                <div class="badge badge-error">{{$message}}</div>
            @enderror
          </div>
        <div class="form-group">
          <input type="email" class="form-control form-control-lg" name="email" id="exampleInputEmail1" placeholder="Email">
          @error('email')
                <div class="badge badge-error">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
          <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Şifre">
          @error('password')
                <div class="badge badge-error">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <input type="password" name="password_confirmation" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Şifre tekrarı">
          </div>
        <div class="mt-3">
          <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Kayıt Ol</button>
        </div>
      </form>
    </div>
  </div>
@endsection