@extends('layouts.contentLayoutMaster')

{{-- title --}}
@section('title','Oto Servis Yazılımı')


@section('content')
<!-- Dashboard Analytics Start -->
<section id="dashboard-analytics">
  <div class="row">
    <div class="col-md-12 col-sm-12">
      <div class="card text-center  bg-lighten-1">
        <div class="card-body text-center">
          <img src="{{ asset('assets/images/bg.jpg') }} " alt="element 05" class="mb-1 w-100" >
          <h4 class="card-title">Volege Otomobil Servis ve Yedek Parça  Ltd. Şti.</h4>
          <p class="card-text">Servis Yönetimi Yazılımı v1</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Dashboard Analytics end -->
@endsection
