@extends('layouts.contentLayoutMaster')
{{-- title --}}
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title','Cari Hareket Arama')


{{-- page style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/forms/wizard.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.css" integrity="sha512-uq8QcHBpT8VQcWfwrVcH/n/B6ELDwKAdX4S/I3rYSwYldLVTs7iII2p6ieGCM13QTPEKZvItaNKBin9/3cjPAg==" crossorigin="anonymous" />
@endsection


@section('content')
    <section id="tooltip-validation">
    <div class="row">
        <div class="col-12">
        <div class="card">

            <div class="card-header">

            <h4 class="card-title">Cari Bilgileri</h4>
            </div>
            <div class="card-body">
              @if(Session::get('success'))
              <div class="alert alert-success">
                  {{ Session('success')}}
              </div>
              @endif
              @isset($error)
              <div class="alert alert-danger">
                  {{ $error }}
              </div>
              @endif
            <form method="POST" action="{{route('cari-kontrol')}}">
                @csrf
                <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="tckimlik_ac">Cari Kodu</label>
                    <input type="text" name="tckimlik" id="tckimlik_ss" placeholder="" autocomplete="off" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="adsoyad">İsim Soyisim</label>
                    <input type="text" class="form-control" name="adsoyad" id="adsoyad_ss">

                </div>
                <div class="col-md-4 mt-2">
                    <button class="btn btn-primary"> Getir </button>
                </div>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
    </section>
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
