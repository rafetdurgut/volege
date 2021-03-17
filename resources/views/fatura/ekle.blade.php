@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Yeni Fatura Ekle')
@section('content')
<div class="bg-white p-3 shadow">
  <form class="repeater-default">
  <legend> Fatura Bilgileri </legend>
  <div class="form-group row">
      <div class="col-sm-6">
          <div class="form-group row">
              <label for="tc_kimlik" class="col-sm-3 col-form-label">Fatura Kodu:</label>
              <div class="input-group col-sm-9">
                  <input type="text" class="form-control" id="isim_soyisim" placeholder="" required value="VE10002">
                  <input type="button" value="Oluştur" class="btn btn-info btn-sm" />
              </div>
          </div>
          <div class="form-group row">
              <label for="eposta" class="col-sm-3 col-form-label">Fatura Tarihi:</label>
              <div class="input-group col-sm-9">
                  <input type="datetime-local" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
              </div>
          </div>
          <div class="form-group row">
              <label for="eposta" class="col-sm-3 col-form-label">Vadesi</label>
              <div class="input-group col-sm-9">
                  <input type="datetime-local" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
              </div>
          </div>
          <div class="form-group row">
              <label for="adres" class="col-sm-3 col-form-label">Fatura Durumu</label>
              <div class="col-sm-9">
                  <select class="form-control" aria-label="Default select example">
                      <option value="1" selected>Açık</option>
                      <option value="2">Kapalı</option>
                    </select>
                  </div>
          </div>
      </div>

      <div class="col-sm-6">
          <div class="form-group row">
              <label for="isim_soyisim" class="col-sm-3 col-form-label">Cari Kodu:</label>
              <div class="input-group col-sm-9">
                  <input type="text" class="form-control" id="isim_soyisim" value="CM0001" placeholder="" required>
                  <input type="button" value="Getir" class="btn btn-info btn-sm" />
              </div>
          </div>
          <div class="form-group row">
              <label for="eposta" class="col-sm-3 col-form-label">Cari Adı</label>
              <div class="input-group col-sm-9">
                      <input type="text" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
              </div>
          </div>
          <div class="form-group row">
              <label for="adres" class="col-sm-3 col-form-label">Fatura Tipi</label>
              <div class="col-sm-9">
                  <select class="form-control" aria-label="Default select example">
                      <option value="1" selected>Alış</option>
                      <option value="2">Satış</option>
                    </select>
                  </div>
          </div>
          <div class="form-group row">
            <label for="adres" class="col-sm-3 col-form-label">GİB Kodu</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="isim_soyisim" value="GİB0001" placeholder="" required>
            </div>
        </div>
      </div>
          <div  class="col-sm-12">
              <legend> Parça Bilgileri </legend>
              <div class="form-group row">
                  <div class="col-sm-1">
                      Stok No
                  </div>
                  <div class="col-sm-2">
                      Stok Adı
                  </div>
                  <div class="col-sm-2">
                      Birim
                  </div>
                  <div class="col-sm-2">
                    Birim Stok
                </div>
                  <div class="col-sm-2">
                      Birim Fiyat
                  </div>
                  <div class="col-sm-2">
                      İskonto
                  </div>
                  <div class="col-sm-1">
                      Toplam Tutar
                  </div>
              </div>
              <div data-repeater-list="parcalar" id="parcalar" >
                  <div class="form-group parca-satir row" data-repeater-item>
                      <div class="col-sm-1">
                          <input type="text" class="form-control" />
                      </div>
                      <div class="col-sm-2">
                          <input type="text" class="form-control" />
                      </div>
                      <div class="col-sm-2">
                        <select class="form-control" aria-label="Default select example">
                          <option value="1" selected>Birim Yok</option>
                          <option value="2">Adet</option>
                          <option value="2">Litre</option>
                          <option value="2">Takım</option>
                        </select>
                      </div>
                      <div class="col-sm-2">
                          <input type="text" class="form-control" />
                      </div>
                      <div class="col-sm-2">
                          <input type="text" class="form-control" />
                      </div>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" />
                    </div>
                      <div class="col-sm-1">
                          <input type="text" readonly class="form-control" />
                      </div>
                  </div>
                </div>
              <div class="clearfix">
                <button class="btn btn-info float-right" data-repeater-create type="button">
                  <i class="bx bx-plus"></i>Satır Ekle
                </button>

            </div>
          </div>
  </div>
  <div class="row">
    <div class="col-4 col-sm-6 col-12 mt-75">
      <p>Fatura Detay Bilgileri</p>
    </div>
    <div class="col-8 col-sm-6 col-12 d-flex justify-content-end mt-75">
      <div class="invoice-subtotal">
        <div class="invoice-calc d-flex justify-content-between">
          <span class="invoice-title">Alt Toplam</span>
          <span class="invoice-value">76.00 TL</span>
        </div>
        <div class="invoice-calc d-flex justify-content-between">
          <span class="invoice-title">Discount</span>
          <span class="invoice-value"> -10.00 TL</span>
        </div>
        <div class="invoice-calc d-flex justify-content-between">
          <span class="invoice-title">KDV</span>
          <span class="invoice-value">18%</span>
        </div>
        <hr>
        <div class="invoice-calc d-flex justify-content-between">
          <span class="invoice-title">Fatura Toplamı: </span>
          <span class="invoice-value">98.25 TL</span>
        </div>
    </div>
  </div>
  <div class="clearfix">
      <button type="submit" class="btn btn-primary btn-lg float-right mr-1">Kaydet</button>
  </div>
</div>
</form>

@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
@endsection

{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/forms/form-repeater.js')}}"></script>
@endsection