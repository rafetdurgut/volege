@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','İş Emri Arama')

{{-- page style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/forms/wizard.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />

@endsection

@section('content')
<form>
  <div class="bg-white p-3 shadow">
      <legend> Arama Formu </legend>
          <div class="form-group row">
              <label for="tc_kimlik" class="col-sm-3 col-form-label">İş Emri Kodu:</label>
              <div class="col-sm-9">
                  <input type="email" class="form-control" id="tc_kimlik" placeholder="" required autocomplete="off">
              </div>
          </div>
          <div class="form-group row">
              <label for="tc_kimlik" class="col-sm-3 col-form-label">Araç Plaka:</label>
              <div class="col-sm-9">
                  <input type="email" class="form-control" id="tc_kimlik" placeholder="" required autocomplete="off">
              </div>
          </div>
          <div class="form-group row">
              <label for="tc_kimlik" class="col-sm-3 col-form-label">Müşteri TC Kimlik:</label>
              <div class="col-sm-9">
                  <input type="email" class="form-control" id="tc_kimlik" placeholder="" required autocomplete="off">
              </div>
          </div>
          <div class="form-group row">
              <label for="tc_kimlik" class="col-sm-3 col-form-label">Müşteri Adı Soyadı:</label>
              <div class="col-sm-9">
                  <input type="email" class="form-control" id="tc_kimlik" placeholder="" required autocomplete="off">
              </div>
          </div>
          <div class="clearfix">
              <button type="submit" class="btn btn-primary btn-lg float-right">İş Emri Ara</button>
          </div>

          <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">İş Emri</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Ekspertiz</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Resimli Ekspertiz</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Emir Kodu</th>
                          <th scope="col">Plaka</th>
                          <th scope="col">Müşteri</th>
                          <th scope="col">Tarihi</th>
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
                          <td><a class="btn btn-info btn-sm" href="#">
                              <i class="fa fa-search"></i> </a>
                              <a class="btn btn-info btn-sm" href="#">
                                  <i class="fa fa-print"></i> </a>
                          </td>

                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>123456</td>
                          <td>35ABC35</td>
                          <td>Rafet Durgut</td>
                          <td>12.09.1989</td>
                          <td><a class="btn btn-info btn-sm" href="#">
                              <i class="fa fa-search"></i> </a>
                              <a class="btn btn-info btn-sm" href="#">
                                  <i class="fa fa-print"></i> </a>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>123456</td>
                          <td>35ABC35</td>
                          <td>Rafet Durgut</td>
                          <td>12.09.1989</td>
                          <td><a class="btn btn-info btn-sm" href="#">
                              <i class="fa fa-search"></i> </a>
                              <a class="btn btn-info btn-sm" href="#">
                                  <i class="fa fa-print"></i> </a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
              </div>
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
              <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
            </div>

  </div>
</form>

@endsection
