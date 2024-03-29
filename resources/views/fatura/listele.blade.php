@extends('layouts.contentLayoutMaster')
{{-- title --}}
@section('title', 'Fatura Listele')

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
            <h4 class="card-title">Fatura Listele</h4>
          </div>
          <div class="card-body card-dashboard">
            <p class="card-text">
              Bu listeden tüm fatura listesini görüntüleyebilirsiniz.
            </p>
            <div class="table-responsive">
              <table class="table zero-configuration dataTable">
                <thead>
                  <tr>
                    <th>Fatura Kodu</th>
                    <th>İsim Soyisim</th>
                    <th>Tarih</th>
                    <th>Ödenen</th>
                    <th>Toplam</th>
                    <th>Durumu</th>
                    <th>İşlem</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($faturalar as $f)
                    <tr>
                      <td>{{ $f->faturakodu }}</th>
                      <td>{{ $f->adsoyad }}</td>
                      <td>{{ $f->faturatarih }}</td>
                      <td>{{ $f->toplamodenenmiktar }}</td>
                      <td>{{ $f->faturatoplam }}</td>
                      <td>{{ $f->faturadurum }}</td>
                      <td><a class="btn btn-info btn-sm" href="{{ route('fatura-kapat', $f->faturakodu) }}"
                          data-toggle="tooltip" data-placement="top" title="Faturayı Kapat">
                          <i class="fa fa-edit"></i> </a>

                      </td>
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
