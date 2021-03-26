@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Cari Listele')

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
          <h4 class="card-title">Cari Listele</h4>
        </div>
        <div class="card-body card-dashboard">
          <p class="card-text">
            Bu listeden tüm cari kayıtların listesini görüntüleyebilirsiniz.
          </p>
          <div class="table-responsive">
           @isset($musteriler)
           <table class="table zero-configuration dataTable ">
            <thead>
              <tr>
                <th>Cari Kodu</th>
                <th>İsim Soyisim</th>
                <th>Telefon</th>
                <th>Adres</th>
                <th>İşlem</th>
              </tr>
            </thead>
            <tbody>
             @foreach ($musteriler as $musteri )
             <tr>
              <td>{{ $musteri->tc }}</td>
              <td>{{ $musteri->adsoyad }}</td>
              <td>{{ $musteri->telefon }}</td>
              <td>{{ $musteri->adres }}</td>
              <td>
                <a class="btn btn-info btn-sm" href="{{ route('cari-kontrol',$musteri->id) }}" data-toggle="tooltip" data-placement="top" title="Cari hareketlerini gör.">
                  <i class="fa fa-lira-sign"></i> </a>

                <a class="btn btn-info btn-sm" href="{{ route('cari-duzenle',$musteri->id) }}" data-toggle="tooltip" data-placement="top" title="Cari kaydını güncelle.">
                    <i class="fa fa-edit"></i> </a>
              </td>
            </tr>
             @endforeach
            </tbody>
          </table>
           @endisset
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
