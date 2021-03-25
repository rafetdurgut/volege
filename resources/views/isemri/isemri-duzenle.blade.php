@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','İş Emri Düzenleme')
<meta name="csrf-token" content="{{ csrf_token() }}">


{{-- page style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/forms/wizard.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.css" integrity="sha512-uq8QcHBpT8VQcWfwrVcH/n/B6ELDwKAdX4S/I3rYSwYldLVTs7iII2p6ieGCM13QTPEKZvItaNKBin9/3cjPAg==" crossorigin="anonymous" />
@endsection

@section('content')
<form method="POST" action="{{ route('isemri-duzenle',$isemri->id)}}">
    @csrf
  <div class="bg-white p-3 shadow">
      @isset($success)
        <div class="alert alert-success">
            {{ $success }}
        </div>
        @endisset
      <legend> Müşteri Bilgileri </legend>
      <div class="form-group row">
          <div class="col-sm-6">
              <div class="form-group row">
                  <label for="tckimlik_ac" class="col-sm-3 col-form-label">TC Kimlik No:</label>
                  <div class="input-group col-sm-9">
                  <input type="text" value="{{$musteri->tc}}"  class="form-control" name="tckimlik" id="tckimlik_ac" placeholder="" required autocomplete="off">
                  <input type="button" id="rastgeletc" value="Rastgele" class="btn btn-info btn-sm" />
                  </div>
              </div>

              <div class="form-group row">
                  <label for="adsoyad" class="col-sm-3 col-form-label">İsim Soyisim:</label>
                  <div class="col-sm-9">
                  <input type="text" value="{{$musteri->adsoyad}}" class="form-control" name="adsoyad" id="adsoyad" placeholder="" required>
                  </div>
              </div>

              <div class="form-group row">
                  <label for="eposta" class="col-sm-3 col-form-label">E-Posta</label>
                  <div class="col-sm-9">
                  <input type="text" value="{{$musteri->email}}" class="form-control" name="eposta" id="eposta" placeholder="">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="adres" class="col-sm-3 col-form-label">Adres</label>
                  <div class="col-sm-9">
                      <textarea id="adres" name="adres" class="form-control">{{$musteri->adres}}</textarea>
                  </div>
              </div>
          </div>

          <div class="col-sm-6">
              <div class="form-group row">
                  <label for="telefon" class="col-sm-3 col-form-label">Telefon:</label>
                  <div class="col-sm-9">
                  <input type="tel" value="{{$musteri->telefon}}" class="form-control" name="telefon" id="telefon" placeholder="">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="vergino" class="col-sm-3 col-form-label">Vergi No:</label>
                  <div class="col-sm-9">
                  <input type="text" value="{{$musteri->vergino}}" class="form-control"  name="vergino" id="vergino" placeholder="">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="vergidairesi" class="col-sm-3 col-form-label">Vergi Dairesi:</label>
                  <div class="col-sm-9">
                  <input type="text" value="{{$musteri->vergidairesi}}" class="form-control" name="vergidairesi" id="vergidairesi" placeholder="">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="hesapturu" class="col-sm-3 col-form-label">Hesap Türü</label>
                  <div class="col-sm-9">
                      <input type="radio" name="ticaridurum" id="ticaridurum0" value="0"  {{ $musteri->ticaridurum != "1" ? "checked" : ""}}  /> Şahış
                      <input type="radio" name="ticaridurum" id="ticaridurum1"  value="1" {{ $musteri->ticaridurum  == "1" ? "checked" : ""}}  /> Kurumsal
                  </div>
              </div>
          </div>
      </div>
      <legend> Araç Bilgileri </legend>
      <div class="form-group row">
          <div class="col-sm-6">
              <div class="form-group row">
                  <label for="plaka_ac" class="col-sm-3 col-form-label">Plaka:</label>
                  <div class="col-sm-9">
                  <input type="text" value="{{$arac->plaka}}" class="form-control" id="plaka_ac" name="plaka" placeholder="" required autocomplete="off">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="marka" class="col-sm-3 col-form-label">Marka:</label>
                  <div class="col-sm-9">
                  <input type="text" value="{{$arac->marka}}" class="form-control" id="marka" name="marka" placeholder="">
                  </div>
              </div>
              <div class="form-group row">
                <label for="yakit" class="col-sm-3 col-form-label">Yıl:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="yil" name="yil" placeholder="">
                 
                </div>
            </div>
              <div class="form-group row">
                  <label for="yakit" class="col-sm-3 col-form-label">Yakıt Durumu:</label>
                  <div class="col-sm-9">
                      <input type="range" class="form-control-range" min="0"  value="{{$isemri->yakit}}" max="1" step="0.1" id="yakit" name="yakit" oninput="this.nextElementSibling.value = this.value">
                  <output>{{$isemri->yakit}}</output>
                  </div>
              </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group row">
                <label for="motorno" class="col-sm-3 col-form-label">Motor No:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="motorno" value="{{$arac->motorno}}" name="motorno" placeholder="">
                </div>
            </div>
              <div class="form-group row">
                  <label for="saseno" class="col-sm-3 col-form-label">Şase No:</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" id="saseno"  value="{{$arac->saseno}}"  name="saseno" placeholder="" required>
                  </div>
              </div>

              <div class="form-group row">
                  <label for="model" class="col-sm-3 col-form-label">Model:</label>
                  <div class="col-sm-9">
                  <input type="text"  value="{{$arac->model}}" class="form-control" id="model" name="model" placeholder="">
                  </div>
              </div>
          </div>
      </div>

      <legend> İş Emri Bilgileri </legend>
      <div class="form-group row">
          <div class="col-sm-6">
              <div class="form-group row">
                  <label for="giristarihi" class="col-sm-3 col-form-label" >Giriş Tarihi:</label>
                  <div class="col-sm-9">
                  <input type="datetime-local" class="form-control" id="giristarihi" name="giristarihi"  value="{{ Carbon\Carbon::parse($isemri->aracgiristarihi)->format('Y-m-d\TH:i') }}" placeholder="" required autocomplete="off">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="kilometre" class="col-sm-3 col-form-label">Kilometre:</label>
                  <div class="col-sm-9">
                  <input type="text" class="form-control" id="kilometre" value="{{$isemri->arackm}}" name="kilometre" placeholder="">
                  </div>


              </div>
              <div class="form-group row">
                <label for="tahminitutar" class="col-sm-3 col-form-label">Teknisyen:</label>
                <div class="col-sm-9">
                    <select id="teknisyen" name="teknisyen" class="form-control">
                        <option value="0">Volege</option>
                        <option value="1">Bahtiyar Aytemiz</option>
                        <option value="2">Ercan İris</option>
                    </select>
                </div>
            </div>
              <div class="form-group row">
                  <label for="tahminitutar" class="col-sm-3 col-form-label">Tahmini Tutar:</label>
                  <div class="col-sm-9">
                      <input type="number" value="{{$isemri->tahminitutar}}" name="tahminitutar" id="tahminitutar" class="form-control">
                  </div>
              </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group row">
                <label for="tahminitutar" class="col-sm-3 col-form-label">Teslim Alan:</label>
                <div class="col-sm-9">
                    <label for="idtkns">Teknisyen ile Aynı</label>
                    <input type="checkbox" id="idtkns" name="teslimalanayni" oninput="this.nextElementSibling.value = document.getElementById('teknisyen').options[document.getElementById('teknisyen').selectedIndex].text">

                   <input type="text" value="{{$isemri->teslimalan}}" name="teslimalan" id="teslimalan" class="form-control" />
                </div>
            </div>
            <div class="form-group row">
                <label for="tahminitutar" class="col-sm-3 col-form-label">Teslim Eden:</label>
                <div class="  col-sm-9">
                    <label for="idchck">Araç Sahibi ile Aynı</label>

                    <input type="checkbox" id="idchck" name="teslimedenayni" oninput="this.nextElementSibling.value = document.getElementById('adsoyad').value" />
                   <input type="text" value="{{$isemri->teslimeden}}" name="teslimeden" id="teslimeden" class="form-control" />
                </div>
            </div>
              <div class="form-group row">
                  <label for="talep" class="col-sm-3 col-form-label">Müşteri Talepleri:</label>
                  <div class="col-sm-9">
                      <textarea class="form-control" rows="8" id="talep" name="talep">{{$isemri->talep}}</textarea>
                  </div>
              </div>
          </div>
      </div>
      <div class="clearfix">
        <button type="submit" class="btn btn-primary btn-md float-right">İş Emri Kaydet</button>
      </div>
  </div>
</form>

@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/extensions/jquery.steps.min.js')}}"></script>
<script src="{{asset('vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
@endsection

{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/forms/wizard-steps.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.min.js" integrity="sha512-TToQDr91fBeG4RE5RjMl/tqNAo35hSRR4cbIFasiV2AAMQ6yKXXYhdSdEpUcRE6bqsTiB+FPLPls4ZAFMoK5WA==" crossorigin="anonymous"></script>
<script src="{{asset('js/scripts/autocomplete/autocomplete.js')}}"></script>

@endsection
