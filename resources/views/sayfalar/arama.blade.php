@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Arama')
@section('vendor-styles')
<link rel="stylesheet" href="{{asset('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
<style>
  .btn i {
    top:0px !important;
  }
  </style>
@section('content')
<section class="list-group-navigation">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Detaylı Arama</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-12 col-md-12 ">
              <div class="list-group list-group-horizontal-sm mb-1 text-center" role="tablist">
                <a class="list-group-item list-group-item-action {{ \Request::is('arama') || \Request::is('arama/musteri') ? "active" : "" }} " id="list-musteri-list" data-toggle="list"
                  href="#list-musteri" role="tab">Müşteri</a>
                <a class="list-group-item list-group-item-action {{ \Request::is('arama/arac') ? "active" : "" }}" id="list-arac-list" data-toggle="list"
                  href="#list-arac" role="tab">Araç</a>
                <a class="list-group-item list-group-item-action {{ \Request::is('arama/isemri') ? "active" : "" }}" id="list-isemri-list" data-toggle="list"
                  href="#list-isemri" role="tab">İş Emri</a>
                <a class="list-group-item list-group-item-action {{ \Request::is('arama/parca') ? "active" : "" }}" id="list-parca-list" data-toggle="list"
                  href="#list-parca" role="tab">Yedek Parça</a>
                <a class="list-group-item list-group-item-action {{ \Request::is('arama/ekspertiz') ? "active" : "" }}" id="list-ekspertiz-list" data-toggle="list"
                  href="#list-ekspertiz" role="tab">Ekspertiz</a>
              </div>
            </div>
          </div>
            <div class="col-12 col-sm-12 col-md-12 mt-1">
              <div class="tab-content text-justify" id="nav-tabContent">
                <div class="tab-pane show  {{ \Request::is('arama') || \Request::is('arama/musteri') ? "active" : "" }}" id="list-musteri" role="tabpanel" aria-labelledby="list-musteri-list">
                  <form method="POST" action="{{ route('arama-musteri') }}">
                    @csrf
                    <div class="form-group row">
                      <label for="adsoyad" class="col-sm-3 col-form-label">Ad Soyad</label>
                      <div class="col-sm-9">
                      <input type="text" class="form-control" id="adsoyad" name="adsoyad" placeholder="" autocomplete="off">
                      </div>
                  </div>
                  <div class="form-group row">
                    <label for="tckimlikno" class="col-sm-3 col-form-label">TC Kimlik No</label>
                    <div class="col-sm-9">
                    <input type="text" name="tckimlikno" class="form-control" id="tckimlikno" placeholder="" autocomplete="off">
                    </div>
                </div>
                <div class="clearfix">
                    <button type="submit" class="btn btn-md float-right btn-success" type="button">Getir </button>
                </div>
                  </form>

                      @isset($musteriler)
                      <table class="table  table-striped mt-4">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Adı Soyadı</th>
                            <th scope="col">Telefon</th>
                            <th scope="col">E-Mail</th>
                            <th scope="col">Adres</th>
                            <th scope="col">İşlemler</th>

                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($musteriler as $musteri)
                        <tr>
                          <th scope="row">{{ $musteri->tc }}</th>
                          <td>{{ $musteri->adsoyad }}</td>
                          <td>{{ $musteri->telefon }}</td>
                          <td>{{ $musteri->email }}</td>
                          <td>{{ $musteri->adres }}</td>
                          <td><a class="btn btn-info btn-sm" href="{{ route('cari-duzenle', $musteri->tc) }}" data-toggle="tooltip" data-placement="top" title="Müşteri düzenle.">
                              <i class="fa fa-edit"></i> </a>

                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                      @endisset

                </div>

                <div class="tab-pane  {{  \Request::is('arama/arac')  ? "active" : "" }}" id="list-arac" role="tabpanel" aria-labelledby="list-arac-list">
                  <form method="POST" action="{{ route('arama-arac') }}">
                    @csrf
                    <div class="form-group row">
                      <label for="plaka" class="col-sm-3 col-form-label">Plaka</label>
                      <div class="col-sm-9">
                      <input type="text" class="form-control" id="plaka" name="plaka" placeholder="">
                      </div>
                  </div>
                  <div class="form-group row">
                    <label for="saseno" class="col-sm-3 col-form-label">Şase No</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="saseno" name="saseno" placeholder="">
                    </div>
                </div>
                <div class="clearfix">
                    <button type="submit" class="btn btn-md float-right btn-success" type="button">Getir </button>
                </div>
                  </form>

                      @isset($araclar)
                      <table class="table table-striped mt-4">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Plaka</th>
                            <th scope="col">Marka</th>
                            <th scope="col">Model</th>
                            <th scope="col">Şase No</th>
                            <th scope="col">İşlemler</th>

                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($araclar as $arac)
                        <tr>
                          <th scope="row">{{ $arac->id }}</th>
                          <td>{{ $arac->plaka }}</td>
                          <td>{{ $arac->marka }}</td>
                          <td>{{ $arac->model }}</td>
                          <td>{{ $arac->saseno }}</td>
                          <td><a class="btn btn-info btn-sm" href="{{route('arac-duzenle',$arac->id)}}" data-toggle="tooltip" data-placement="top" title="Araç düzenle.">
                              <i class="fa fa-edit"></i> </a>
                          </td>
                        </tr>
                        @endforeach

                    </tbody>
                  </table>
                      @endisset

                </div>
                <div class="tab-pane  {{  \Request::is('arama/isemri')  ? "active" : "" }}" id="list-isemri" role="tabpanel" aria-labelledby="list-isemri-list">
                  <form method="POST" action='{{ route('arama-isemri') }}'>
                    @csrf
                    <div class="form-group row">
                      <label for="emirkodu" class="col-sm-3 col-form-label">Emir Kodu</label>
                      <div class="col-sm-9">
                      <input type="text" class="form-control" id="emirkodu" name="emirkodu" placeholder="">
                      </div>
                  </div>
                  <div class="form-group row">
                    <label for="emirtarihi" class="col-sm-3 col-form-label">Emir Tarihi</label>
                    <div class="col-sm-9">
                    <input type="date" class="form-control" id="emirtarihi" name="emirtarihi" placeholder="">
                    </div>
                </div>

                <div class="clearfix">
                    <button type="submit" class="btn btn-md float-right btn-success" type="button">Getir </button>
                </div>
                  </form>

                      @isset($emirler)
                      <table class="table table-striped mt-4">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Araç Plaka</th>
                            <th scope="col">Müşteri</th>
                            <th scope="col">Giriş Tarihi</th>
                            <th scope="col">Çıkış Tarihi</th>
                            <th scope="col">İşlemler</th>

                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($emirler as $emir )
                        <tr>
                          <th scope="row">{{ $emir->id }}</th>
                          <td>{{  $emir->plaka }}</td>
                          <td>{{  $emir->adsoyad }}</td>
                          <td>{{  $emir->aracgiristarihi }}</td>
                          <td>{{  isset($emir->araccikistarihi) ? $emir->araccikistarihi : "İçeride"  }}</td>
                          <td><a class="btn btn-info btn-sm" href="{{ route('isemri-goster',$emir->id) }}" data-toggle="tooltip" data-placement="top" title="Görüntüle.">
                              <i class="fa fa-edit"></i> </a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                      @endisset

                </div>
                <div class="tab-pane  {{  \Request::is('arama/parca')  ? "active" : "" }}" id="list-parca" role="tabpanel" aria-labelledby="list-parca-list">
                  <form method="POST" action='{{ route('arama-parca') }}'>
                    @csrf
                  <div class="form-group row">
                    <label for="stokkodu" class="col-sm-3 col-form-label">Stok Kodu</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="stokkodu" name="stokkodu" placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                  <label for="parcaadi" class="col-sm-3 col-form-label">Parça Adı</label>
                  <div class="col-sm-9">
                  <input type="text" class="form-control" name="parcaadi" id="parcaadi" placeholder="">
                  </div>
              </div>
              <div class="form-group row">
                <label for="grup" class="col-sm-3 col-form-label">Grup</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" id="grup" name="grup" placeholder="">
                </div>
            </div>
              <div class="clearfix">
                  <button type="submit" class="btn btn-md float-right btn-success" type="button">Getir </button>
              </div>
                </form>
                  @isset($parcalar)
                  <table class="table table-striped mt-4">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Stok Kodu</th>
                        <th scope="col">Adı</th>
                        <th scope="col">Grup</th>
                        <th scope="col">Satış Fiyatı</th>
                        <th scope="col">İşlemler</th>
  
                      </tr>
                    </thead>
                    <tbody>
                     @foreach($parcalar as $parca)
                      <tr>
                        <th scope="row">{{$parca->id}}</th>
                        <td>{{$parca->stokkodu}}</td>
                        <td>{{$parca->stokadi}}</td>
                        <td>{{$parca->urungrup}}</td>
                        <td>{{$parca->satisfiyati}}</td>
                        <td><a class="btn btn-info btn-sm" href="{{route('yedekparca-duzenle',$parca->idg)}}" data-toggle="tooltip" data-placement="top" title="Parça düzenle.">
                            <i class="fa fa-edit"></i> </a>
                        </td>
                      </tr>
                     @endforeach
               
                    </tbody>
                  </table>
                  @endisset
              </div>
              <div class="tab-pane  {{  \Request::is('arama/ekspertiz')  ? "active" : "" }}" id="list-ekspertiz" role="tabpanel" aria-labelledby="list-ekspertiz-list">
                <form method="POST" action='{{ route('arama-ekspertiz') }}'>
                  @csrf
                <div class="form-group row">
                  <label for="ekspertizkodu" class="col-sm-3 col-form-label">Ekspertiz Kodu</label>
                  <div class="col-sm-9">
                  <input type="text" class="form-control" id="ekspertizkodu" name="ekspertizkodu" placeholder="">
                  </div>
              </div>

              <div class="form-group row">
                <label for="plaka" class="col-sm-3 col-form-label">Araç Plaka</label>
                <div class="col-sm-9">
                <input type="text" class="form-control" id="plaka" name="plaka" placeholder="">
                </div>
            </div>
              <div class="form-group row">
                <label for="ekspertiztarihi" class="col-sm-3 col-form-label">Ekspertiz Tarihi</label>
                <div class="col-sm-9">
                <input type="date" class="form-control" name="ekspertiztarihi" id="ekspertiztarihi" placeholder="">
                </div>
            </div>

            <div class="clearfix">
                <button type="submit" class="btn btn-md float-right btn-success" type="button">Getir </button>
            </div>
              </form>
              @isset($eksperler)
                    <table class="table table-striped mt-4">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Araç Plaka</th>
                          <th scope="col">Müşteri</th>
                          <th scope="col">Giriş Tarihi</th>
                          <th scope="col">Resim?</th>
                          <th scope="col">İşlemler</th>

                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($eksperler as $emir )
                      <tr>
                        <th scope="row">{{ $emir->id }}</th>
                        <td>{{  $emir->plaka }}</td>
                        <td>{{  $emir->adsoyad }}</td>
                        <td>{{  $emir->aracgiristarihi }}</td>
                        <td>
                          @isset($emir->resimurl)
                          <a href="{{asset('storage/'.$emir->resimurl)}}" target="_blank"> Aç </a>
                          @endisset
                        </td>
                        <td><a class="btn btn-info btn-sm" href="{{route('ekspertiz-goster',$emir->id)}}" data-toggle="tooltip" data-placement="top" title="Görüntüle.">
                            <i class="fa fa-eye"></i> </a>
                        </td>
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
