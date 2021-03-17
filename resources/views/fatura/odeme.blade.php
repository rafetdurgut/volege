@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Yeni Ödeme Al')

@section('content')
<div class="bg-white p-3 shadow">
  <legend> Ödeme Bilgileri </legend>
  <div class="form-group row">
      <div class="col-sm-6">
          <div class="form-group row">
              <label for="faturakodu" class="col-sm-3 col-form-label">Fatura Kodu:</label>
              <div class="input-group col-sm-9">
                  <input type="text" class="form-control" name="faturakodu" id="faturakodu" placeholder="" required value="VE10002">
                  <input type="button" value="Oluştur" class="btn btn-info btn-sm" />
              </div>
              <div class="container">
                  <p class="font-italic"><small>Eğer boş bırakırsanız otomatik olarak belirlenecektir.</small></p>
              </div>
          </div>
          <div class="form-group row">
              <label for="odemetarihi" class="col-sm-3 col-form-label">Ödeme Tarihi:</label>
              <div class="input-group col-sm-9">
                  <input type="datetime-local" id="odemetarihi" name="odemetarihi" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
              </div>
          </div>
          <div class="form-group row">
              <label for="odenenmiktar" class="col-sm-3 col-form-label">Ödenen Miktar</label>
              <div class="input-group col-sm-9">
                  <span class="input-group-text" id="basic-addon1">TL</span>
                  <input type="number" name="odenenmiktar" id="odenenmiktar" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
              </div>
          </div>
          <div class="form-group row">
            <label for="odemekanali" class="col-sm-3 col-form-label">Ödeme Kanalı</label>
            <div class="col-sm-9">
                <select name="odemekanali" id="odemekanali" class="form-control" aria-label="Default select example">
                    <option value="1" selected>Banka</option>
                    <option value="2">Nakit</option>
                  </select>
                </div>
        </div>
      </div>

      <div class="col-sm-6">
          <div class="form-group row">
              <label for="carikodu" class="col-sm-3 col-form-label">Cari Kodu:</label>
              <div class="input-group col-sm-9">
                  <input type="text" class="form-control" name="carikodu" id="carikodu" value="CM0001" placeholder="" required>
                  <input type="button" value="Getir" class="btn btn-info btn-sm" />
              </div>
          </div>
          <div class="form-group row">
              <label for="cariadi" class="col-sm-3 col-form-label">Cari Adı</label>
              <div class="input-group col-sm-9">
                      <input type="text" class="form-control" id="cariadi" name="cariadi" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
              </div>
          </div>
          <div class="form-group row">
              <label for="odemetipi" class="col-sm-3 col-form-label">Ödeme Tipi</label>
              <div class="col-sm-9">
                  <select class="form-control" id="odemetipi" name="odemetipi" aria-label="Default select example">
                      <option value="1" selected>Borç</option>
                      <option value="2">Alacak</option>
                    </select>
                  </div>
          </div>
          <div class="form-group row">
              <label for="aciklama" class="col-sm-3 col-form-label">Açıklama</label>
              <div class="col-sm-9">
                  <textarea id="aciklama" name="aciklama" class="form-control" > </textarea>
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
