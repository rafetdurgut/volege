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
<form method="POST" action="{{route('isemri-arama')}}">
@csrf
  <div class="bg-white p-3 shadow">
      <legend> Arama Formu </legend>
          <div class="form-group row">
              <label for="isemrikodu" class="col-sm-3 col-form-label">İş Emri Kodu:</label>
              <div class="col-sm-9">
                  <input type="text" class="form-control" value="{{old('isemrikodu')}}" name="isemrikodu" placeholder="" autocomplete="off">
              </div>
          </div>
          <div class="form-group row">
            <label for="saseno" class="col-sm-3 col-form-label">Araç Şase No:</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" value="{{old('saseno') }}" name="saseno" id="saseno" placeholder="" autocomplete="off">
            </div>
        </div>
          <div class="form-group row">
              <label for="plaka" class="col-sm-3 col-form-label">Araç Plaka:</label>
              <div class="col-sm-9">
                  <input type="text" class="form-control" value="{{old('plaka')}}" name="plaka" id="plaka" placeholder="" autocomplete="off">
              </div>
          </div>
          <div class="form-group row">
              <label for="tckimlik" class="col-sm-3 col-form-label">Müşteri TC Kimlik:</label>
              <div class="col-sm-9">
                  <input type="text" class="form-control" value="{{old('tckimlik')}}" name="tckimlik" id="tckimlik" placeholder="" autocomplete="off">
              </div>
          </div>
          <div class="form-group row">
              <label for="adsoyad" class="col-sm-3 col-form-label">Müşteri Adı Soyadı:</label>
              <div class="col-sm-9">
                  <input type="text" class="form-control" value="{{old('adsoyad')}}" name="adsoyad" id="adsoyad" placeholder=""  autocomplete="off">
              </div>
          </div>
          <div class="clearfix">
              <button type="submit" class="btn btn-primary btn-lg float-right">İş Emri Ara</button>
          </div>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">Emir Kodu</th>
                          <th scope="col">Plaka</th>
                          <th scope="col">Müşteri</th>
                          <th scope="col">Giriş Tarihi</th>
                          <th scope="col">Çıkış Tarihi</th>
                          <th scope="col">İşlemler</th>

                        </tr>
                      </thead>
                      <tbody>
                        @if(isset($emirler))
                        @foreach($emirler as $emir)
                        <tr>
                          <td>{{$emir->id}}</td>
                          <td>{{$emir->plaka}}</td>
                          <td>{{$emir->adsoyad}}</td>
                          <td>{{$emir->aracgiristarihi}}</td>
                          <td>{{$emir->araccikistarihi}}</td>
                          <td><a class="btn btn-info btn-sm" href="{{route('isemri-goster',$emir->id)}}">
                              <i class="fa fa-search"></i> </a>
                              <a class="btn btn-info btn-sm" href="#">
                                  <i class="fa fa-print"></i> </a>
                          </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                          <td colspan="6"><p class="font-italic">Arama kriterlerine uygun hiç bir sonuç bulunamadı.</p></td>
                        </tr>
                        @endif

                      </tbody>
                    </table>
              </div>
            </div>

  </div>
</form>

@endsection
