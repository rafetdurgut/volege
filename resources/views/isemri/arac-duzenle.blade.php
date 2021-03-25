@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Cari Kayıt Güncelleme')

@section('content')
<form method="POST" action="{{ route('arac-duzenle',$arac->id)}}">
    @csrf
  <div class="bg-white p-3 shadow">
      @isset($success)
        <div class="alert alert-success">
            {{$success}}
        </div>
        @endisset
        @isset($error)
        <div class="alert alert-danger">
            {{ $error }}
        </div>
        @endisset
      <legend> Araç Bilgileri </legend>
      <div class="form-group row">
          <div class="col-sm-6">
              <div class="form-group row">
                  <label for="tckimlik_ac" class="col-sm-3 col-form-label">Araç Plaka:</label>
                  <div class="input-group col-sm-9">
                  <input type="text"  class="form-control" value="{{ $arac->plaka }}" name="plaka" id="tckimlik_ac" placeholder="" required autocomplete="off">
                  </div>
              </div>
              <div class="form-group row">
                  <label for="adsoyad" class="col-sm-3 col-form-label">Şase No:</label>
                  <div class="col-sm-9">
                  <input type="text" class="form-control" value="{{ $arac->saseno }}" name="saseno" id="saseno" placeholder="" required>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="eposta" class="col-sm-3 col-form-label">Motor No:</label>
                  <div class="col-sm-9">
                  <input type="text" class="form-control" value="{{ $arac->motorno }}" name="motorno" id="motorno" placeholder="">
                  </div>
              </div>
          </div>

          <div class="col-sm-6">
              <div class="form-group row">
                  <label for="telefon" class="col-sm-3 col-form-label">Marka:</label>
                  <div class="col-sm-9">
                  <input type="tel" class="form-control" value="{{ $arac->marka }}" name="marka" id="marka" placeholder="">
                  </div>
              </div>
              <div class="form-group row">
                  <label for="vergino" class="col-sm-3 col-form-label">Model:</label>
                  <div class="col-sm-9">
                  <input type="text" class="form-control" value="{{ $arac->model }}"  name="model" id="model" placeholder="">
                  </div>
              </div>
              <div class="form-group row">
                  <label for="vergidairesi" class="col-sm-3 col-form-label">Yıl:</label>
                  <div class="col-sm-9">
                  <input type="text" class="form-control" value="{{ $arac->yil }}" name="yil" id="yil" placeholder="">
                  </div>
              </div>
          </div>
      </div>
            <div class="clearfix">
      <button type="submit" class="btn btn-primary btn-md float-right">Düzenle</button>

    </div>
  </div>
</form>


@endsection