<?php

namespace App\Http\Controllers\LeaveAdministration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
use App\Models\User;
use Auth;
use App\Models\LeaveTypeSetting;
use App\Models\Employee;
use Carbon\Carbon;

class LeaveRequestHRSSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $year = Carbon::now()->format('Y');
        $month = Carbon::now()->format('m');
        $date = Carbon::now()->format('d M Y');

        $leaveNo = "LEVRQ".$year.$month."XXXX";

        $employee = Employee::select('employees.employee_id', 'position.name as positions', 'organization_structure.name as organizations', 'employee_type.name as employee_types')
            ->where('employees.employee_id', auth::user()->rec_id)
            ->whereNull('employees.deleted_at')
            ->Join('position', function ($join) {
                $join->on('employees.position', '=', 'position.id')
                    ->whereNull('position.deleted_at');
            })
            ->Join('organization_structure', function ($join) {
                $join->on('employees.organization', '=', 'organization_structure.id')
                    ->whereNull('organization_structure.deleted_at');
            })
            ->Join('employee_type', function ($join) {
                $join->on('employees.employee_type', '=', 'employee_type.id')
                    ->whereNull('employee_type.deleted_at');
            })
            ->first();

        $leave_type = LeaveTypeSetting::get();

        Session::put('MENU', 'leaveRequestHRSS');
        return view('leave.leaveRequestHRSS.index',compact('leaveNo', 'date', 'employee', 'leave_type'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
