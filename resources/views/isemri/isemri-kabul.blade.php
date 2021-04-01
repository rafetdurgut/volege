@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','İş Emri')
{{-- styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-invoice.css')}}">
@endsection
@section('content')
<!-- app invoice View Page -->
<section class="invoice-view-wrapper">
  <div class="row">
    <!-- invoice view page -->
    <div class="col-xl-9 col-md-8 col-12">
      <div class="card invoice-print-area">
        <div class="card-body pb-0 mx-25">
          <!-- header section -->
          <div class="row">
            <div class="col-lg-4 col-md-12">
              <span class="invoice-number mr-50">İş Emri#</span>
              <span>{{$emir->id}}</span>
            </div>
            <div class="col-lg-8 col-md-12">
              <div class="d-flex align-items-center justify-content-lg-end flex-wrap">
                <div class="mr-3">
                  <small class="text-muted">Oluşturulma Tarihi:</small>
                  <span> {{ \Carbon\Carbon::parse($emir->aracgiristarihi)->format('d/m/Y h:i')}} </span>
                </div>
                <div>
                  <small class="text-muted">Araç Çıkış Tarihi:</small>
                  <span>{{ \Carbon\Carbon::parse($emir->araccikistarihi)->format('d/m/Y h:i')}}</span>
                </div>
              </div>
            </div>
          </div>
          <!-- logo and title -->
          <div class="row my-2 my-sm-3">
            <div class="col-sm-6 col-12 text-center text-sm-left order-2 order-sm-1">
              <h4 class="text-primary">{{$arac->plaka}}</h4>
              <span>{{ $musteri->adsoyad }}</span>
            </div>
            <div class="col-sm-6 col-12 text-center text-sm-right order-1 order-sm-2 d-sm-flex justify-content-end mb-1 mb-sm-0">
              <img src="{{asset('images/logo/volege-logo.png')}}" alt="logo" height="46" width="164">
            </div>
          </div>
          <hr>
          <!-- invoice address and contact -->
          <div class="row invoice-info">
            <div class="col-sm-6 col-12 mt-1">
              <h6 class="invoice-from">Müşteri Bilgileri</h6>
              <div class="mb-1">
                <span>{{ $musteri->adsoyad }}</span>
              </div>
              <div class="mb-1">
                <span>{{ $musteri->adres }}</span>
              </div>
              <div class="mb-1">
                <span>{{ $musteri->email }}</span>
              </div>
              <div class="mb-1">
                <span>{{ $musteri->telefon }}</span>
              </div>
            </div>
            <div class="col-sm-6 col-12 mt-1">
              <h6 class="invoice-to">Araç Bilgileri</h6>
              <div class="mb-1">
                <span>{{ $arac->plaka }}</span>
              </div>
              <div class="mb-1">
                <span>{{ $arac->marka }}</span>
              </div>
              <div class="mb-1">
                <span>{{ $arac->model }}</span>
              </div>
              <div class="mb-1">
                <span>{{ $emir->km }}</span>
              </div>
              <div class="mb-1">
                <span>Yakıt Durumu: {{ $emir->yakit }}</span>
              </div>
            </div>
          </div>
          <hr>

        <div class="row invoice-info">
          <div class="col-sm-6 col-12 mt-1">
            <h6 class="invoice-from">Müşteri Talepleri</h6>
            @php
            $lines = explode("\n", e($emir->talep));
            @endphp
            <ol>
           @foreach ($lines as $line)
            @if(trim($line) != "")
            <li>{{ $line }}</li>
            @endif
           @endforeach
            </ol>
          </div>
          <div class="col-sm-6 col-12 mt-1">
            <h6 class="invoice-from">Yapılan İşlemler / Açıklamalar</h6>

            @php
            $lines = explode("\n", e($emir->yapilanlar));
            @endphp
            <ol>
           @foreach ($lines as $line)
            @if(trim($line) != "")
            <li>{{ $line }}</li>
            @endif
           @endforeach
            </ol>
          </div>
        </div>
        <hr>
      </div>

        <!-- invoice subtotal -->
        <div class="card-body pt-0 mx-25">
          <div class="row">
            <div class="col-4 col-sm-8 col-12 mt-75">
              <ol class="aciklama">
                <li>Yukarıda belirtilen işlerin en kısa zamanda yapılması için servisinizi yetkili kılıyorum.</li>
                <li>İş tamamlandığında ödeme tarafımdan yapılacaktır.</li>
                <li>Bakım ve onarımı için firmamıza bırakılan araç içindeki özel eşyalardan firmamızın birebir sorumluluğu yoktur.</li>
                <li>Gereğinde yol testi yapılacaktır.</li>
                <li>Yapılan işlerin tutaru tarafımdan nakit veya kredi kartı ile ödenecektir. Aksi takdirde aracımı almayacağımı kabul ediyorum.</li>
                </ol>
            </div>
            <div class="col-4 col-sm-2 col-12 mt-75">
              <p>Teslim Eden</p>
              <p>{{ $emir->teslimeden }}</p>
            </div>
            <div class="col-4 col-sm-2 col-12 mt-75">
              <p>Teslim Alan </p>
              <p>{{ $emir->teslimalan }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- invoice action  -->
    <div class="col-xl-3 col-md-4 col-12">
      <div class="card invoice-action-wrapper shadow-none border">
        <div class="card-body">
          <div class="invoice-action-btn">
            <button class="btn btn-light-primary btn-block invoice-print">
              <i class="bx bx-send"></i>
              <span>Yazdır</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/pages/app-invoice.js')}}"></script>
@endsection
