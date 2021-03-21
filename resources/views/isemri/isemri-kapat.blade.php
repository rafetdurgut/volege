@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Araç Çıkışı')
<meta name="csrf-token" content="{{ csrf_token() }}">

{{-- page style --}}
@section('page-styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.css" integrity="sha512-uq8QcHBpT8VQcWfwrVcH/n/B6ELDwKAdX4S/I3rYSwYldLVTs7iII2p6ieGCM13QTPEKZvItaNKBin9/3cjPAg==" crossorigin="anonymous" />
@endsection

@section('content')
<form class="repeater-default" method="POST" action={{route('isemri-kapat')}}>
  @csrf
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
  <div class="bg-white m-3 p-3 shadow">
      <legend> Araç Çıkışı </legend>

          <div class="container">
              <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="icerdekiArac">İçerideki Araç</label>
                  </div>
                  <select class="custom-select" id="icerdekiArac" name="saseno">
                    <option value=-1 selected>Seçiniz...</option>
                    @isset($araclar)
                      @foreach($araclar as $arac)
                      <option  value="{{$arac->id}}">{{$arac->plaka}}</option>
                    @endforeach
                    @endisset
                  </select>
                </div>
          </div>
          <div id="kapatmaFormuDiv">
              <div class="form-group row">
                <label for="yapilanlar" class="col-sm-3 col-form-label">Yapılanlar:</label>
                <div class="col-sm-9">
                    <textarea id="yapilanlar" rows="10" name="yapilanlar" class="form-control" rows="4"></textarea>
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
                  <div class="col-sm-2">
                      Stok No
                  </div>
                  <div class="col-sm-2">
                      Stok Adı
                  </div>
                  <div class="col-sm-2">
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
              </div>
              <div data-repeater-list="parcalar" id="parcalar" >
                  <div data-repeater-item>
                    <div class="form-group parca-satir row">
                      <div class="col-sm-2">
                          <input type="text" name="stokno" class="form-control ypstoknotxt ui-autocomplete-input" autocomplete="off" />
                      </div>
                      <div class="col-sm-2">
                          <input name="stokadi"  type="text" class="form-control ypstokadi" />
                      </div>
                      <div class="col-sm-2">
                          <input name="adet" type="text" class="form-control" />
                      </div>
                      <div class="col-sm-2">
                          <input name="birimfiyat"   type="text" class="form-control ypsatisfiyati" />
                      </div>
                      <div class="col-sm-2">
                        <input name="iskonto" id="iskonto" type="text" class="form-control" />
                    </div>
                      <div class="col-sm-2">
                          <input name="toplamtutar" id="toplamtutar" type="text" readonly class="form-control" />
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
          </div>
            <div class="clearfix mt-1 mb-2">
                <button type="submit" name="action" value="fatura" class="btn btn-info btn-md ">Fatura Kes</button>
                <button type="submit" name="action" value="cikis"  class="btn btn-danger btn-md">Araç Çıkışı Yap</button>
                <button type="submit" name="action" value="kayit"  class="btn btn-success btn-md  ">Kaydet</button>
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
  //$("#kapatmaFormuDiv").hide();
  $('#icerdekiArac').on('change', function() {
  if(this.value == -100000000)
  {
    $("#kapatmaFormuDiv").hide();
  }
  else
  {
    $("#kapatmaFormuDiv").show();
    //Get Ajax
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
      url:"../isemri/isemrikapatmagetir",
      type: 'post',
      dataType: "json",
      data: {
         _token: CSRF_TOKEN,
         search: this.value
      },
      success: function( data ) {
          console.log(data);
          $("#yapilanlar").val(data[0].isemirleri.yapilanlar);
          $("#iscilik").val(data[0].isemirleri.iscilik);
          $.each( data[0].parcalar, function( key, value ) {
             $("#satirekle").click();
             $('input[name="parcalar['+key+'][stokno]"]').val(value.stokkodu);
             $('input[name="parcalar['+key+'][stokadi]"]').val(value.stokadi);
             $('input[name="parcalar['+key+'][adet]"]').val(value.adet);
             $('input[name="parcalar['+key+'][birimfiyat]"]').val(value.satisfiyati);
             $('input[name="parcalar['+key+'][iskonto]"]').val(value.iskonto);
             $('input[name="parcalar['+key+'][toplamtutar]"]').val(value.toplamfiyat);
             $('input[name="parcalar['+key+'][parcaid]"]').val(value.id);
          });
      },
    });
  }
});
})
</script>



{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/forms/repeater/jquery.repeater.min.js')}}"></script>
<script src="{{asset('js/scripts/forms/form-repeater.js')}}"></script>
@endsection


@endsection
