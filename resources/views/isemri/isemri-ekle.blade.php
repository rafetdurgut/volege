@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','İş Emri Oluşturma')

{{-- page style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/forms/wizard.css')}}">
@endsection

@section('content')
<form>
  <div class="bg-white p-3 shadow">
      <legend> Müşteri Bilgileri </legend>
      <div class="form-group row">
          <div class="col-sm-6">
              <div class="form-group row">
                  <label for="tc_kimlik" class="col-sm-3 col-form-label">TC Kimlik No:</label>
                  <div class="col-sm-9">
                  <input type="email" class="form-control" id="tc_kimlik" placeholder="" required autocomplete="off">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="isim_soyisim" class="col-sm-3 col-form-label">İsim Soyisim:</label>
                  <div class="col-sm-9">
                  <input type="password" class="form-control" id="isim_soyisim" placeholder="" required>
                  </div>
              </div>

              <div class="form-group row">
                  <label for="eposta" class="col-sm-3 col-form-label">E-Posta</label>
                  <div class="col-sm-9">
                  <input type="password" class="form-control" id="eposta" placeholder="">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="adres" class="col-sm-3 col-form-label">Adres</label>
                  <div class="col-sm-9">
                      <textarea id="adres" class="form-control"></textarea>
                  </div>
              </div>
          </div>

          <div class="col-sm-6">
              <div class="form-group row">
                  <label for="telefon" class="col-sm-3 col-form-label">Telefon:</label>
                  <div class="col-sm-9">
                  <input type="email" class="form-control" id="telefon" placeholder="">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="vergino" class="col-sm-3 col-form-label">Vergi No:</label>
                  <div class="col-sm-9">
                  <input type="password" class="form-control" id="vergino" placeholder="">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="vergidairesi" class="col-sm-3 col-form-label">Vergi Dairesi:</label>
                  <div class="col-sm-9">
                  <input type="password" class="form-control" id="vergidairesi" placeholder="">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="hesapturu" class="col-sm-3 col-form-label">Hesap Türü</label>
                  <div class="col-sm-9">
                      <input type="radio" name="hesap_turu" value="0" checked /> Şahış
                      <input type="radio" name="hesap_turu" value="1"  /> Kurumsal
                  </div>
              </div>
          </div>
      </div>
      <legend> Araç Bilgileri </legend>
      <div class="form-group row">
          <div class="col-sm-6">
              <div class="form-group row">
                  <label for="tc_kimlik" class="col-sm-3 col-form-label">Plaka:</label>
                  <div class="col-sm-9">
                  <input type="email" class="form-control" id="tc_kimlik" placeholder="" required autocomplete="off">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="isim_soyisim" class="col-sm-3 col-form-label">Tip:</label>
                  <div class="col-sm-9">
                  <input type="password" class="form-control" id="isim_soyisim" placeholder="" required>
                  </div>
              </div>

              <div class="form-group row">
                  <label for="isim_soyisim" class="col-sm-3 col-form-label">Yakıt Durumu:</label>
                  <div class="col-sm-9">
                      <input type="range" class="form-control-range" min="0" max="1" step="0.1" id="yakit" oninput="this.nextElementSibling.value = this.value">
                  <output>0.2</output>
                  </div>
              </div>
          </div>

          <div class="col-sm-6">
              <div class="form-group row">
                  <label for="telefon" class="col-sm-3 col-form-label">Şase No:</label>
                  <div class="col-sm-9">
                      <input type="email" class="form-control" id="telefon" placeholder="">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="vergino" class="col-sm-3 col-form-label">Model:</label>
                  <div class="col-sm-9">
                  <input type="password" class="form-control" id="vergino" placeholder="">
                  </div>
              </div>
          </div>
      </div>

      <legend> İş Emri Bilgileri </legend>
      <div class="form-group row">
          <div class="col-sm-6">
              <div class="form-group row">
                  <label for="tc_kimlik" class="col-sm-3 col-form-label">Giriş Tarihi:</label>
                  <div class="col-sm-9">
                  <input type="datetime-local" class="form-control" id="tc_kimlik" placeholder="" required autocomplete="off">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="isim_soyisim" class="col-sm-3 col-form-label">Kilometre:</label>
                  <div class="col-sm-9">
                  <input type="password" class="form-control" id="isim_soyisim" placeholder="" required>
                  </div>
              </div>

              <div class="form-group row">
                  <label for="isim_soyisim" class="col-sm-3 col-form-label">Tahmini Tutar:</label>
                  <div class="col-sm-9">
                      <input type="number" class="form-control">
                  </div>
              </div>
          </div>

          <div class="col-sm-6">
              <div class="form-group row">
                  <label for="telefon" class="col-sm-3 col-form-label">Sorunlar:</label>
                  <div class="col-sm-9">
                      <textarea class="form-control" rows="8"></textarea>
                  </div>
              </div>
          </div>
      </div>
      <button type="submit" class="btn btn-primary btn-md">İş Emri Girişi Yap</button>
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
@endsection
