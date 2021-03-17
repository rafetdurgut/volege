@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Yedek Parça Ekle')

@section('content')
<div class="bg-white p-3 shadow">
  <legend> Yedek Parça Bilgileri </legend>
  <div class="form-group row">
      <div class="col-sm-6">
          <div class="form-group row">
              <label for="tc_kimlik" class="col-sm-3 col-form-label">Stok Kodu:</label>
              <div class="col-sm-9">
              <input type="text" class="form-control" id="tc_kimlik" placeholder="" required autocomplete="off">
              </div>
          </div>

          <div class="form-group row">
              <label for="isim_soyisim" class="col-sm-3 col-form-label">Grup:</label>
              <div class="col-sm-9">
              <input type="text" class="form-control" id="isim_soyisim" placeholder="" required>
              </div>
          </div>
          <div class="form-group row">
              <label for="eposta" class="col-sm-3 col-form-label">Alış Fiyatı</label>
              <div class="input-group col-sm-9">
                      <span class="input-group-text" id="basic-addon1">TL</span>
                      <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
              </div>
          </div>

          <div class="form-group row">
              <label for="eposta" class="col-sm-3 col-form-label">KDV</label>
              <div class="input-group col-sm-9">
                      <span class="input-group-text" id="basic-addon1">%</span>
                      <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
              </div>
          </div>

          <div class="form-group row">
              <label for="adres" class="col-sm-3 col-form-label">Uyarı Miktarı</label>
              <div class="col-sm-9">
                  <input id="number" class="form-control" />
              </div>
          </div>
      </div>

      <div class="col-sm-6">
          <div class="form-group row">
              <label for="telefon" class="col-sm-3 col-form-label">Stok Adı:</label>
              <div class="col-sm-9">
              <input type="email" class="form-control" id="telefon" placeholder="">
              </div>
          </div>

          <div class="form-group row">
              <label for="vergino" class="col-sm-3 col-form-label">Barkod:</label>
              <div class="col-sm-9">
              <input type="password" class="form-control" id="vergino" placeholder="">
              </div>
          </div>

          <div class="form-group row">
              <label for="vergidairesi" class="col-sm-3 col-form-label">Birim:</label>
              <div class="col-sm-9">
                  <select class="form-control" aria-label="Default select example">
                      <option value="1" selected>Adet</option>
                      <option value="2">Litre</option>
                      <option value="3">Takım</option>
                    </select>
              </div>
          </div>
          <div class="form-group row">
              <label for="vergidairesi" class="col-sm-3 col-form-label">Stok Adet:</label>
              <div class="col-sm-9">
              <input type="number" class="form-control" id="vergidairesi" placeholder="">
              </div>
          </div>
          <div class="form-group row">
              <label for="eposta" class="col-sm-3 col-form-label">Satış Fiyatı:</label>
              <div class="input-group col-sm-9">
                      <span class="input-group-text" id="basic-addon1">TL</span>
                      <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
              </div>
          </div>
      </div>

  </div>
  <div class="clearfix">
      <button type="submit" class="btn btn-primary btn-lg float-right mr-1">Kaydet</button>
  </div>
</div>
</form>
@endsection
