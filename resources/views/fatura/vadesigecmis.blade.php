@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title', 'Vadesi Geçmiş Fatura Listele')

@section('vendor-styles')
  <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
  <style>
    .btn i {
      top: 0px !important;
    }

  </style>
@endsection

@section('content')
  <section id="basic-datatable">
    @isset($success)
      <div class="alert alert-success">
        {{ $success }}
      </div>
    @endisset
    @isset($error)
      <div class="alert alert-danger">
        {{ $error }}
      </div>
    @endisset
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Vadesi Geçmiş Ödenmemiş Faturalar</h4>
          </div>
          <div class="card-body card-dashboard">
            <p class="card-text">
              Bu listeden vadesi geçmiş olup, ödenmemiş faturaların tamamını görüntüleyebilirsiniz.
            </p>
            <div class="table-responsive">
              <table class="table zero-configuration dataTable ">
                <thead>
                  <tr>
                    <th>Fatura Kodu</th>
                    <th>Fatura Tarihi</th>
                    <th>Vade Tarihi</th>
                    <th>Toplam Ödeme</th>
                    <th>Fatura Toplam</th>
                    <th>Kalan Ödeme</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($odemeler as $odeme)
                    <tr>
                      <td>{{ $odeme->faturakodu }}</th>
                      <td>{{ $odeme->faturatarih }}</td>  
                      <td>{{ $odeme->vade }}</td>    
                      <td>{{ $odeme->toplamodenen }}</td>  
                      <td>{{ $odeme->faturatoplam }}</td> 
                      <td>{{ $odeme->faturatoplam - $odeme->toplamodenen }}</td> 

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
  <script src="{{ asset('vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendors/js/tables/datatable/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('vendors/js/tables/datatable/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
  <script src="{{ asset('vendors/js/tables/datatable/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
  <script src="{{ asset('vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
@endsection
{{-- page scripts --}}
@section('page-scripts')
  <script src="{{ asset('js/scripts/datatables/datatable.js') }}"></script>
@endsection
