@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Araç Çıkışı')

{{-- page style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/forms/wizard.css')}}">
@endsection

@section('content')
<form>
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
                  <textarea id="yapilanlar" class="form-control" rows="4"></textarea>
              </div>
          </div>
          <div class="form-group row">
              <label for="iscilik" class="col-sm-3 col-form-label">İşçilik:</label>
              <div class="input-group col-sm-9">
                  <span class="input-group-text" id="basic-addon1">TL</span>
                  <input type="number" id="iscilik" class="form-control" placeholder="" aria-label="iscilik" aria-describedby="basic-addon1">
               </div>
          </div>
          <div class="clearfix">
            <button type="submit" class="btn btn-info btn-md float-right">Fatura Kes</button>

              <button type="submit" class="btn btn-primary btn-md float-right mr-1">Araç Çıkışı Yap</button>

              <button type="submit" class="btn btn-success btn-md float-right mr-1">Kaydet</button>
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
