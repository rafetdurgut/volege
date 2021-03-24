@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Cari Kayıt')

@section('content')
<form method="POST" action="{{ route('cari-ekle')}}">
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
      <legend> Cari Bilgileri </legend>
      <div class="form-group row">
          <div class="col-sm-6">
              <div class="form-group row">
                  <label for="tckimlik_ac" class="col-sm-3 col-form-label">Cari Kodu:</label>
                  <div class="input-group col-sm-9">
                  <input type="text"  class="form-control" value="{{ old('tckimlik') }}" name="tckimlik" id="tckimlik_ac" placeholder="" required autocomplete="off">
                  <input type="button" id="rastgeletc" value="Rastgele" class="btn btn-info btn-sm" />
                  </div>
              </div>

              <div class="form-group row">
                  <label for="adsoyad" class="col-sm-3 col-form-label">Cari Adı:</label>
                  <div class="col-sm-9">
                  <input type="text" class="form-control" value="{{ old('adsoyad') }}" name="adsoyad" id="adsoyad" placeholder="" required>
                  </div>
              </div>

              <div class="form-group row">
                  <label for="eposta" class="col-sm-3 col-form-label">E-Posta</label>
                  <div class="col-sm-9">
                  <input type="text" class="form-control" value="{{ old('eposta') }}" name="eposta" id="eposta" placeholder="">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="adres" class="col-sm-3 col-form-label">Adres</label>
                  <div class="col-sm-9">
                      <textarea id="adres" name="adres" class="form-control">{{ old('adres') }}</textarea>
                  </div>
              </div>
          </div>

          <div class="col-sm-6">
              <div class="form-group row">
                  <label for="telefon" class="col-sm-3 col-form-label">Telefon:</label>
                  <div class="col-sm-9">
                  <input type="tel" class="form-control" value="{{ old('telefon') }}" name="telefon" id="telefon" placeholder="">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="vergino" class="col-sm-3 col-form-label">Vergi No:</label>
                  <div class="col-sm-9">
                  <input type="text" class="form-control" value="{{ old('vergino') }}"  name="vergino" id="vergino" placeholder="">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="vergidairesi" class="col-sm-3 col-form-label">Vergi Dairesi:</label>
                  <div class="col-sm-9">
                  <input type="text" class="form-control" value="{{ old('vergidairesi') }}" name="vergidairesi" id="vergidairesi" placeholder="">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="hesapturu" class="col-sm-3 col-form-label">Hesap Türü</label>
                  <div class="col-sm-9">
                      <input type="radio" name="ticaridurum" id="ticaridurum0" value="0" checked /> Şahış
                      <input type="radio" name="ticaridurum" id="ticaridurum1"  value="1"  /> Kurumsal
                  </div>
              </div>
          </div>
      </div>
            <div class="clearfix">
      <button type="submit" class="btn btn-primary btn-md float-right">Yeni Kayıt Ekle</button>

    </div>
  </div>
</form>

@endsection
