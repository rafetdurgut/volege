@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Araç Çıkışı')

{{-- page style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/forms/wizard.css')}}">
@endsection

@section('content')
<form class="repeater-default">
  <div class="bg-white m-3 p-3 shadow">
      <legend> Araç Çıkışı </legend>

          <div class="container">
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="icerdekiArac">İçerideki Araç</label>
                  </div>
                  <select class="custom-select" id="icerdekiArac">
                    <option selected>Seçiniz...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
          </div>
            <div class="alert alert-secondary alert-dismissible fade show" role="alert">
              Müşteri: <strong>Rafet Durgut</strong> Telefon numarası: 555 555 55 55.
            </div>
          <div class="form-group row">
              <label for="yapilanlar" class="col-sm-3 col-form-label">Yapılanlar:</label>
              <div class="col-sm-9">
                  <textarea id="yapilanlar" name="yapilanlar" class="form-control" rows="4"></textarea>
              </div>
          </div>
          <div class="form-group row">
              <label for="iscilik" class="col-sm-3 col-form-label">İşçilik:</label>
              <div class="input-group col-sm-9">
                  <span class="input-group-text" id="basic-addon1">TL</span>
                  <input type="number" name="iscilik" id="iscilik" class="form-control" placeholder="" aria-label="iscilik" aria-describedby="basic-addon1">
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
                        <input name="stokno" type="text" class="form-control" />
                    </div>
                    <div class="col-sm-2">
                        <input name="stokadi" type="text" class="form-control" />
                    </div>
                    <div class="col-sm-2">
                      <select name="stokbirim" class="form-control" aria-label="Default select example">
                        <option value="1" selected>Birim Yok</option>
                        <option value="2">Adet</option>
                        <option value="3">Litre</option>
                        <option value="4">Takım</option>
                        <option value="5">Paket</option>
                      </select>
                    </div>
                    <div class="col-sm-2">
                        <input name="birimstok" type="text" class="form-control" />
                    </div>
                    <div class="col-sm-2">
                        <input name="birimfiyat" type="text" class="form-control" />
                    </div>
                    <div class="col-sm-2">
                      <input name="iskonto" type="text" class="form-control" />
                  </div>
                    <div class="col-sm-1">
                        <input name="toplamtutar" type="text" readonly class="form-control" />
                    </div>
                </div>
              </div>
            <div class="clearfix">
              <button class="btn btn-info float-right" data-repeater-create type="button">
                <i class="bx bx-plus"></i>Satır Ekle
              </button>

          </div>
        </div>
          <div class="clearfix mt-1 mb-2">
              <button type="submit" class="btn btn-info btn-md ">Fatura Kes</button>
              <button type="submit" class="btn btn-danger btn-md "">Araç Çıkışı Yap</button>
              <button type="submit" class="btn btn-success btn-md  ">Kaydet</button>
          </div>
         <div class="row">
          <div class="alert alert-warning alert-dismissible mb-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <div class="d-flex align-items-center">
              <i class="bx bx-error-circle"></i>
              <span>
                <a href="javascript:void(0);" class="alert-link">Dikkat!</a><span>Eğer araç çıkışı yaparsanız, iş emri üzerinde düzenleme yapamazsınız. Son kontrolleri yaptıktan sonra çıkış yapınız.</span>
              </span>
            </div>
          </div>
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
