<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payroll;
use Illuminate\Http\Request;
use App\Imports\PayrollImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\Datatables;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Payroll'
        ];

        if (request()->ajax()) {
            $payrolls = Payroll::orderBy('id', 'desc');
            return Datatables::of($payrolls)
                ->addColumn('employee_id', function ($row){
                    return $row->employee_id;
                })
                ->addColumn('nik', function ($row){
                    return $row->nik;
                })
                ->addColumn('employee_name', function ($row){
                    return $row->employee_name;
                })
                ->addColumn('date', function ($row){
                    return date('d F Y', strtotime($row->date));
                })
                ->addColumn('working_hours', function ($row){
                    return $row->working_hours;
                })
                ->rawColumns(['employee_id', 'nik', 'employee_name', 'date', 'working_hours'])
                ->make(true);
        }

        return view('admin.payroll.payroll', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function payroll_import()
    {
        $data = [
            'title' => 'Payroll Import'
        ];

        return view('admin.payroll.payroll_import', $data);
    }

    public function payroll_import_show(Request $request)
    {
        if (request()->ajax()) {
            $file = '';
            if ($request->hasFile('import_excel')) {
                $file = $request->file('import_excel');
                if (!empty($file)) {
                    $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$file->getClientOriginalName());
                    // $file->move('payroll_import',$filename);
                    $file->storeAs('public/payroll_import', $filename);

                }
            }

            // import data before insert to database
            $array = (new PayrollImport)->toArray(public_path('/storage/payroll_import/'.$filename));
            $data  = ['excels' => $array[0]];

            $html = view('admin.partials.payroll_import_view', $data)->render();
            return response()->json([
                'html' => $html,
            ]);
        }
    }

    public function payroll_import_process(Request $request)
    {
        $this->validate($request, [
            'date'          => 'required',
            'working_hours' => 'required',
            'time_in'       => 'required',
            'time_out'      => 'required'
        ]);

        $datas = [];
        foreach ($request->employee_id as $key => $value) {
            $datas[] = [
                'employee_id'         => $value,
                'no_id'               => $request->no_id[$key],
                'nik'                 => $request->nik[$key],
                'employee_name'       => $request->employee_name[$key],
                'auto_assign'         => $request->auto_assign[$key],
                'date'                => $request->date[$key],
                'working_hours'       => $request->working_hours[$key],
                'time_in'             => $request->time_in[$key],
                'time_out'            => $request->time_out[$key],
                'scanned_in'          => $request->scanned_in[$key],
                'scanned_out'         => $request->scanned_out[$key],
                'normal'              => !empty($request->normal[$key]) ? str_replace(',', '.', $request->normal[$key]) : 0,
                'riil'                => !empty($request->riil[$key]) ? str_replace(',', '.', $request->riil[$key]) : 0,
                'time_in_late'        => $request->time_in_late[$key],
                'time_out_early'      => $request->time_out_early[$key],
                'absent'              => $request->absent[$key],
                'overtime'            => $request->overtime[$key],
                'working_hours_total' => $request->working_hours_total[$key],
                'exception'           => $request->exception[$key],
                'mandatory_check_in'  => $request->mandatory_check_in[$key],
                'mandatory_check_out' => $request->mandatory_check_out[$key],
                'department'          => $request->department[$key],
                'weekday'             => !empty($request->weekday[$key]) ? str_replace(',', '.', $request->weekday[$key]) : 0,
                'weekend'             => !empty($request->weekend[$key]) ?  str_replace(',', '.', $request->weekend[$key]) : 0,
                'holiday'             => !empty($request->holiday[$key]) ? str_replace(',', '.', $request->holiday[$key]) : 0,
                'attendance_total'    => $request->attendance_total[$key],
                'weekday_overtime'    => !empty($request->weekday_overtime[$key]) ? str_replace(',', '.', $request->weekday_overtime[$key]) : 0,
                'weekend_overtime'    => !empty($request->weekend_overtime[$key]) ? str_replace(',', '.', $request->weekend_overtime[$key]) : 0,
                'holiday_overtime'    => !empty($request->holiday_overtime[$key]) ? str_replace(',', '.', $request->holiday_overtime[$key]) : 0,
            ];
        }

        // dd($datas);

        try {
            Payroll::insert($datas);
        } catch (Exception $e) {
            dd($e);
        }
        return redirect()->route('admin.payroll')->with(['success' => sprintf('Import Excel Berhasil Disimpan.')]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Payroll $payroll)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payroll $payroll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payroll $payroll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payroll $payroll)
    {
        //
    }
}
