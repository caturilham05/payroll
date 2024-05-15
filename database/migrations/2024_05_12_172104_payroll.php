<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payroll', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->unsigned()->default(0)->nullable();
            $table->integer('no_id')->unsigned()->default(0)->nullable();
            $table->string('nik', 16)->nullable();
            $table->string('employee_name')->nullable();
            $table->boolean('auto_assign')->nullable();
            $table->date('date')->nullable();
            $table->string('working_hours', 10)->nullable();
            $table->time('time_in')->nullable();
            $table->time('time_out')->nullable();
            $table->time('scanned_in')->nullable();
            $table->time('scanned_out')->nullable();
            $table->double('normal')->unsigned()->nullable();
            $table->double('riil')->unsigned()->nullable();
            $table->time('time_in_late')->nullable();
            $table->time('time_out_early')->nullable();
            $table->boolean('absent')->nullable();
            $table->time('overtime')->nullable();
            $table->time('working_hours_total')->nullable();
            $table->string('exception')->nullable();
            $table->boolean('mandatory_check_in')->nullable();
            $table->boolean('mandatory_check_out')->nullable();
            $table->string('department')->nullable();
            $table->double('weekday')->unsigned()->nullable();
            $table->double('weekend')->unsigned()->nullable();
            $table->double('holiday')->unsigned()->nullable();
            $table->time('attendance_total')->nullable();
            $table->double('weekday_overtime')->unsigned()->nullable();
            $table->double('weekend_overtime')->unsigned()->nullable();
            $table->double('holiday_overtime')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
