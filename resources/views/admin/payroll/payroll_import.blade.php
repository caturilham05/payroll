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
                        {{-- <li class="breadcrumb-item"><a href="{{route('admin.navbars.create')}}">{{$title}}</a></li> --}}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('content')
<div class="panel panel-default">
  <div class="panel-body">
    <p>Pastikan kolom excel sesuai dengan kriteria dibawah ini: <br>• (*) = Wajib<br>• (**) = <b>Boleh</b> diisi atau <b>Tidak</b><br>• (-) = Tidak perlu di isi</p>
    <div class="mb-4" style="overflow-x: auto;">
      <table class="table table-bordered table table-striped mb-0">
        <tr>
          <th>A</th>
          <th>B</th>
          <th>C</th>
          <th>D</th>
          <th>E</th>
          <th>F</th>
          <th>G</th>
          <th>H</th>
          <th>I</th>
          <th>J</th>
          <th>K</th>
          <th>L</th>
          <th>M</th>
          <th>N</th>
          <th>O</th>
          <th>P</th>
          <th>Q</th>
          <th>R</th>
          <th>S</th>
          <th>T</th>
          <th>U</th>
          <th>V</th>
          <th>W</th>
          <th>X</th>
          <th>Y</th>
          <th>Z</th>
          <th>AA</th>
          <th>AB</th>
          <th>AC</th>
        </tr>
        <tr>
          <td><b>Emp No.(*)</b></td>
          <td><b>No. ID(*)</b></td>
          <td><b>NIK(*)</b></td>
          <td><b>Nama(*)</b></td>
          <td><b>Auto-Assign(**)</b></td>
          <td><b>Tanggal(*)</b></td>
          <td><b>Jam Kerja(*)</b></td>
          <td><b>Jam Masuk(*)</b></td>
          <td><b>Jam Pulang(*)</b></td>
          <td><b>Scan Masuk(*)</b></td>
          <td><b>Scan Pulang(*)</b></td>
          <td><b>Normal(*)</b></td>
          <td><b>Riil(**)</b></td>
          <td><b>Terlambat(**)</b></td>
          <td><b>Plg. Cepat(**)</b></td>
          <td><b>Absent(**)</b></td>
          <td><b>Lembur(**)</b></td>
          <td><b>Jml Jam Kerja(**)</b></td>
          <td><b>Pengecualian(**)</b></td>
          <td><b>Harus C/In(*)</b></td>
          <td><b>Harus C/Out(*)</b></td>
          <td><b>Departemen(*)</b></td>
          <td><b>Hari Normal(**)</b></td>
          <td><b>Akhir Pekan(**)</b></td>
          <td><b>Hari Libur(**)</b></td>
          <td><b>Jml Kehadiran(**)</b></td>
          <td><b>Lembur Hari Normal(**)</b></td>
          <td><b>Lembur Akhir Pekan(**)</b></td>
          <td><b>Lembur Hari Libur(**)</b></td>
        </tr>
        <tr>
          <td>33</td>
          <td>37</td>
          <td>20200501020015</td>
          <td>AHMAD FAJAR YUSRIANSYAH</td>
          <td>true / false</td>
          <td>2024-06-06</td>
          <td>Pagi / Sore</td>
          <td>08:00</td>
          <td>16:00</td>
          <td>08:00</td>
          <td>08:00</td>
          <td>0.5</td>
          <td>0.5</td>
          <td>06:00</td>
          <td>15:00</td>
          <td>True / False</td>
          <td>05:00</td>
          <td>02:30</td>
          <td>-</td>
          <td>True / False</td>
          <td>True / False</td>
          <td>Our Company</td>
          <td>0.5</td>
          <td>0.5</td>
          <td>0.5</td>
          <td>03:44</td>
          <td>0.5</td>
          <td>0.5</td>
          <td>0.5</td>
        </tr>
      </table>
    </div>
  </div>
  {{-- <form action="{{route('admin.payroll_import_show')}}" method="POST" enctype="multipart/form-data"> --}}
  <form action="" method="POST" enctype="multipart/form-data" id="excelShow">
    @csrf
    <div class="card-body">
      <div class="form-group">
        <label for="import_excel">Import Excel</label>
        <div class="col-md-12">
          <input type="file" class="form-control" name="import_excel" id="import_excel" required>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer" id="excelShowFooter">
      <button type="submit" class="btn btn-primary" {{-- id="excelShow" --}}>Lihat Data Excel</button>
    </div>
  </form>
  <div id="excelImport"></div>
  {{-- <form action="" method="POST" enctype="multipart/form-data" id="excelImport">@csrf</form> --}}
</div>
@endsection

@section('script')
<script type="text/javascript">
  $(document).ready(function(){
    $('#excelShow').submit(function(e){
      e.preventDefault()
      $.ajax({
        url: `/payroll/import/show`,
        method:"POST",
        data:new FormData(this),
        dataType:'JSON',
        contentType: false,
        cache: false,
        processData: false,
        beforeSend:function(){
          $('#excelImport').html(`
            <center>
              <span>Loading...</span>
            </center>
          `);
        },
        success: function(res){
          console.log(res)
          $('#excelShowFooter').hide()
          $('#excelImport').html(res.html);
        }
      });
    })
  })
</script>
@endsection