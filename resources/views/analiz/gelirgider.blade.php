@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title', 'Durum Analizi')

@section('vendor-styles')
  <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
  <style>
    .btn i {
      top: 0px !important;
    }

  </style>
@section('content')
  <section class="list-group-navigation">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Detaylı Durum Analizi</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-12 col-sm-12 col-md-12 ">
                <div class="list-group list-group-horizontal-sm mb-1 text-center" role="tablist">
                  <a class="list-group-item list-group-item-action {{ \Request::is('analiz') || \Request::is('analiz/gelir') ? 'active' : '' }} "
                    id="list-gelir-list" data-toggle="list" href="#list-gelir" role="tab">Gelir</a>
                  <a class="list-group-item list-group-item-action {{ \Request::is('analiz/gider') ? 'active' : '' }}"
                    id="list-gider-list" data-toggle="list" href="#list-gider" role="tab">Gider</a>
                  <!--<a class="list-group-item list-group-item-action {{ \Request::is('analiz/toplam') ? 'active' : '' }}" id="list-toplam-list" data-toggle="list"
                                  href="#list-toplam" role="tab">Toplam</a>-->
                  <a class="list-group-item list-group-item-action {{ \Request::is('analiz/stokencok') ? 'active' : '' }}"
                    id="list-stokencok-list" data-toggle="list" href="#list-stokencok" role="tab">En Çok
                    Satılanlar</a>
                  <a class="list-group-item list-group-item-action {{ \Request::is('analiz/stokazalan') ? 'active' : '' }}"
                    id="list-stokazalan-list" data-toggle="list" href="#list-stokazalan" role="tab">Stokta Azalanlar</a>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 mt-1">
              <div class="tab-content text-justify" id="nav-tabContent">
                <div class="tab-pane show  {{ \Request::is('analiz') || \Request::is('analiz/gelir') ? 'active' : '' }}"
                  id="list-gelir" role="tabpanel" aria-labelledby="list-gelir-list">
                  <form method="POST" action="{{ route('analiz-gelir') }}">
                    @csrf
                    <div class="alert border-warning alert-dismissible mb-2" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                      <div class="d-flex align-items-center">
                        <i class="bx bx-error-circle"></i>
                        <span>
                          Bu menüden ödeme alınan (Gelir) tüm faturaları ve toplamını verilen tarih
                          aralıkları için görüntüleyebilirsiniz.</span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="baslangictarihi" class="col-sm-3 col-form-label">Başlangıç
                        Tarihi</label>
                      <div class="col-sm-9">
                        <input type="date" class="form-control" id="tarihilk" name="tarihilk" placeholder="" required>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="sontarih" class="col-sm-3 col-form-label">Bitiş Tarihi</label>
                      <div class="col-sm-9">
                        <input type="date" class="form-control" id="tarihson" name="tarihson" placeholder="" required>
                      </div>
                    </div>
                    <div class="clearfix">
                      <button type="submit" class="btn btn-md float-right btn-success" type="button">İncele</button>
                    </div>
                  </form>
                  @isset($odemegelir)
                    <table class="table  table-striped mt-4">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Fatura Kodu</th>
                          <th scope="col">Cari Kodu</th>
                          <th scope="col">Ödenen Tutar</th>
                          <th scope="col">Fatura Tutar</th>
                          <th scope="col">Fark</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                          $odenen_toplam = 0;
                          $fatura_toplam = 0;
                        @endphp
                        @foreach ($odemegelir as $odeme)
                          <tr>
                            <td>{!! $loop->index + 1 !!}</td>
                            <th scope="row">{{ $odeme->faturakodu }}</th>
                            <td>{{ $odeme->carikodu }}</td>
                            <td>{{ $odeme->toplamodenen }}</td>
                            <td>{{ $odeme->faturatoplam }}</td>
                            <td>{{ $odeme->faturatoplam - $odeme->toplamodenen }}</td>
                          </tr>
                          @php
                            $odenen_toplam += $odeme->toplamodenen;
                            $fatura_toplam += $odeme->faturatoplam;
                          @endphp
                          @if ($odemegelir->last() === $odeme)
                            <tr>
                              <th>Toplam</th>
                              <th scope="row"></th>
                              <td></td>
                              <td style="color:green">{{ $odenen_toplam }}</td>
                              <td style="color:red">{{ $fatura_toplam }}</td>
                              <td></td>
                            </tr>
                          @endif
                        @endforeach

                      </tbody>
                    </table>
                  @endisset

                </div>

                <div class="tab-pane  {{ \Request::is('analiz/gider') ? 'active' : '' }}" id="list-gider"
                  role="tabpanel" aria-labelledby="list-gider-list">
                  <form method="POST" action="{{ route('analiz-gider') }}">
                    @csrf
                    <div class="alert border-warning alert-dismissible mb-2" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                      <div class="d-flex align-items-center">
                        <i class="bx bx-error-circle"></i>
                        <span>
                          Bu menüden ödeme yaptığınız (Gider) tüm faturaları ve toplamını verilen tarih aralıkları için
                          görüntüleyebilirsiniz.</span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="baslangictarihi" class="col-sm-3 col-form-label">Başlangıç
                        Tarihi</label>
                      <div class="col-sm-9">
                        <input type="date" class="form-control" id="tarihilk" name="tarihilk" placeholder="" required>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="sontarih" class="col-sm-3 col-form-label">Bitiş Tarihi</label>
                      <div class="col-sm-9">
                        <input type="date" class="form-control" id="tarihson" name="tarihson" placeholder="" required>
                      </div>
                    </div>
                    <div class="clearfix">
                      <button type="submit" class="btn btn-md float-right btn-success" type="button">İncele</button>
                    </div>
                  </form>
                  @isset($odemegider)
                    <table class="table  table-striped mt-4">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Fatura Kodu</th>
                          <th scope="col">Cari Kodu</th>
                          <th scope="col">Fatura Durum</th>
                          <th scope="col">Ödenen Miktar</th>
                          <th scope="col">Fatura Toplam</th>
                          <th scope="col">Kalan Tutar</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                          $odenen_toplam = 0;
                          $fatura_toplam = 0;
                        @endphp
                        @foreach ($odemegider as $odeme)
                          <tr>
                            <td>{!! $loop->index + 1 !!}</td>
                            <th scope="row">{{ $odeme->faturakodu }}</th>
                            <td>{{ $odeme->carikodu }}</td>
                            <td>{{ $odeme->faturadurum }}</td>
                            <td>{{ $odeme->toplamodenen }}</td>
                            <td>{{ $odeme->faturatoplam }}</td>
                            <td>{{ $odeme->faturatoplam - $odeme->toplamodenen }}</td>
                          </tr>
                          @php
                            $odenen_toplam += $odeme->toplamodenen;
                            $fatura_toplam += $odeme->faturatoplam;
                          @endphp
                          @if ($odemegider->last() === $odeme)
                            <tr>
                              <th>Toplam</th>
                              <th scope="row"></th>
                              <td></td>
                              <td></td>
                              <td style="color:green">{{ $odenen_toplam }}</td>
                              <td style="color:red">{{ $fatura_toplam }}</td>
                              <td></td>
                            </tr>
                          @endif
                        @endforeach
                      </tbody>
                    </table>
                  @endisset
                </div>

                <div class="tab-pane  {{ \Request::is('analiz/stokencok') ? 'active' : '' }}" id="list-stokencok"
                  role="tabpanel" aria-labelledby="list-stokencok-list">
                  <form method="POST" action='{{ route('analiz-stokencok') }}'>
                    @csrf
                    <div class="alert border-warning alert-dismissible mb-2" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                      <div class="d-flex align-items-center">
                        <i class="bx bx-error-circle"></i>
                        <span>
                          Bu menüden girilen tarih aralığında en çok satılan yedek-parça listesini
                          görüntüyelebilirsiniz.</span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="baslangictarihi" class="col-sm-3 col-form-label">Başlangıç
                        Tarihi</label>
                      <div class="col-sm-9">
                        <input type="date" class="form-control" id="tarihilk" name="tarihilk" placeholder="" required>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="sontarih" class="col-sm-3 col-form-label">Bitiş Tarihi</label>
                      <div class="col-sm-9">
                        <input type="date" class="form-control" id="tarihson" name="tarihson" placeholder="" required>
                      </div>
                    </div>
                    <div class="clearfix">
                      <button type="submit" class="btn btn-md float-right btn-success" type="button">Parça
                        Listele</button>
                    </div>
                  </form>

                  @isset($stokencok)
                    <table class="table table-striped mt-4">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Uretici Kodu</th>
                          <th scope="col">Stok Kodu</th>
                          <th scope="col">Stok Adı</th>
                          <th scope="col">Ürün Grup</th>
                          <th scope="col">Stok Adet</th>
                          <th scope="col" style="color:red">Satılan Adet</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($stokencok as $s)
                          <tr>
                            <td>{!! $loop->index + 1 !!}</td>
                            <th scope="row">{{ $s->ureticikodu }}</th>
                            <td>{{ $s->stokkodu }}</td>
                            <td>{{ $s->stokadi }}</td>
                            <td>{{ $s->urungrup }}</td>
                            <td>{{ $s->stokadet }}</td>
                            <td>{{ $s->toplammiktar }}</td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  @endisset

                </div>
                <div class="tab-pane  {{ \Request::is('analiz/stokazalan') ? 'active' : '' }}" id="list-stokazalan"
                  role="tabpanel" aria-labelledby="list-stokazalan-list">
                  <form method="POST" action='{{ route('analiz-stokazalan') }}'>
                    @csrf
                    <div class="alert border-warning alert-dismissible mb-2" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                      <div class="d-flex align-items-center">
                        <i class="bx bx-error-circle"></i>
                        <span>
                          Bu menüden girdiğiniz miktardan az olan yedek parça listesini
                          görüntüleyebilirsiniz.</span>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="lblstokadet" class="col-sm-3 col-form-label">Stok Adeti</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="stokadet" name="stokadet" placeholder="10" required>
                      </div>
                    </div>

                    <div class="clearfix">
                      <button type="submit" class="btn btn-md float-right btn-success" type="button">Getir </button>
                    </div>
                  </form>
                  @isset($stokazalan)
                    <table class="table table-striped mt-4">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Stok Kodu</th>
                          <th scope="col">Stok Adı</th>
                          <th scope="col">Stok Adet</th>
                          <th scope="col">Stok Birim</th>
                          <th scope="col">Alış Fiyatı</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($stokazalan as $s)
                          <tr>
                            <td>{!! $loop->index + 1 !!}</td>
                            <th scope="row">{{ $s->stokkodu }}</th>
                            <td>{{ $s->stokadi }}</td>
                            <td>{{ $s->stokadet }}</td>
                            <td>{{ $s->birim }}</td>
                            <td>{{ $s->alisfiyati }}</td>
                          </tr>
                        @endforeach

                      </tbody>
                    </table>
                  @endisset
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </section>
@endsection
