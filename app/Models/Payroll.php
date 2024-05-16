<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    protected $table = 'payroll';
    protected $fillable = [
        'employee_id',
        'no_id',
        'nik',
        'employee_name',
        'auto_assign',
        'date',
        'working_hours',
        'time_in',
        'time_out',
        'scanned_in',
        'scanned_out',
        'normal',
        'riil',
        'time_in_late',
        'time_out_early',
        'absent',
        'overtime',
        'working_hours_total',
        'exception',
        'mandatory_check_in',
        'mandatory_check_out',
        'department',
        'weekday',
        'weekend',
        'holiday',
        'attendance_total',
        'weekday_overtime',
        'weekend_overtime',
        'holiday_overtime',
    ];

    protected $casts = [
        'auto_assign'         => 'boolean',
        'absent'              => 'boolean',
        'mandatory_check_in'  => 'boolean',
        'mandatory_check_out' => 'boolean',
        'date'                => 'datetime:Y-m-d H:i:s',
    ];
}
