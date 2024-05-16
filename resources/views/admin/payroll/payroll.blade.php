@extends('admin.layout.admin')

@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{$title}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">{{$title}}</a></li>
                        {{-- <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{$title}}</a></li> --}}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
  @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          <span>{{ session('success') }}</span>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
  @endif
  @if (session()->has('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <span>{{ session('error') }}</span>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
  @endif

  <a href="{{route('admin.payroll_import')}}">
    <button type="submit" class="btn btn-primary mb-3"><i class="fas fa-upload"></i>&nbsp;&nbsp; Import Payroll </button>
  </a>
  <div class="container">
      <div class="p-3 card">
          <table class="table table-bordered table-hover" id="payrolls">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Tanggal (Y-m-d)</th>
                    <th>Jam Kerja</th>
                    <th>Jam Masuk</th>
                    <th>Jam Pulang</th>
                </tr>
            </thead>
          </table>
      </div>
  </div>
@endsection

@section('script')
    <script type="text/javascript">
        let table = $('#payrolls').DataTable({
            lengthMenu: [
                [30, 60, 90, 120, 150, -1],
                [30, 60, 90, 120, 150, "All"],
            ],
            paging: true,
            responsive: true,
            searching: true,
            processing: true,
            serverSide: true,
            scrollY: "75vh",
            scrollCollapse: true,
            ajax: "{{ route('admin.payroll') }}",
            columns: [
                {data: 'employee_id', name: 'employee_id'},
                {data: 'nik', name: 'payroll.nik'},
                {data: 'employee_name', name: 'payroll.employee_name'},
                {data: 'date', name: 'payroll.date'},
                {data: 'working_hours', name: 'payroll.working_hours'},
                {data: 'time_in', name: 'time_in'},
                {data: 'time_out', name: 'time_out'},
            ]
        })
    </script>
@endsection
