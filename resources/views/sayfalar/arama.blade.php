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
            <div class="col-12 col-sm-12 col-md-4 ">
              <div class="list-group" role="tablist">
                <a class="list-group-item list-group-item-action active" id="list-musteri-list" data-toggle="list"
                  href="#list-musteri" role="tab">Müşteri</a>
                <a class="list-group-item list-group-item-action" id="list-arac-list" data-toggle="list"
                  href="#list-arac" role="tab">Araç</a>
                <a class="list-group-item list-group-item-action" id="list-isemri-list" data-toggle="list"
                  href="#list-isemri" role="tab">İş Emri</a>
                <a class="list-group-item list-group-item-action" id="list-parca-list" data-toggle="list"
                  href="#list-parca" role="tab">Yedek Parça</a>
                <a class="list-group-item list-group-item-action" id="list-ekspertiz-list" data-toggle="list"
                  href="#list-ekspertiz" role="tab">Ekspertiz</a>
              </div>
            </div>
            <div class="col-12 col-sm-12 col-md-8 mt-1">
              <div class="tab-content text-justify" id="nav-tabContent">
                <div class="tab-pane show active" id="list-musteri" role="tabpanel" aria-labelledby="list-musteri-list">
                  <form>
                    <div class="form-group row">
                      <label for="adsoyad" class="col-sm-3 col-form-label">Ad Soyad</label>
                      <div class="col-sm-9">
                      <input type="text" class="form-control" id="adsoyad" name="adsoyad" placeholder="">
                      </div>
                  </div>
                  <div class="form-group row">
                    <label for="tckimlikno" class="col-sm-3 col-form-label">TC Kimlik No</label>
                    <div class="col-sm-9">
                    <input type="password" name="tckimlikno" class="form-control" id="tckimlikno" placeholder="">
                    </div>
                </div>
                <div class="clearfix">
                    <button class="btn btn-md float-right btn-success" type="button">Getir </button>
                </div>
                  </form>
                  <table class="table-responsive table-striped mt-4">
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
                      <tr>
                        <th scope="row">1</th>
                        <td>123456</td>
                        <td>35ABC35</td>
                        <td>Rafet Durgut</td>
                        <td>12.09.1989</td>
                        <td><a class="btn btn-info btn-sm" href="#" data-toggle="tooltip" data-placement="top" title="Müşteri düzenle.">
                            <i class="fa fa-edit"></i> </a>
                            <a class="btn btn-info btn-sm" href="#" data-toggle="tooltip" data-placement="top" title="Müşteri detaylı bilgilerini gör.">
                                <i class="fa fa-user"></i> </a>

                        </td>

                      </tr>
                      <tr>
                        <th scope="row">1</th>
                        <td>123456</td>
                        <td>35ABC35</td>
                        <td>Rafet Durgut</td>
                        <td>12.09.1989</td>
                        <td><a class="btn btn-info btn-sm" href="#" data-toggle="tooltip" data-placement="top" title="Müşteri düzenle.">
                            <i class="fa fa-edit"></i> </a>
                            <a class="btn btn-info btn-sm" href="#" data-toggle="tooltip" data-placement="top" title="Müşteri detaylı bilgilerini gör.">
                                <i class="fa fa-user"></i> </a>

                        </td>

                      </tr>

                    </tbody>
                  </table>
                </div>

                <div class="tab-pane" id="list-arac" role="tabpanel" aria-labelledby="list-arac-list">
                  <form>
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
                    <button class="btn btn-md float-right btn-success" type="button">Getir </button>
                </div>
                  </form>
                  <table class="table-responsive table-striped mt-4">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Plaka</th>
                        <th scope="col">Marka</th>
                        <th scope="col">Model</th>
                        <th scope="col">KM</th>
                        <th scope="col">İşlemler</th>

                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>123456</td>
                        <td>35ABC35</td>
                        <td>Rafet Durgut</td>
                        <td>12.09.1989</td>
                        <td><a class="btn btn-info btn-sm" href="#" data-toggle="tooltip" data-placement="top" title="Araç düzenle.">
                            <i class="fa fa-edit"></i> </a>
                            <a class="btn btn-info btn-sm" href="#" data-toggle="tooltip" data-placement="top" title="Araç kartını gör.">
                                <i class="fa fa-car"></i> </a>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">1</th>
                        <td>123456</td>
                        <td>35ABC35</td>
                        <td>Rafet Durgut</td>
                        <td>12.09.1989</td>
                        <td><a class="btn btn-info btn-sm" href="#" data-toggle="tooltip" data-placement="top" title="Müşteri düzenle.">
                            <i class="fa fa-edit"></i> </a>
                            <a class="btn btn-info btn-sm" href="#" data-toggle="tooltip" data-placement="top" title="Müşteri detaylı bilgilerini gör.">
                                <i class="fa fa-user"></i> </a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane" id="list-isemri" role="tabpanel" aria-labelledby="list-isemri-list">
                  <form>
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
                    <button class="btn btn-md float-right btn-success" type="button">Getir </button>
                </div>
                  </form>
                  <table class="table-responsive table-striped mt-4">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Plaka</th>
                        <th scope="col">Müşteri</th>
                        <th scope="col">Giriş Tarihi</th>
                        <th scope="col">Çıkış Tarihi</th>
                        <th scope="col">İşlemler</th>

                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>123456</td>
                        <td>35ABC35</td>
                        <td>Rafet Durgut</td>
                        <td>12.09.1989</td>
                        <td><a class="btn btn-info btn-sm" href="#" data-toggle="tooltip" data-placement="top" title="Görüntüle.">
                            <i class="fa fa-edit"></i> </a>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">1</th>
                        <td>123456</td>
                        <td>35ABC35</td>
                        <td>Rafet Durgut</td>
                        <td>12.09.1989</td>
                        <td><a class="btn btn-info btn-sm" href="#" data-toggle="tooltip" data-placement="top" title="Müşteri düzenle.">
                            <i class="fa fa-edit"></i> </a>
                            <a class="btn btn-info btn-sm" href="#" data-toggle="tooltip" data-placement="top" title="Müşteri detaylı bilgilerini gör.">
                                <i class="fa fa-user"></i> </a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane" id="list-parca" role="tabpanel" aria-labelledby="list-parca-list"> <form>
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
                  <button class="btn btn-md float-right btn-success" type="button">Getir </button>
              </div>
                </form>
                <table class="table-responsive table-striped mt-4">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Stok Kodu</th>
                      <th scope="col">Adı</th>
                      <th scope="col">Grup Kodu</th>
                      <th scope="col">Alış Fiyatı</th>
                      <th scope="col">İşlemler</th>

                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>123456</td>
                      <td>35ABC35</td>
                      <td>Rafet Durgut</td>
                      <td>12.09.1989</td>
                      <td><a class="btn btn-info btn-sm" href="#" data-toggle="tooltip" data-placement="top" title="Parça düzenle.">
                          <i class="fa fa-edit"></i> </a>
                          <a class="btn btn-info btn-sm" href="#" data-toggle="tooltip" data-placement="top" title="Parça hareketlerini gör.">
                              <i class="fa fa-car"></i> </a>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">1</th>
                      <td>123456</td>
                      <td>35ABC35</td>
                      <td>Rafet Durgut</td>
                      <td>12.09.1989</td>
                      <td><a class="btn btn-info btn-sm" href="#" data-toggle="tooltip" data-placement="top" title="Müşteri düzenle.">
                          <i class="fa fa-edit"></i> </a>
                          <a class="btn btn-info btn-sm" href="#" data-toggle="tooltip" data-placement="top" title="Müşteri detaylı bilgilerini gör.">
                              <i class="fa fa-user"></i> </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="tab-pane" id="list-ekspertiz" role="tabpanel" aria-labelledby="list-ekspertiz-list"><form>
                <div class="form-group row">
                  <label for="ekspertizkodu" class="col-sm-3 col-form-label">Ekspertiz Kodu</label>
                  <div class="col-sm-9">
                  <input type="text" class="form-control" id="ekspertizkodu" name="ekspertizkodu" placeholder="">
                  </div>
              </div>
              <div class="form-group row">
                <label for="ekspertiztarihi" class="col-sm-3 col-form-label">Ekspertiz Tarihi</label>
                <div class="col-sm-9">
                <input type="date" class="form-control" name="ekspertiztarihi" id="ekspertiztarihi" placeholder="">
                </div>
            </div>

            <div class="clearfix">
                <button class="btn btn-md float-right btn-success" type="button">Getir </button>
            </div>
              </form>
              <table class="table-responsive table-striped mt-4">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Plaka</th>
                    <th scope="col">Müşteri</th>
                    <th scope="col">Giriş Tarihi</th>
                    <th scope="col">Çıkış Tarihi</th>
                    <th scope="col">İşlemler</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>123456</td>
                    <td>35ABC35</td>
                    <td>Rafet Durgut</td>
                    <td>12.09.1989</td>
                    <td><a class="btn btn-info btn-sm" href="#" data-toggle="tooltip" data-placement="top" title="Görüntüle.">
                        <i class="fa fa-edit"></i> </a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">1</th>
                    <td>123456</td>
                    <td>35ABC35</td>
                    <td>Rafet Durgut</td>
                    <td>12.09.1989</td>
                    <td><a class="btn btn-info btn-sm" href="#" data-toggle="tooltip" data-placement="top" title="Müşteri düzenle.">
                        <i class="fa fa-edit"></i> </a>
                        <a class="btn btn-info btn-sm" href="#" data-toggle="tooltip" data-placement="top" title="Müşteri detaylı bilgilerini gör.">
                            <i class="fa fa-user"></i> </a>
                    </td>
                  </tr>
                </tbody>
              </table>
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
