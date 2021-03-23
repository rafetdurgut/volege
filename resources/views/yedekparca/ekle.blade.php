@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Yedek Parça Ekle')
<meta name="csrf-token" content="{{ csrf_token() }}">

{{-- page style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/forms/wizard.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.css" integrity="sha512-uq8QcHBpT8VQcWfwrVcH/n/B6ELDwKAdX4S/I3rYSwYldLVTs7iII2p6ieGCM13QTPEKZvItaNKBin9/3cjPAg==" crossorigin="anonymous" />
@endsection

@section('content')
<form method="POST" action="{{route('yedekparca-ekle')}}" >
    @csrf
<div class="bg-white p-3 shadow">
    @if(Session::get('success'))
        <div class="alert alert-success">
            {{ Session('success')}}
        </div>
        @endif
        @if(Session::get('error'))
        <div class="alert alert-dange">
            {{ Session('error')}}
        </div>
    @endif
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
                      <input id="alisfiyati" name="alisfiyati" type="text" class="form-control" placeholder="">
              </div>
          </div>

          <div class="form-group row">
              <label for="kdv" class="col-sm-3 col-form-label">KDV</label>
              <div class="input-group col-sm-9">
                      <span class="input-group-text" id="basic-addon1">%</span>
                      <input id="kdv" name="kdv" type="number" class="form-control" value="18">
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
              <input id="stokadi" name="stokadi" type="text" class="form-control" required placeholder="">
              </div>
          </div>

          <div class="form-group row">
              <label for="barkod" class="col-sm-3 col-form-label">Barkod:</label>
              <div class="col-sm-9">
              <input name="barkod" id="barkod" type="text" class="form-control" placeholder="">
              </div>
          </div>

          <div class="form-group row">
              <label for="birim" class="col-sm-3 col-form-label">Birim:</label>
              <div class="col-sm-9">
                  <select class="form-control" id="birim" name="birim" aria-label="Default select example">
                      <option value="1">Birim Yok</option>
                      <option value="2" selected>Adet</option>
                      <option value="3">Litre</option>
                      <option value="4">Takım</option>
                      <option value="5">Paket</option>
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
                      <input type="text" class="form-control" id="satisfiyati" name="satisfiyati" placeholder="">
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
