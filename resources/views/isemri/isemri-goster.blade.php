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
                  <span>{{$emir->created_at}}</span>
                </div>
                <div>
                  <small class="text-muted">Araç Çıkış Tarihi:</small>
                  <span>{{$emir->araccikistarihi}}</span>
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
                <span>Yakıt Durumu: {{ $emir->yakit }}</span>
              </div>
            </div>
          </div>
          <hr>

        <div class="row invoice-info">
          <div class="col-sm-6 col-12 mt-1">
            <h6 class="invoice-from">Müşteri Talepleri</h6>
              {!! nl2br(e($emir->talep)) !!}

          </div>
          <div class="col-sm-6 col-12 mt-1">
            <h6 class="invoice-from">Yapılan İşlemler / Açıklamalar</h6>
            {!! nl2br(e($emir->yapilanlar)) !!}
          </div>
        </div>
        <hr>
      </div>
        <!-- product details table-->
        <div class="invoice-product-details table-responsive">
          <h5 class="text-center ml-2"> Fatura Yedek Parça Listesi </h5>
          <table class="table table-borderless mb-0">
            <thead>
              <tr class="border-0">
                <th scope="col">Parça Kodu</th>
                <th scope="col">Parça Adı</th>
                <th scope="col">Adet</th>
                <th scope="col">Fiyat</th>
                <th scope="col">İskonto</th>
                <th scope="col" class="text-right">Toplam Tutar</th>
              </tr>
            </thead>
            <tbody>
              @isset($parcalar)
              @php $aratoplam = 0; $indirimtoplam=0; @endphp
              @foreach($parcalar as $parca)
              @php $aratoplam += floatval($parca->toplamfiyat); @endphp
              @php $indirimtoplam += floatval($parca->adet * $parca->satisfiyati - $parca->toplamfiyat); @endphp
              <tr>
                <td>{{$parca->stokkodu}}</td>
                <td>{{$parca->stokadi}}</td>
                <td>{{$parca->adet}}</td>
                <td>{{$parca->satisfiyati}} ₺</td>
                <td>%{{$parca->iskonto}}</td>
                <td class="text-primary text-right font-weight-bold">{{$parca->toplamfiyat}} ₺</td>
              </tr>
              @endforeach
              @endisset
            </tbody>
          </table>
        </div>

        <!-- invoice subtotal -->
        <div class="card-body pt-0 mx-25">
          <hr>
          <div class="row">
            <div class="col-4 col-sm-6 col-12 mt-75">
              <p>Volege Otomobil Servis ve Yedek Parça Ltd. Şti.</p>
            </div>
            <div class="col-8 col-sm-6 col-12 d-flex justify-content-end mt-75">
              <div class="invoice-subtotal">
                <div class="invoice-calc d-flex justify-content-between">
                  <span class="invoice-title">Ara Toplam</span>
                  <span class="invoice-value">{{  number_format((float) $aratoplam, 2, '.', '')  }} ₺</span>
                </div>
                <div class="invoice-calc d-flex justify-content-between">
                  <span class="invoice-title">İndirim</span>
                  <span class="invoice-value">{{ number_format((float) $indirimtoplam, 2, '.', '') }} ₺</span>
                </div>

                <div class="invoice-calc d-flex justify-content-between">
                  <span class="invoice-title">KDV (%18) </span>
                  <span class="invoice-value">{{ number_format((float) $aratoplam*0.18, 2, '.', '') }} ₺ </span>
                </div>
                <hr>
                <div class="invoice-calc d-flex justify-content-between">
                  <span class="invoice-title">Fatura Toplamı</span>
                  <span class="invoice-value">{{ number_format((float) $aratoplam*1.18, 2, '.', '')  }} ₺</span>
                </div>
              </div>

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
          <div class="invoice-action-btn">
            <a href="{{asset('app/invoice/edit')}}" class="btn btn-light-primary btn-block">
              <span>Araç Kartı Oluştur</span>
            </a>
          </div>
          <div class="invoice-action-btn">
            <button class="btn btn-success btn-block">
              <i class='bx bx-dollar'></i>
              <span>Fatura Kes</span>
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
