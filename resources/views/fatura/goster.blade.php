@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Fatura')
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
              <span class="invoice-number mr-50">Fatura No</span>
              <span>F00001</span>
            </div>
            <div class="col-lg-8 col-md-12">
              <div class="d-flex align-items-center justify-content-lg-end flex-wrap">
                <div class="mr-3">
                  <small class="text-muted">Oluşturulma:</small>
                  <span>08/10/2019 15:00</span>
                </div>
              </div>
            </div>
          </div>
          <!-- logo and title -->
          <div class="row my-2 my-sm-3">
            <div class="col-sm-6 col-12 text-center text-sm-left order-2 order-sm-1">
              <h4 class="text-primary">Volege Otomobil Servis ve Yedek Parça</h4>
              <span>Volege Otomobil Servis ve Yedek Parça</span>
            </div>
            <div class="col-sm-6 col-12 text-center text-sm-right order-1 order-sm-2 d-sm-flex justify-content-end mb-1 mb-sm-0">
              <img src="{{asset('images/logo/volege-logo.png')}}" alt="logo" height="46" width="164">
            </div>
          </div>
          <hr>
          <!-- invoice address and contact -->
          <div class="row invoice-info">
            <div class="col-sm-6 col-12 mt-1">
              <h6 class="invoice-from">Satıcı</h6>
              <div class="mb-1">
                <span>Volege Otomobil Servis ve Yedek Parça.</span>
              </div>
              <div class="mb-1">
                <span>Adalet Mah. Haydar Aliyev Cad, 1601. Sk. No:10, 35000 Bayraklı/İzmir</span>
              </div>
              <div class="mb-1">
                <span>info@volege.com.tr</span>
              </div>
              <div class="mb-1">
                <span>232-461-82-12</span>
              </div>
            </div>
            <div class="col-sm-6 col-12 mt-1">
              <h6 class="invoice-to">Alıcı</h6>
              <div class="mb-1">
                <span>Rafet Durgut</span>
              </div>
              <div class="mb-1">
                <span>Karabük Üniversitesi Bilgisayar Mühendisliği Bölümü</span>
              </div>
              <div class="mb-1">
                <span>rafetdurgut@karabuk.edu.tr</span>
              </div>
              <div class="mb-1">
                <span>555-555-55-55</span>
              </div>
            </div>
          </div>
          <hr>
        </div>
        <!-- product details table-->
        <div class="invoice-product-details table-responsive">
          <table class="table table-borderless mb-0">
            <thead>
              <tr class="border-0">
                <th scope="col">Adı</th>
                <th scope="col">Adeti</th>
                <th scope="col">Birim Fiyat</th>
                <th scope="col">Birim</th>
                <th scope="col" class="text-right">Tutar</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Ön sağ far</td>
                <td>1</td>
                <td>288.00</td>
                <td>Adet</td>
                <td class="text-primary text-right font-weight-bold">288.00</td>
              </tr>
              <tr>
                <td>Ön sağ far</td>
                <td>1</td>
                <td>288.00</td>
                <td>Adet</td>
                <td class="text-primary text-right font-weight-bold">288.00</td>
              </tr>
              <tr>
                <td>Ön sağ far</td>
                <td>1</td>
                <td>288.00</td>
                <td>Adet</td>
                <td class="text-primary text-right font-weight-bold">288.00</td>
              </tr>
              <tr>
                <td>Ön sağ far</td>
                <td>1</td>
                <td>288.00</td>
                <td>Adet</td>
                <td class="text-primary text-right font-weight-bold">288.00</td>
              </tr>
              <tr>
                <td>Ön sağ far</td>
                <td>1</td>
                <td>288.00</td>
                <td>Adet</td>
                <td class="text-primary text-right font-weight-bold">288.00</td>
              </tr>
              <tr>
                <td>Ön sağ far</td>
                <td>1</td>
                <td>288.00</td>
                <td>Adet</td>
                <td class="text-primary text-right font-weight-bold">288.00</td>
              </tr>
              <tr>
                <td>Ön sağ far</td>
                <td>1</td>
                <td>288.00</td>
                <td>Adet</td>
                <td class="text-primary text-right font-weight-bold">288.00</td>
              </tr>
              <tr>
                <td>Ön sağ far</td>
                <td>1</td>
                <td>288.00</td>
                <td>Adet</td>
                <td class="text-primary text-right font-weight-bold">288.00</td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- invoice subtotal -->
        <div class="card-body pt-0 mx-25">
          <hr>
          <div class="row">
            <div class="col-4 col-sm-6 col-12 mt-75">
              <p>Sizin için en iyisi...</p>
            </div>
            <div class="col-8 col-sm-6 col-12 d-flex justify-content-end mt-75">
              <div class="invoice-subtotal">
                <div class="invoice-calc d-flex justify-content-between">
                  <span class="invoice-title">Alt Tutar</span>
                  <span class="invoice-value">1250.00 TL</span>
                </div>
                <div class="invoice-calc d-flex justify-content-between">
                  <span class="invoice-title">İskonto</span>
                  <span class="invoice-value">- 123.00 TL</span>
                </div>
                <div class="invoice-calc d-flex justify-content-between">
                  <span class="invoice-title">KDV</span>
                  <span class="invoice-value">123.00 TL</span>
                </div>
                <hr>
                <div class="invoice-calc d-flex justify-content-between">
                  <span class="invoice-title">Toplam Tutar</span>
                  <span class="invoice-value">123.00 TL</span>
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
            <button class="btn btn-primary btn-block invoice-send-btn">
              <i class="bx bx-send"></i>
              <span>Müşteriye Gönder</span>
            </button>
          </div>
          <div class="invoice-action-btn">
            <button class="btn btn-light-primary btn-block invoice-print">
              <span>Yazdır</span>
            </button>
          </div>
          <div class="invoice-action-btn">
            <a href="{{asset('fatura/duzenle/123')}}" class="btn btn-light-primary btn-block">
              <span>Faturayı Düzenle</span>
            </a>
          </div>
          <div class="invoice-action-btn">
            <button class="btn btn-success btn-block">
              <span>Ödeme Al</span>
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
