@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Cari Hareketler')

@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-invoice.css')}}">
@endsection

{{-- page style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/forms/wizard.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.css" integrity="sha512-uq8QcHBpT8VQcWfwrVcH/n/B6ELDwKAdX4S/I3rYSwYldLVTs7iII2p6ieGCM13QTPEKZvItaNKBin9/3cjPAg==" crossorigin="anonymous" />
@endsection


@section('content')
<section >
  <div class="row">
      <div class="col-12">
      <div class="card">
          @if(Session::get('success'))
          <div class="alert alert-success">
              {{ Session('success')}}
          </div>
          @endif
          @if(Session::get('error'))
          <div class="alert alert-dange">
              {{ Session('error')}}
          </div>
          @endif
          <div class="card-header">
          <h4 class="card-title">Cari Bilgileri</h4>
          </div>
          <div class="card-body">
          <form method="POST" action="{{route('cari-kontrol')}}">
              @csrf
              <div class="form-row">
              <div class="col-md-4 mb-3">
                  <label for="tckimlik_ac">Cari Kodu</label>
                  <input type="text" name="tckimlik" id="tckimlik_ss" placeholder="" autocomplete="off" class="form-control">
              </div>
              <div class="col-md-4 mb-3">
                  <label for="adsoyad">İsim Soyisim</label>
                  <input type="text" class="form-control" id="adsoyad_ss">

              </div>
              <div class="col-md-4 mt-2">
                  <button class="btn btn-primary"> Getir </button>
              </div>
              </div>
          </form>
          </div>
      </div>
      </div>
  </div>
  </section>
      <div class="bg-white p-3 shadow">
        <div class="card invoice-print-area">
          <div class="card-body pb-0 mx-25">
            <!-- header section -->
            <div class="row">
              <div class="col-lg-4 col-md-12">
                <span class="invoice-number mr-50">{{ $cari->adsoyad }}</span>
                <span>{{ $cari->tc }}</span>
              </div>
              <div class="col-lg-8 col-md-12">
                <div class="d-flex align-items-center justify-content-lg-end flex-wrap">
                  <div class="mr-3">
                    <small class="text-muted">Oluşturulma Tarihi:</small>
                    <span>{{ \Carbon\Carbon::now() }}</span>
                  </div>
                </div>
              </div>
            </div>
            <!-- logo and title -->
            <div class="row my-2 my-sm-3">
              <div class="col-sm-6 col-12 text-center text-sm-left order-2 order-sm-1">
                <h4 class="text-primary">Cari Hareketleri</h4>
                <span>{{ $cari->adres }}</span>
              </div>
              <div class="col-sm-6 col-12 text-center text-sm-right order-1 order-sm-2 d-sm-flex justify-content-end mb-1 mb-sm-0">
                <img src="{{asset('images/logo/volege-logo.png')}}" alt="logo" height="46" width="164">
              </div>
            </div>
            <hr>

          <!-- product details table-->
          <div class="table-responsive">
            <table class="table thead-dark mb-0">
              <thead>
                <tr class="border-0">
                  <th scope="col">Fatura No</th>
                    <th scope="col">Ödeme Türü</th>
                    <th scope="col">Ödeme Kanalı</th>
                    <th scope="col">Ödeme Tarihi</th>
                    <th scope="col">Tutar</th>
                    <th scope="col">Bakiye</th>
                </tr>
              </thead>
              @isset($kayitlar)

                <tbody>
                @foreach($kayitlar as $kayit)
                @if(isset($kayit->odeme))
                <tr>
                  <td scope="row">{{$kayit->faturakodu}}</td>
                  <td>{{$kayit->odeme->odemeturu}}</td>
                  <td>{{$kayit->odeme->odemekanali}}</td>
                  <td>{{$kayit->odeme->odemetarihi}}</td>
                  <td class="text-success">{{$kayit->odeme->odenenmiktar}} TL</td>
                  <td class="{{ ($kayit->bakiye<0) ? "text-danger" : "text-success"}} text-right font-weight-bold"> {{$kayit->bakiye}} TL</td>
                </tr>
                @else
                <tr>
                  <td scope="row">{{$kayit->faturakodu}}</td>
                  <td colspan="4">numaralı fatura sonucunda oluşan müşteri borcu.</td>
                  <td class="text-danger text-right font-weight-bold"> {{$kayit->bakiye}} TL</td>
                </tr>
                @endif
                @endforeach
              </tbody>

              @endisset
            </table>
          </div>
          <hr>
          <!-- invoice subtotal -->
          <div class="card-body pt-0 mx-25">
            <div class="row">
              <div class="col-4 col-sm-6 col-12 mt-75">
                <p>Bizi seçtiğiniz için teşekkür ederiz.</p>
              </div>
              <div class="col-8 col-sm-6 col-12 d-flex justify-content-end mt-75">
                  <div class="invoice-calc d-flex justify-content-between ">
                    <h4 class=" text-bold-600">Genel Bakiye: </h4>
                    <h4 class=" text-bold-600 {{ ($genelBakiye<0) ? "text-danger" : "text-success"}}"> {{$genelBakiye}} TL</h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


          <div class="row">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6 mt-75">
              <button class="btn btn-primary btn-block float-right invoice-print">
                <i class="bx bx-printer"></i>
                <span>Yazdır</span>
              </button>
            </div>
          </div>
      </div>
              <!-- Button trigger modal -->
      </div>
@endsection
{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/extensions/jquery.steps.min.js')}}"></script>
<script src="{{asset('vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('js/scripts/pages/app-invoice.js')}}"></script>

@endsection

{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/forms/wizard-steps.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.min.js" integrity="sha512-TToQDr91fBeG4RE5RjMl/tqNAo35hSRR4cbIFasiV2AAMQ6yKXXYhdSdEpUcRE6bqsTiB+FPLPls4ZAFMoK5WA==" crossorigin="anonymous"></script>
<script src="{{asset('js/scripts/autocomplete/autocomplete.js')}}"></script>

@endsection
