<?php

namespace App\Http\Controllers\LeaveAdministration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\LeaveTypeSetting;
use DB;
use App\Models\User;
use Auth;
use Brian2694\Toastr\Facades\Toastr;

class LeaveTypeSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = LeaveTypeSetting::whereNull('deleted_by')->get();

        Session::put('MENU', 'leaveTypeSetting');
        return view('leave.leaveTypeSetting.index',compact('data'));

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

        $request->validate([
            'leave_code'        => 'required|string|max:255',
            'leave_name'        => 'required|string|max:255',
            'day_count'         => 'required',
        ]);

        DB::beginTransaction();
        try{

            $cek = LeaveTypeSetting::where('code', $request->leave_code)->whereNull('deleted_by')->first();
            if (!$cek) {

                $leave = new LeaveTypeSetting;
                $leave->code                                    = $request->leave_code;
                $leave->name                                    = $request->leave_name;
                $leave->initial_balance                         = $request->initial_balance;
                $leave->deducted_leave                          = $request->deducted_leave;
                $leave->day_count                               = $request->day_count;
                $leave->allowed_half_day                        = $request->allowed_half_day;
                $leave->once_in_employment_period               = $request->once_in_employment_period;
                $leave->repeat_interval                         = $request->repeat_interval;
                $leave->repeat_interval_month                   = $request->repeat_month;
                $leave->leave_period_based_on                   = $request->leave_period_based_on;
                $leave->leave_period_based_on_spesific_date     = $request->spesific_date;
                $leave->proportional_after                      = $request->proportional_after;
                $leave->eligible_after                          = $request->eligible_after;
                $leave->use_max_join_date_for_entitlement_leave = $request->use_max_join_date_for_entitlement_leave;
                $leave->maximum_join_date                       = $request->maximum_join_date;
                $leave->generate_method                         = $request->generate_method;
                $leave->increment_every                         = $request->increment_every;
                $leave->increment_month                         = $request->increment_month;
                $leave->generate_at                             = $request->generate_at;
                $leave->generate_at_spesific_date               = $request->spesific_date_generate_at;
                $leave->leave_valid_until                       = $request->leave_valid_until;
                $leave->leave_valid_month                       = $request->leave_valid_month;
                $leave->leave_valid_remain                      = $request->leave_valid_remain;
                $leave->leave_valid_spesific_date               = $request->leave_valid_spesific_date;
                $leave->avoid_sequential_day_with_another_leave = $request->avoid_sequential_day_with_another_leave;
                $leave->avoid_taken_in_row                      = $request->avoid_taken_in_row;
                $leave->avoid_taken_in_row_days                 = $request->avoid_taken_in_row_days;
                $leave->avoid_taken_in_row_ignore               = $request->avoid_taken_in_row_ignore;
                $leave->maximum_taken                           = $request->maximum_taken;
                $leave->maximum_taken_day                       = $request->maximum_taken_day;
                $leave->maximum_taken_select                    = $request->maximum_taken_select;
                $leave->based_on_same_period_month              = $request->based_on_same_period_month;
                $leave->mandatory_attachment                    = $request->mandatory_attachment;
                $leave->if_expired                              = $request->if_expired;
                $leave->carry_forward_method                    = $request->carry_forward_method;
                $leave->carry_forward_method_days_maximum       = $request->carry_forward_method_days_maximum;
                $leave->cash_out_method                         = $request->cash_out_method;
                $leave->cash_out_method_days_maximum            = $request->cash_out_method_days_maximum;
                $leave->advance_leave_allowed                   = $request->advance_leave_allowed;
                $leave->max_advance_leave                       = $request->max_advance_leave;
                $leave->attendance_status                       = $request->attendance_status;
                $leave->day_limit_submit_request                = $request->day_limit_submit_request;
                $leave->other_attendances_status                = $request->other_attendances_status;
                $leave->created_by                              = auth::user()->id;
                $leave->save();
                
                DB::commit();
                Toastr::success('Add new Leave successfully :)','Success');
                return redirect()->back();

            }else{
                DB::rollback();
                Toastr::error('Leave Code Already exits :)','Error');
                return redirect()->back();
                // return "else";
            }
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Add new Leave Type Setting fail :)','Error');
            return redirect()->back();
        }

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
