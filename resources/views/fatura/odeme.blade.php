@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Yeni Ödeme Al')
<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- page style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/forms/wizard.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.css" integrity="sha512-uq8QcHBpT8VQcWfwrVcH/n/B6ELDwKAdX4S/I3rYSwYldLVTs7iII2p6ieGCM13QTPEKZvItaNKBin9/3cjPAg==" crossorigin="anonymous" />
@endsection

@section('content')
<form method="POST" action="{{route('fatura-odeme')}}">
    @csrf
<div class="bg-white p-3 shadow">
    @if(Session::get('success'))
    <div class="alert alert-success">
        {{ Session('success')}}
    </div>
    @endif
    @if(Session::get('error'))
    <div class="alert alert-danger">
        {{ Session('error')}}
    </div>
    @endif
  <legend> Ödeme Bilgileri </legend>
  <div class="form-group row">
      <div class="col-sm-6">
          <div class="form-group row">
              <label for="faturakodu" class="col-sm-3 col-form-label">Fatura Kodu:</label>
              <div class="input-group col-sm-9">
                  <input type="text" class="form-control" name="faturakodu" id="faturakodu" placeholder="VE10002">
                  <input type="button" value="Oluştur" class="btn btn-info btn-sm" />
              </div>
              <div class="container">
                  <p class="font-italic"><small>Eğer boş bırakırsanız otomatik olarak belirlenecektir.</small></p>
              </div>
          </div>
          <div class="form-group row">
              <label for="odemetarihi" class="col-sm-3 col-form-label">Ödeme Tarihi:</label>
              <div class="input-group col-sm-9">
                  <input type="datetime-local" id="odemetarihi" name="odemetarihi" class="form-control" placeholder="">
              </div>
          </div>
          <div class="form-group row">
              <label for="odenenmiktar" class="col-sm-3 col-form-label">Ödenen Miktar</label>
              <div class="input-group col-sm-9">
                  <span class="input-group-text" id="basic-addon1">TL</span>
                  <input type="number" name="odenenmiktar" id="odenenmiktar" class="form-control" placeholder="">
              </div>
          </div>
          <div class="form-group row">
            <label for="odemekanali" class="col-sm-3 col-form-label">Ödeme Kanalı</label>
            <div class="col-sm-9">
                <select name="odemekanali" id="odemekanali" class="form-control" aria-label="Default select example">
                    <option value="1">Havale/EFT</option>
                    <option value="2">Kredi Kartı</option>
                    <option value="3" selected >Nakit</option>
                  </select>
                </div>
        </div>
      </div>

      <div class="col-sm-6">
          <div class="form-group row">
              <label for="carikodu" class="col-sm-3 col-form-label">Cari Kodu:</label>
              <div class="input-group col-sm-9">
                  <input type="text" class="form-control" name="carikodu" id="carikodu" placeholder="TC/Cari Kod Giriniz" required>
                  <input type="button" value="Getir" class="btn btn-info btn-sm" />
              </div>
          </div>
          <div class="form-group row">
              <label for="cariadi" class="col-sm-3 col-form-label">Cari Adı</label>
              <div class="input-group col-sm-9">
                      <input type="text" class="form-control" id="cariadi" name="cariadi" placeholder="">
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
