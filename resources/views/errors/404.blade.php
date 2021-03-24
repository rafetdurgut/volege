@extends('layouts.fullLayoutMaster')
{{-- page title --}}
@section('title','404 Hatası')

@section('content')
<!-- error 404 -->
<section class="row flexbox-container">
  <div class="col-xl-6 col-md-7 col-9">
    <div class="card bg-transparent shadow-none">
      <div class="card-body text-center bg-transparent">
        <h1 class="error-title">Sayfa Bulunamadı :(</h1>
        <p class="pb-3">Aradığınız sayfa veya kayıt silinmiş olabilir.</p>
        <img class="img-fluid" src="{{asset('images/pages/404.png')}}" alt="404 error">
        <a href="{{url('/')}}" class="btn btn-primary round glow mt-3">Anasayfaya dön</a>
      </div>
    </div>
  </div>
</section>
<!-- error 404 end -->

@endsection
