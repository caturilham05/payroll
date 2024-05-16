<form action="{{route('admin.payroll_import_process')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="excel" value="{{$file}}" class="form-control">
  <div class="card">
    <div class="table">
      <table class="table table-bordered table-striped table-responsive">
        <thead>
          <tr>
            <td><b>No.</b></td>
            <td><b>Emp No.</b></td>
            <td><b>No. ID</b></td>
            <td><b>NIK</b></td>
            <td><b>Nama</b></td>
            <td><b>Auto-Assign</b></td>
            <td><b>Tanggal</b></td>
            <td><b>Jam Kerja</b></td>
            <td><b>Jam Masuk</b></td>
            <td><b>Jam Pulang</b></td>
            <td><b>Scan Masuk</b></td>
            <td><b>Scan Pulang</b></td>
            <td><b>Normal</b></td>
            <td><b>Riil</b></td>
            <td><b>Terlambat</b></td>
            <td><b>Plg. Cepat</b></td>
            <td><b>Absent</b></td>
            <td><b>Lembur</b></td>
            <td><b>Jml Jam Kerja</b></td>
            <td><b>Pengecualian</b></td>
            <td><b>Harus C/In</b></td>
            <td><b>Harus C/Out</b></td>
            <td><b>Departemen</b></td>
            <td><b>Hari Normal</b></td>
            <td><b>Akhir Pekan</b></td>
            <td><b>Hari Lembur</b></td>
            <td><b>Jml Kehadiran</b></td>
            <td><b>Lembur Hari Normal</b></td>
            <td><b>Lembur Akhir Pekan</b></td>
            <td><b>Lembur Hari Libur</b></td>
          </tr>
        </thead>
        <tbody>
          @php
            $no = 1;
          @endphp
          @foreach ($excels as $item)
            {{-- <pre>
              @php
                print_r($item)
              @endphp
            </pre> --}}
            <tr>
              <td>{{$no++}}</td>
              <td>{{$item['emp_no']}}<input type="hidden" name="employee_id[]" value="{{$item['emp_no']}}" class="form-control"></td>
              <td>{{$item['no_id']}}<input type="hidden" name="no_id[]" value="{{$item['no_id']}}" class="form-control"></td>
              <td>{{$item['nik']}}<input type="hidden" name="nik[]" value="{{$item['nik']}}" class="form-control"></td>
              <td>{{$item['nama']}}<input type="hidden" name="employee_name[]" value="{{$item['nama']}}" class="form-control"></td>
              <td>{{!empty($item['auto_assign']) ? $item['auto_assign'] : 0}}<input type="hidden" name="auto_assign[]" value="{{!empty($item['auto_assign']) ? 1 : 0}}" class="form-control"></td>
              <td><input type="date" name="date[]" value="{{date('Y-m-d', strtotime($item['tanggal']))}}" class="form-control"></td>
              <td>{{!empty($item['jam_kerja']) ? $item['jam_kerja'] : ''}}<input type="hidden" name="working_hours[]" value="{{$item['jam_kerja']}}" class="form-control"></td>
              <td><input type="time" name="time_in[]" value="{{$item['jam_masuk']}}" class="form-control"></td>
              <td><input type="time" name="time_out[]" value="{{$item['jam_pulang']}}" class="form-control"></td>
              <td><input type="time" name="scanned_in[]" value="{{$item['scan_masuk']}}" class="form-control"></td>
              <td><input type="time" name="scanned_out[]" value="{{$item['scan_pulang']}}" class="form-control"></td>
              <td>{{!empty($item['normal']) ? $item['normal'] : 0}}<input type="hidden" name="normal[]" value="{{$item['normal']}}" class="form-control"></td>
              <td>{{!empty($item['riil']) ? $item['riil'] : 0}}<input type="hidden" name="riil[]" value="{{$item['riil']}}" class="form-control"></td>
              <td><input type="time" name="time_in_late[]" value="{{$item['terlambat']}}" class="form-control"></td>
              <td><input type="time" name="time_out_early[]" value="{{$item['plg_cepat']}}" class="form-control"></td>
              <td>{{!empty($item['absent']) ? $item['absent'] : 0}}<input type="hidden" name="absent[]" value="{{!empty($item['absent']) ? 1 : 0}}" class="form-control"></td>
              <td><input type="time" name="overtime[]" value="{{$item['lembur']}}" class="form-control"></td>
              <td><input type="time" name="working_hours_total[]" value="{{$item['jml_jam_kerja']}}" class="form-control"></td>
              <td>{{!empty($item['pengecualian']) ? $item['pengecualian'] : 0}}<input type="hidden" name="exception[]" value="{{$item['pengecualian']}}" class="form-control"></td>
              <td>{{!empty($item['harus_cin']) ? $item['harus_cin'] : 0}}<input type="hidden" name="mandatory_check_in[]" value="{{!empty($item['harus_cin']) ? 1 : 0}}" class="form-control"></td>
              <td>{{!empty($item['harus_cout']) ? $item['harus_cout'] : 0}}<input type="hidden" name="mandatory_check_out[]" value="{{!empty($item['harus_cout']) ? 1 : 0}}" class="form-control"></td>
              <td>{{!empty($item['departemen']) ? $item['departemen'] : ''}}<input type="hidden" name="department[]" value="{{$item['departemen']}}" class="form-control"></td>
              <td>{{!empty($item['hari_normal']) ? $item['hari_normal'] : 0}}<input type="hidden" name="weekday[]" value="{{$item['hari_normal']}}" class="form-control"></td>
              <td>{{!empty($item['akhir_pekan']) ? $item['akhir_pekan'] : 0}}<input type="hidden" name="weekend[]" value="{{$item['akhir_pekan']}}" class="form-control"></td>
              <td>{{!empty($item['hari_libur']) ? $item['hari_libur'] : 0}}<input type="hidden" name="holiday[]" value="{{$item['hari_libur']}}" class="form-control"></td>
              <td><input type="time" name="attendance_total[]" value="{{$item['jml_kehadiran']}}" class="form-control"></td>
              <td>{{!empty($item['lembur_hari_normal']) ? $item['lembur_hari_normal'] : 0}}<input type="hidden" name="weekday_overtime[]" value="{{$item['lembur_hari_normal']}}" class="form-control"></td>
              <td>{{!empty($item['lembur_akhir_pekan']) ? $item['lembur_akhir_pekan'] : 0}}<input type="hidden" name="weekend_overtime[]" value="{{$item['lembur_akhir_pekan']}}" class="form-control"></td>
              <td>{{!empty($item['lembur_hari_libur']) ? $item['lembur_hari_libur'] : 0}}<input type="hidden" name="holiday_overtime[]" value="{{$item['lembur_hari_libur']}}" class="form-control"></td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary" id="excelImport">Proses Excel</button>
    </div>
  </div>
</form>