<?php

namespace App\Imports;

use App\Models\Payroll;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;


class PayrollImport implements ToModel, WithHeadingRow
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // $payroll = new Payroll([
        //    'employee_id'         => $row['emp_no'] ?? 0,
        //    'no_id'               => $row['no_id'] ?? 0,
        //    'nik'                 => $row['nik'] ?? '',
        //    'employee_name'       => $row['nama'] ?? '',
        //    'auto_assign'         => !empty($row['auto_assign']) ? $row['auto_assign'] : 0,
        //    'date'                => !empty($row['tanggal']) ? date('Y-m-d H:i:s', strtotime($row['tanggal'])) : '',
        //    'working_hours'       => $row['jam_kerja'] ?? '',
        //    'time_in'             => !empty($row['jam_masuk']) ? date('H:i:s', strtotime($row['jam_masuk'])) : '',
        //    'time_out'            => !empty($row['jam_pulang']) ? date('H:i:s', strtotime($row['jam_pulang'])) : '',
        //    'scanned_in'          => !empty($row['scan_masuk']) ? date('H:i:s', strtotime($row['scan_masuk'])) : '',
        //    'scanned_out'         => !empty($row['scan_pulang']) ? date('H:i:s', strtotime($row['scan_pulang'])) : '',
        //    'normal'              => !empty($row['normal']) ? floatval($row['normal']) : 0,
        //    'riil'                => !empty($row['riil']) ? floatval($row['riil']) : 0,
        //    'time_in_late'        => !empty($row['terlambat']) ? date('H:i:s', strtotime($row['terlambat'])) : '',
        //    'time_out_early'      => !empty($row['plg_cepat']) ? date('H:i:s', strtotime($row['plg_cepat'])) : '',
        //    'absent'              => !empty($row['absent']) ? true : false,
        //    'overtime'            => !empty($row['lembur']) ? date('H:i:s', strtotime($row['lembur'])) : '',
        //    'working_hours_total' => !empty($row['jml_jam_kerja']) ? date('H:i:s', strtotime($row['jml_jam_kerja'])) : '',
        //    'exception'           => $row['pengecualian'] ?? '',
        //    'mandatory_check_in'  => !empty($row['harus_cin']) ? true : false,
        //    'mandatory_check_out' => !empty($row['harus_cout']) ? true : false,
        //    'department'          => $row['departemen'] ?? '',
        //    'weekday'             => !empty($row['hari_normal']) ? floatval($row['hari_normal']) : 0,
        //    'weekend'             => !empty($row['akhir_pekan']) ? floatval($row['akhir_pekan']) : 0,
        //    'holiday'             => !empty($row['hari_libur']) ? floatval($row['hari_libur']) : 0,
        //    'attendance_total'    => !empty($row['jml_kehadiran']) ? date('H:i:s', strtotime($row['jml_kehadiran'])) : '',
        //    'weekday_overtime'    => !empty($row['lembur_hari_normal']) ? floatval($row['lembur_hari_normal']) : 0,
        //    'weekend_overtime'    => !empty($row['lembur_akhir_pekan']) ? floatval($row['lembur_akhir_pekan']) : 0,
        //    'holiday_overtime'    => !empty($row['lembur_hari_libur']) ? floatval($row['lembur_hari_libur']) : 0,
        // ]);

        return true;
    }
}
