@extends('layouts.fullLayoutMaster')
{{-- page title --}}
@section('title','Login Page')
{{-- page scripts --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/authentication.css')}}">
@endsection

@section('content')
<!-- login page start -->
<section id="auth-login" class="row flexbox-container">
  <div class="col-xl-8 col-11">
    <div class="card bg-authentication mb-0">
      <div class="row m-0">
        <!-- left section-login -->
        <div class="col-md-6 col-12 px-0">
          <div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
            <div class="card-header pb-1">
              <div class="card-title">
                <h4 class="text-center mb-2">Hoşgeldiniz!</h4>
              </div>
            </div>
            <div class="card-body">

              <form action="{{url('/')}}">
                  <div class="form-group mb-50">
                      <label class="text-bold-600" for="exampleInputEmail1">E-Posta Adresi:</label>
                      <input type="email" class="form-control" id="exampleInputEmail1"
                          placeholder="info@x.com"></div>
                  <div class="form-group">
                      <label class="text-bold-600" for="exampleInputPassword1">Şifre</label>
                      <input type="password" class="form-control" id="exampleInputPassword1"
                          placeholder="">
                  </div>
                  <div
                      class="form-group d-flex flex-md-row flex-column justify-content-between align-items-center">
                      <div class="text-left">
                          <div class="checkbox checkbox-sm">
                              <input type="checkbox" class="form-check-input" id="exampleCheck1">
                              <label class="checkboxsmall" for="exampleCheck1"><small>Beni hatırla.</small></label>
                          </div>
                      </div>
                      <div class="text-right"><a href="{{asset('auth/forgot/password')}}"
                              class="card-link"><small>Şifrenizi mi unuttunuz?</small></a></div>
                  </div>
                  <button type="submit" class="btn btn-primary glow w-100 position-relative">Giriş Yap<i
                          id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
              </form>
              <hr>
            </div>
          </div>
        </div>
        <!-- right section image -->
        <div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
          <img class="img-fluid" src="{{asset('images/pages/login.png')}}" alt="branding logo">
        </div>
      </div>
    </div>
  </div>
</section>
<!-- login page ends -->

@endsection
