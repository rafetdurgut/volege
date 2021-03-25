@extends('layouts.contentLayoutMaster')

{{-- title --}}
@section('title','Yeni Fatura Ekle')
<meta name="csrf-token" content="{{ csrf_token() }}">

{{-- page style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/forms/wizard.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.css" integrity="sha512-uq8QcHBpT8VQcWfwrVcH/n/B6ELDwKAdX4S/I3rYSwYldLVTs7iII2p6ieGCM13QTPEKZvItaNKBin9/3cjPAg==" crossorigin="anonymous" />
@endsection

@section('content')
<form class="repeater-default" method="POST" action="{{ route('fatura-ekle')}}">
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
  <form class="repeater-default">
  <legend> Fatura Bilgileri </legend>
  <div class="form-group row">
      <div class="col-sm-6">
          <div class="form-group row">
              <label for="faturakodu" class="col-sm-3 col-form-label">Fatura Kodu:</label>
              <div class="input-group col-sm-9">
                  <input type="text" class="form-control" name="faturakodu" id="faturakodu" placeholder="" required value="VE10002">
                  <input type="button" value="Oluştur" class="btn btn-info btn-sm" />
              </div>
          </div>
          <div class="form-group row">
              <label for="faturatarihi" class="col-sm-3 col-form-label">Fatura Tarihi:</label>
              <div class="input-group col-sm-9">
                  <input type="datetime-local" class="form-control" name="faturatarihi" id="faturatarihi" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
              </div>
          </div>
          <div class="form-group row">
              <label for="vade" class="col-sm-3 col-form-label">Vadesi</label>
              <div class="input-group col-sm-9">
                  <input type="datetime-local" id="vade" name="vade" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
              </div>
          </div>
          <div class="form-group row">
              <label for="faturadurum" class="col-sm-3 col-form-label">Fatura Durumu</label>
              <div class="col-sm-9">
                  <select class="form-control" id="faturadurum" name="faturadurum">
                      <option value="1" selected>Açık</option>
                      <option value="2">Kapalı</option>
                    </select>
                  </div>
          </div>
      </div>

      <div class="col-sm-6">
          <div class="form-group row">
              <label for="carikodu" class="col-sm-3 col-form-label">Cari Kodu:</label>
              <div class="input-group col-sm-9">
                  <input type="text" class="form-control" id="carikodu" name="carikodu" value="CM0001" placeholder="" required>
                  <input type="button" value="Getir" class="btn btn-info btn-sm" />
              </div>
          </div>
          <div class="form-group row">
              <label for="cariadi" class="col-sm-3 col-form-label">Cari Adı</label>
              <div class="input-group col-sm-9">
                      <input type="text" id="cariadi" name="cariadi" class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1">
              </div>
          </div>
          <div class="form-group row">
              <label for="faturatipi" class="col-sm-3 col-form-label">Fatura Tipi</label>
              <div class="col-sm-9">
                  <select id="faturatipi" name="faturatipi" class="form-control" aria-label="Default select example">
                      <option  value="1" selected>Alış</option>
                      <option value="2">Satış</option>
                    </select>
                  </div>
          </div>
          <div class="form-group row">
            <label for="gibkodu" class="col-sm-3 col-form-label">GİB Kodu</label>
            <div class="col-sm-9">
              <input id="gibkodu" name="gibkodu" type="text" class="form-control" value="GİB0001" placeholder="">
            </div>
        </div>
      </div>
      <div  class="col-sm-12">
        <legend> Parça Bilgileri </legend>
        <div class="form-group row">
            <div class="col-sm-2">
                Stok No
            </div>
            <div class="col-sm-2">
                Stok Adı
            </div>
            <div class="col-sm-1">
              Adet
          </div>
            <div class="col-sm-2">
                Birim Fiyat
            </div>
            <div class="col-sm-2">
                İskonto
            </div>
            <div class="col-sm-2">
                Toplam Tutar
            </div>
            <div class="col-sm-1">

          </div>
        </div>
        <div data-repeater-list="parcalar" id="parcalar" >
            <div data-repeater-item>
              <div class="form-group parca-satir row">
                <div class="col-sm-2">
                    <input type="text" name="stokno" class="form-control ypstoknotxt ui-autocomplete-input" autocomplete="off" />
                </div>
                <div class="col-sm-2">
                    <input name="stokadi"  type="text" class="form-control ypstokadi" autocomplete="off"  />
                </div>
                <div class="col-sm-1">
                    <input name="adet" type="text" class="form-control ypadet" autocomplete="off"   />
                </div>
                <div class="col-sm-2">
                    <input name="birimfiyat"  type="text" class="form-control ypsatisfiyati" autocomplete="off"   />
                </div>
                <div class="col-sm-2">
                  <input name="iskonto" type="text" class="form-control ypiskonto" />
              </div>
                <div class="col-sm-2">
                    <input name="toplamtutar"  type="text"  class="form-control yptoplam" readonly />
                </div>
                <div class="col-sm-1">
                  <button class="btn btn-danger" data-repeater-delete class="satirsil" type="button"> Sil</button>
                </div>
                <input type="hidden" name="parcaid" class="parcaid" />
            </div>
          </div>
        </div>
        <div class="clearfix">
          <button class="btn btn-info float-right" id="satirekle" data-repeater-create type="button">
            <i class="bx bx-plus"></i>Satır Ekle
          </button>
      </div>
  <div class="row">
    <div class="col-4 col-sm-6 col-12 mt-75">
      <p>Fatura Detay Bilgileri</p>
    </div>
    <div class="col-8 col-sm-6 col-12 d-flex justify-content-end mt-75">
      <div class="invoice-subtotal">
        <div class="invoice-calc d-flex justify-content-between">
          <span class="invoice-title">Alt Toplam</span>
          <span class="invoice-value"><span id="faturaAltToplam">0.00</span> TL</span>
        </div>
        <div class="invoice-calc d-flex justify-content-between">
          <span class="invoice-title">KDV (%18)</span>
          <span class="invoice-value"><span id="faturaKDV">0.00</span> TL</span>
        </div>
        <hr>
        <div class="invoice-calc d-flex justify-content-between">
          <span class="invoice-title">Fatura Toplam: </span>
          <span class="invoice-value"><span  id="faturaToplam">0.00</span> TL</span>
        </div>
    </div>
  </div>
  <div class="clearfix">
      <button type="submit" class="btn btn-primary btn-lg float-right mr-1">Kaydet</button>
  </div>
</div>
</form>

@endsection


{{-- page scripts --}}
@section('page-scripts')


<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.min.js" integrity="sha512-TToQDr91fBeG4RE5RjMl/tqNAo35hSRR4cbIFasiV2AAMQ6yKXXYhdSdEpUcRE6bqsTiB+FPLPls4ZAFMoK5WA==" crossorigin="anonymous"></script>
<script src="{{asset('js/scripts/autocomplete/autocomplete.js')}}"></script>
<script type="text/javascript">
$(document).ready( function() {
  $(document).on("click change", ".parca-satir input",function()
  {
    var adet = $(this).parent().parent().find('.ypadet').val();
    if(!adet)
      return false;
    var birimfiyat = $(this).parent().parent().find('.ypsatisfiyati').val();
    if(!birimfiyat)
      return false;
    var iskonto = $(this).parent().parent().find('.ypiskonto').val();
    if(iskonto)
    {
      iskontolar = iskonto.split('-');
      var toplamfiyat = parseFloat(birimfiyat) * parseFloat(adet);
      iskontolar.forEach(function(value,key){
        toplamfiyat = toplamfiyat- toplamfiyat*parseFloat(value/100);
      });
      $(this).parent().parent().find('.yptoplam').val(toplamfiyat);
    }
    else
    {
      var toplamfiyat = parseFloat(birimfiyat) * parseFloat(adet);
      $(this).parent().parent().find('.yptoplam').val(toplamfiyat);
    }
    var altTutar = 0.00;
    $('.yptoplam').each(function( key, value ) {
      if(value.value != "")
      altTutar += parseFloat(value.value);
    });
    altTutar = altTutar.toFixed(2);
    var toplamTutar = (altTutar*1.18).toFixed(2);
    var kdv = (altTutar*0.18).toFixed(2);
    $('#faturaAltToplam').text(altTutar);
    $('#faturaToplam').text( toplamTutar );
    $('#faturaKDV').text(kdv);
  });
});

</script>


@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
<script src="{{asset('js/scripts/forms/form-repeater.js')}}"></script>
@endsection
