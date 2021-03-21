@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','İş Emri Listele')

@section('vendor-styles')
<link rel="stylesheet" href="{{asset('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
<style>
  .btn i {
    top:0px !important;
  }
  </style>
@endsection

@section('content')
<section id="basic-datatable">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">İş Emri Listele</h4>
        </div>
        <div class="card-body card-dashboard">
          <p class="card-text">
            Bu listeden tüm iş emirleri görüntüleyebilirsiniz, Eğer iş emri açık ise düzenleyebilir aksi takdirde herhangi bir düzenleme yapamazsınız.
          </p>
          <div class="table-responsive">
            <table class="table zero-configuration">
              <thead>
                <tr>
                  <th>Emir Kodu</th>
                  <th>Plaka</th>
                  <th>Müşteri</th>
                  <th>Giriş Tarihi</th>
                  <th>Teslim Alan</th>
                  <th>İşlemler</th>
                </tr>
              </thead>
              <tbody>
                @foreach($emirler as $emir)
                <tr>
                  <td>{{$emir->id}}</td>
                  <td>{{$emir->plaka}}</td>
                  <td>{{$emir->adsoyad}}</td>
                  <td>{{$emir->aracgiristarihi}}</td>
                  <td>{{$emir->teslimalan}}</td>
                  <td> <a href="#" class="btn btn-icon btn-outline-primary mr-1 mb-1"><i class="fa fa-edit"></i></a> <a href="#"  class="btn btn-icon btn-outline-primary mr-1 mb-1"><i class="fa fa-info-circle"></i></a> <a href="#"  class="btn btn-icon btn-outline-primary mr-1 mb-1"><i class="fa fa-print"></i></a>  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/vfs_fonts.js')}}"></script>
@endsection
{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/datatables/datatable.js')}}"></script>
@endsection
