@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Yedek Parça Ekle')

@section('content')
<div class="bg-white p-3 shadow">
  <legend> Yedek Parça Bilgileri </legend>
  <div class="form-group row">
      <div class="col-sm-6">
        <div class="form-group row">
          <label for="ureticikodu" class="col-sm-3 col-form-label">Üretici Kodu:</label>
          <div class="col-sm-9">
          <input type="text" class="form-control" id="ureticikodu" name="ureticikodu" placeholder="" required autocomplete="off">
          </div>
      </div>
          <div class="form-group row">
              <label for="stokkodu" class="col-sm-3 col-form-label">Stok Kodu:</label>
              <div class="col-sm-9">
              <input type="text" class="form-control" name="stokkodu" id="stokkodu" placeholder="" required autocomplete="off">
              </div>
          </div>

          <div class="form-group row">
              <label for="grup" class="col-sm-3 col-form-label">Grup:</label>
              <div class="col-sm-9">
              <input type="text" class="form-control" id="grup" name="grup" placeholder="" required>
              </div>
          </div>
          <div class="form-group row">
              <label for="alisfiyati" class="col-sm-3 col-form-label">Alış Fiyatı</label>
              <div class="input-group col-sm-9">
                      <span class="input-group-text" id="basic-addon1">TL</span>
                      <input id="alisfiyati" name="alisfiyati" type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
              </div>
          </div>

          <div class="form-group row">
              <label for="kdv" class="col-sm-3 col-form-label">KDV</label>
              <div class="input-group col-sm-9">
                      <span class="input-group-text" id="basic-addon1">%</span>
                      <input id="kdv" name="kdv" type="number" class="form-control" value="18" aria-label="Username" aria-describedby="basic-addon1">
              </div>
          </div>

          <div class="form-group row">
              <label for="uyarimiktari" class="col-sm-3 col-form-label">Uyarı Miktarı</label>
              <div class="col-sm-9">
                  <input id="uyarimiktari" name="uyarimiktari" type="number" class="form-control" />
              </div>
          </div>
      </div>

      <div class="col-sm-6">
          <div class="form-group row">
              <label for="stokadi" class="col-sm-3 col-form-label">Stok Adı:</label>
              <div class="col-sm-9">
              <input id="stokadi" name="stokadi" type="text" class="form-control" id="telefon" placeholder="">
              </div>
          </div>

          <div class="form-group row">
              <label for="barkod" class="col-sm-3 col-form-label">Barkod:</label>
              <div class="col-sm-9">
              <input name="barkod" id="barkod" type="password" class="form-control" id="vergino" placeholder="">
              </div>
          </div>

          <div class="form-group row">
              <label for="birim" class="col-sm-3 col-form-label">Birim:</label>
              <div class="col-sm-9">
                  <select class="form-control" id="birim" aria-label="Default select example">
                      <option value="1">Birim Yok</option>
                      <option value="1" selected>Adet</option>
                      <option value="2">Litre</option>
                      <option value="3">Takım</option>
                      <option value="4">Paket</option>
                    </select>
              </div>
          </div>
          <div class="form-group row">
              <label for="stokadet" class="col-sm-3 col-form-label">Stok Adet:</label>
              <div class="col-sm-9">
              <input type="number" class="form-control" id="stokadet" name="stokadet" placeholder="">
              </div>
          </div>
          <div class="form-group row">
              <label for="satisfiyati" class="col-sm-3 col-form-label">Satış Fiyatı:</label>
              <div class="input-group col-sm-9">
                      <span class="input-group-text" id="basic-addon1">TL</span>
                      <input type="text" class="form-control" id="satisfiyati" name="satisfiyati" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
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
