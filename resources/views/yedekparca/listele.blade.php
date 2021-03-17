@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title','Yedek Parça Listele')

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
          <h4 class="card-title">Stok Listele</h4>
        </div>
        <div class="card-body card-dashboard">
          <p class="card-text">
            Bu listeden tüm yedek parça listesini görüntüleyebilirsiniz.
          </p>
          <div class="table-responsive">
            <table class="table zero-configuration">
              <thead>
                <tr>
                  <th>Stok Kodu</th>
                  <th>Adı</th>
                  <th>Grup</th>
                  <th>Stok</th>
                  <th>Alıs Fiyatı</th>
                  <th>Satış Fiyatı</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>YP000212</td>
                  <td>Ön sağ far</td>
                  <td>Far</td>
                  <td>61</td>
                  <td>123.00 TL</td>
                  <td>123.00 TL</td>
                </tr>
                <tr class="table-warning">
                  <td>YP000212</td>
                  <td>Ön sağ far</td>
                  <td>Far</td>
                  <td>61</td>
                  <td>123.00 TL</td>
                  <td>123.00 TL</td>
                </tr>
                <tr class="table-danger">
                  <td>YP000212</td>
                  <td>Ön sağ far</td>
                  <td>Far</td>
                  <td>61</td>
                  <td>123.00 TL</td>
                  <td>123.00 TL</td>
                </tr>
                <tr>
                  <td>YP000212</td>
                  <td>Ön sağ far</td>
                  <td>Far</td>
                  <td>61</td>
                  <td>123.00 TL</td>
                  <td>123.00 TL</td>
                </tr>
                <tr>
                  <td>YP000212</td>
                  <td>Ön sağ far</td>
                  <td>Far</td>
                  <td>61</td>
                  <td>123.00 TL</td>
                  <td>123.00 TL</td>
                </tr>
                <tr>
                  <td>YP000212</td>
                  <td>Ön sağ far</td>
                  <td>Far</td>
                  <td>61</td>
                  <td>123.00 TL</td>
                  <td>123.00 TL</td>
                </tr>
                <tr class="table-warning">
                  <td>FT0012</td>
                  <td>Tampon</td>
                  <td>Test</td>
                  <td>63</td>
                  <td>1232.00 TL</td>
                  <td>1232.00 TL</td>
                </tr>
                <tr class="table-danger">
                  <td>FT0012</td>
                  <td>Tampon</td>
                  <td>Test</td>
                  <td>66</td>
                  <td>1232.00 TL</td>
                  <td>1232.00 TL</td>
                </tr>
                <tr>
                  <td>YP000212</td>
                  <td>Ön sağ far</td>
                  <td>Far</td>
                  <td>61</td>
                  <td>123.00 TL</td>
                  <td>123.00 TL</td>
                </tr>
                <tr>
                  <td>YP000212</td>
                  <td>Ön sağ far</td>
                  <td>Far</td>
                  <td>61</td>
                  <td>123.00 TL</td>
                  <td>123.00 TL</td>
                </tr>
                <tr>
                  <td>YP000212</td>
                  <td>Ön sağ far</td>
                  <td>Far</td>
                  <td>61</td>
                  <td>123.00 TL</td>
                  <td>123.00 TL</td>
                </tr>
                <tr>
                  <td>YP000212</td>
                  <td>Ön sağ far</td>
                  <td>Far</td>
                  <td>61</td>
                  <td>123.00 TL</td>
                  <td>123.00 TL</td>
                </tr>
                <tr>
                  <td>YP000212</td>
                  <td>Ön sağ far</td>
                  <td>Far</td>
                  <td>61</td>
                  <td>123.00 TL</td>
                  <td>123.00 TL</td>
                </tr>
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
