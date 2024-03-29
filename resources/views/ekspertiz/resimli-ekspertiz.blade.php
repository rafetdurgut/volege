@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Resimli Ekspertiz')
@section('content')
<form>
  <div class="bg-white p-3 shadow">
      <legend> Müşteri Bilgileri </legend>
      <div class="form-group row">
          <div class="col-sm-6">
              <div class="form-group row">
                  <label for="tckimlik" class="col-sm-3 col-form-label">TC Kimlik No:</label>
                  <div class="col-sm-9">
                  <input type="email" class="form-control" name="tckimlik" id="tckimlik" placeholder="" required autocomplete="off">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="adsoyad" class="col-sm-3 col-form-label">İsim Soyisim:</label>
                  <div class="col-sm-9">
                  <input type="tex" class="form-control" id="adsoyad" name="adsoyad" placeholder="" required>
                  </div>
              </div>

              <div class="form-group row">
                  <label for="eposta" class="col-sm-3 col-form-label">E-Posta</label>
                  <div class="col-sm-9">
                  <input type="email" class="form-control" name="eposta" id="eposta" placeholder="">
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
                  <input type="tel" class="form-control" id="telefon" name="telefon" placeholder="">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="vergino" class="col-sm-3 col-form-label">Vergi No:</label>
                  <div class="col-sm-9">
                  <input type="text" class="form-control" name="vergino" id="vergino" placeholder="">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="vergidairesi" class="col-sm-3 col-form-label">Vergi Dairesi:</label>
                  <div class="col-sm-9">
                  <input type="text" class="form-control" name="vergidairesi" id="vergidairesi" placeholder="">
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
                  <label for="plaka" class="col-sm-3 col-form-label">Plaka:</label>
                  <div class="col-sm-9">
                  <input type="text" class="form-control" id="plaka" name="plaka" placeholder="" required autocomplete="off">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="isim_soyisim" class="col-sm-3 col-form-label">Marka:</label>
                  <div class="col-sm-9">
                  <input type="text" class="form-control" id="isim_soyisim" value="Volvo" placeholder="">
                  </div>
              </div>

              <div class="form-group row">
                  <label for="yakit" class="col-sm-3 col-form-label">Yakıt Durumu:</label>
                  <div class="col-sm-9">
                      <input type="range" class="form-control-range" min="0" max="1" step="0.1" name="yakit" id="yakit" oninput="this.nextElementSibling.value = this.value">
                  <output>0.2</output>
                  </div>
              </div>
          </div>

          <div class="col-sm-6">
              <div class="form-group row">
                  <label for="saseno" class="col-sm-3 col-form-label">Şase No:</label>
                  <div class="col-sm-9">
                      <input type="text" class="form-control" name="saseno" id="saseno" placeholder="">
                  </div>
              </div>
              <div class="form-group row">
                <label for="motorno" class="col-sm-3 col-form-label">Motor No:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="motorno" id="motorno" placeholder="">
                </div>
            </div>
              <div class="form-group row">
                  <label for="model" class="col-sm-3 col-form-label">Model:</label>
                  <div class="col-sm-9">
                  <input type="text" class="form-control" name="model" id="model" placeholder="">
                  </div>
              </div>
          </div>
      </div>
      <legend> Ekspertiz Bilgileri </legend>
      <div class="form-group">
          <div class="form-group row">
              <label for="giristarihi" class="col-sm-3 col-form-label">Giriş Tarihi:</label>
              <div class="col-sm-9">
              <input type="datetime-local" class="form-control" id="giristarihi" name="giristarihi" placeholder="" autocomplete="off">
              </div>
          </div>

          <div class="form-group row">
              <label for="kilometre" class="col-sm-3 col-form-label">Kilometre:</label>
              <div class="col-sm-9">
              <input type="text" class="form-control" name="kilometre" id="kilometre" placeholder="" required>
              </div>
          </div>
          <div class="form-group row">
              <label for="resim" class="col-sm-3 col-form-label">Resim:</label>
              <div class="col-sm-9">
                  <input type="file" id="resim" name="resim" class="form-control" />
              </div>
          </div>
      </div>
      <div class="clearfix">
        <button type="submit" class="btn btn-primary btn-md float-right">Ekspertiz Girişi Yap</button>
      </div>
  </div>
</form>
@endsection
