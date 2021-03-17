@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Rafet Durgut Cari Hareketleri')
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-invoice.css')}}">
@endsection
@section('content')
<section id="tooltip-validation">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Cari Bilgileri</h4>
        </div>
        <div class="card-body">
          <form class="needs-validation was-validated" novalidate="">
            <div class="form-row">
              <div class="col-md-4 mb-3">
                <label for="validationTooltip01">Cari Kodu</label>
                <input type="text" class="form-control" id="validationTooltip01" placeholder="First name" value="CM00001" required="">
              </div>
              <div class="col-md-4 mb-3">
                <label for="validationTooltip02">İsim Soyisim</label>
                <input type="text" class="form-control" id="validationTooltip02" placeholder="Last name" value="Rafet Durgut" required="">
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
                <span class="invoice-number mr-50">Rafet Durgut</span>
                <span>CM00001</span>
              </div>
              <div class="col-lg-8 col-md-12">
                <div class="d-flex align-items-center justify-content-lg-end flex-wrap">
                  <div class="mr-3">
                    <small class="text-muted">Oluşturulma Tarihi:</small>
                    <span>08/10/2019</span>
                  </div>
                </div>
              </div>
            </div>
            <!-- logo and title -->
            <div class="row my-2 my-sm-3">
              <div class="col-sm-6 col-12 text-center text-sm-left order-2 order-sm-1">
                <h4 class="text-primary">Cari Hareketleri</h4>
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
                <h6 class="invoice-to">Cari</h6>
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
          <div class="table-responsive">
            <table class="table thead-dark mb-0">
              <thead>
                <tr class="border-0">
                  <th scope="col">#</th>
                    <th scope="col">Ödeme Türü</th>
                    <th scope="col">Ödeme Kanalı</th>
                    <th scope="col">Ödeme Tarihi</th>
                    <th scope="col">Açıklama</th>
                    <th scope="col">Tutar</th>
                    <th scope="col">Bakiye</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">VM0001</th>
                  <td>Banka</td>
                  <td>Alacak</td>
                  <td>12.09.1989 12:00</td>
                  <td>bakım hizmeti.</td>
                  <td>-500 TL</td>
                  <td class="text-primary text-right font-weight-bold"> -500 TL</td>
                </tr>
                <tr>
                  <th scope="row">VM000112</th>
                  <td>Banka</td>
                  <td>Borç</td>
                  <td>12.09.1989 12:00</td>
                  <td>bakım hizmeti.</td>
                  <td>-500 TL</td>
                  <td class="text-danger text-right font-weight-bold"> -500 TL</td>
                </tr>
                <tr>
                  <th scope="row">VM000123</th>
                  <td>Borç</td>
                  <td>Banka</td>
                  <td>12.09.1989 12:00</td>
                  <td>bakım hizmeti.</td>
                  <td>-500 TL</td>
                  <td class="text-primary text-right font-weight-bold"> -500 TL</td>
                </tr>

                <tr>
                  <th scope="row">VM000321</th>
                  <td>Alacak</td>
                  <td>Banka</td>
                  <td>12.09.1989 12:00</td>
                  <td>bakım hizmeti.</td>
                  <td>-500 TL</td>
                  <td class="text-primary text-right font-weight-bold"> -500 TL</td>
                </tr>

                <tr>
                  <th scope="row">VM000321</th>
                  <td>Borç</td>
                  <td>Banka</td>
                  <td>12.09.1989 12:00</td>
                  <td>bakım hizmeti.</td>
                  <td>-500 TL</td>
                  <td class="text-primary text-right font-weight-bold"> -500 TL</td>
                </tr>

              </tbody>
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
                  <div class="invoice-calc d-flex justify-content-between">
                    <p class=" text-bold-600">Genel Bakiye: </p>
                    <p class=" text-bold-600"> 1100.25 TL</p>
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
{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/pages/app-invoice.js')}}"></script>
@endsection
