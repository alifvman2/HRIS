@extends('layouts.main')

@section('title', 'Leave Type Setting')
@section('content')

    <style type="text/css">
        .form-control{
            border-color: #e3e3e3;
            box-shadow: none;
            font-size: 15px;
            height: 36px;
        }
    </style>

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Leave Type Setting</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Leave Type Setting</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn ml-1" data-toggle="modal" data-target="#add_modal"><i class="fa fa-plus"></i> Add</a>
                        <!-- <a href="#" class="btn add-btn"><i class="fa fa-plus"></i> Add</a> -->
                        <!-- <div class="view-icons">
                            <a href="{{ route('all/employee/card') }}" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
                            <a href="{{ route('all/employee/list') }}" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>
                        </div> -->
                    </div>
                </div>
            </div>

			<!-- /Page Header -->

            <!-- Search Filter -->
           <!--  <form action="" method="POST">
                @csrf
                <div class="row filter-row">
                    <div class="col-sm-6 col-md-3">  
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating" name="employee_id">
                            <label class="focus-label">Employee ID</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">  
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating">
                            <label class="focus-label">Employee Name</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3"> 
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating">
                            <label class="focus-label">Position</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">  
                        <button type="sumit" class="btn btn-success btn-block"> Search </button>  
                    </div>
                </div>
            </form> -->
            <!-- Search Filter -->
            {{-- message --}}
            {!! Toastr::message() !!}

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Leave Code</th>
                                    <th>Leave Name</th>
                                    <th>Initial Balance</th>
                                    <th>Deductive Leave</th>
                                    <th>Allowed Half Day</th>
                                    <th>Advanced Leave Allowed</th>
                                    <th class="text-right no-sort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($data as $key => $dat)
                            		<tr>
                            			<td>{{ $loop->iteration }}</td>
                                        <td>{{ $dat->code }}</td>
                                        <td>{{ $dat->name }}</td>
                                        <td>{{ $dat->initial_balance }}</td>
                                        <td>{{ $dat->deducted_leave }}</td>
                                        <td>{{ $dat->allowed_half_day }}</td>
                            			<td>{{ $dat->advance_leave_allowed }}</td>
                            			<td></td>
                            		</tr>
                            	@endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- end page content -->

        <!--Add Leave Type Setting Modal -->
        <div id="add_modal" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Leave Type Setting</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('Leave.store_leaveTypeSetting') }}" method="POST">
                            <p>General</p>
                            <hr>
                            @csrf
                            <div class="form-group row">
                                <label for="leave_code" class="col-sm-4 col-form-label">Leave Code</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="leave_code" name="leave_code">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="leave_name" class="col-sm-4 col-form-label">Leave Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="leave_name" name="leave_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="initial_balance" class="col-sm-4 col-form-label">Initial Balance</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="number" id="initial_balance" name="initial_balance">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="deducted_leave" class="col-sm-4 col-form-label">Deducted Leave</label>
                                <div class="col-sm-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Yes" name="deducted_leave" id="deducted_leave">
                                        <label class="form-check-label" for="deducted_leave">
                                        Yes
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="day_count" class="col-sm-4 col-form-label">Day Count</label>
                                <div class="col-sm-8">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="day_count" id="day_count1" value="Work Day">
                                        <label class="form-check-label" for="day_count1">Work Day</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="day_count" id="day_count2" value="Calendar Day">
                                        <label class="form-check-label" for="day_count2">Calendar Day</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="allowed_half_day" class="col-sm-4 col-form-label">Allowed Half Day</label>
                                <div class="col-sm-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" name="allowed_half_day" id="allowed_half_day">
                                        <label class="form-check-label" for="allowed_half_day">
                                        Yes
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <p>Availability</p>
                            <hr>
                            <div class="form-group row">
                                <label for="once_in_employment_period" class="col-sm-4 col-form-label">Once In Employment Period</label>
                                <div class="col-sm-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Yes" name="once_in_employment_period" id="once_in_employment_period">
                                        <label class="form-check-label" for="once_in_employment_period">
                                        Yes
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="repeat_interval" class="col-sm-4 col-form-label">Repeat Interval</label>
                                <div class="col-sm-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Yes" name="repeat_interval" id="repeat_interval">
                                        <label class="form-check-label" for="repeat_interval">
                                        Yes
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="leave_period_based_on" class="col-sm-4 col-form-label">Leave Period Based On</label>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <select class="form-control" name="leave_period_based_on" id="leave_period_based_on">
                                            <option value="Join Date">Join Date</option>
                                            <option value="Spesific Date">Spesific Date</option>
                                            <option value="Permanent">Permanent</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="eligible_after" class="col-sm-4 col-form-label">Eligible After</label>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-6">
                                            <input class="form-control" type="number" id="eligible_after" name="eligible_after">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-group-label" for="eligible_after">Month(s) After Join Date <label class="text-danger">*</label></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="use_max_join_date_for_entitlement_leave" class="col-sm-4 col-form-label">Use Max Join Date For Entitlement Leave</label>
                                <div class="col-sm-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Yes" name="use_max_join_date_for_entitlement_leave" id="use_max_join_date_for_entitlement_leave">
                                        <label class="form-check-label" for="use_max_join_date_for_entitlement_leave">
                                        Yes
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="generate_method" class="col-sm-4 col-form-label">Generate Method</label>
                                <div class="col-sm-8">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="generate_method" id="generate_method1" value="Full">
                                        <label class="form-check-label" for="generate_method1">Full</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="generate_method" id="generate_method2" value="Increment">
                                        <label class="form-check-label" for="generate_method2">Increment</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="generate_at" class="col-sm-4 col-form-label">Generate At</label>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <select class="form-control" name="generate_at" id="generate_at">
                                            <option value="End Of Month">End Of Month</option>
                                            <option value="Spesific Date">Spesific Date</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="leave_valid_until" class="col-sm-4 col-form-label">Leave Valid Until</label>
                                <div class="col-sm-8">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="leave_valid_until" id="leave_valid_until1" value="Month">
                                        <label class="form-check-label" for="leave_valid_until1">Month</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="leave_valid_until" id="leave_valid_until1" value="Remaining Leave">
                                        <label class="form-check-label" for="leave_valid_until1">Remaining Leave</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="leave_valid_until" id="leave_valid_until3" value="Spesific Date">
                                        <label class="form-check-label" for="leave_valid_until3">Spesific Date</label>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <input class="form-control" type="number" id="leave_valid_month" name="leave_valid_month">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-group-label" for="leave_valid_month">Month(s) <label class="text-danger">*</label></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <p>Validation</p>
                            <hr>
                            <div class="form-group row">
                                <label for="avoid_sequential_day_with_Another_leave" class="col-sm-4 col-form-label">Avoid Sequential Day With Another Leave</label>
                                <div class="col-sm-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Yes" name="avoid_sequential_day_with_Another_leave" id="avoid_sequential_day_with_Another_leave">
                                        <label class="form-check-label" for="avoid_sequential_day_with_Another_leave">
                                        Yes
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="avoid_taken_in_row" class="col-sm-4 col-form-label">Avoid Taken In Row</label>
                                <div class="col-sm-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Yes" name="avoid_taken_in_row" id="avoid_taken_in_row">
                                        <label class="form-check-label" for="avoid_taken_in_row">
                                        Yes
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="maximum_taken" class="col-sm-4 col-form-label">Maximum Taken</label>
                                <div class="col-sm-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Yes" name="maximum_taken" id="maximum_taken">
                                        <label class="form-check-label" for="maximum_taken">
                                        Yes
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mandatory_attachment" class="col-sm-4 col-form-label">Mandatory Attachment</label>
                                <div class="col-sm-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Yes" name="mandatory_attachment" id="mandatory_attachment">
                                        <label class="form-check-label" for="mandatory_attachment">
                                        Yes
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <p>Other</p>
                            <hr>
                            <div class="form-group row">
                                <label for="if_expired" class="col-sm-4 col-form-label">If Expired</label>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <select class="form-control" name="if_expired" id="if_expired">
                                            <option value="Expired">Expired</option>
                                            <option value="Carry Forward">Carry Forward</option>
                                            <option value="Cash Out">Cash Out</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="advance_leave_allowed" class="col-sm-4 col-form-label">Advance Leave Allowed</label>
                                <div class="col-sm-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="Yes" name="advance_leave_allowed" id="advance_leave_allowed">
                                        <label class="form-check-label" for="advance_leave_allowed">
                                        Yes
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="attendance_status" class="col-sm-4 col-form-label">Attendance Status</label>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <select class="form-control" name="attendance_status" id="attendance_status">
                                            <option value="Absent">Absent</option>
                                            <option value="Business Trip">Business Trip</option>
                                            <option value="Exess Break">Exess Break</option>
                                            <option value="Early Leave">Early Leave</option>
                                            <option value="Half Permit">Half Permit</option>
                                            <option value="Partially Training">Partially Training</option>
                                            <option value="Late In">Late In</option>
                                            <option value="Late In & Early Leave">Late In & Early Leave</option>
                                            <option value="Leave">Leave</option>
                                            <option value="On Duty">On Duty</option>
                                            <option value="Off">Off</option>
                                            <option value="Overtime">Overtime</option>
                                            <option value="Permit">Permit</option>
                                            <option value="Present">Present</option>
                                            <option value="Present Off">Present Off</option>
                                            <option value="Sick With Letter">Sick With Letter</option>
                                            <option value="Sick With No Letter">Sick With No Letter</option>
                                            <option value="Training">Training</option>
                                            <option value="Unpaid Leave">Unpaid Leave</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="day_limit_submit_request" class="col-sm-4 col-form-label">Day Limit Submit Request</label>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-6">
                                            <input class="form-control" type="number" id="day_limit_submit_request" name="day_limit_submit_request">
                                        </div>
                                        <div class="col-6">
                                            <label class="form-group-label" for="day_limit_submit_request">Day(s) Before</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="other_attendances_status" class="col-sm-4 col-form-label">Other Attendance Status</label>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <select class="form-control" name="other_attendances_status" id="other_attendances_status">
                                                    <option disabled selected>-- Select --</option>
                                                    <option value="Absent">Absent</option>
                                                    <option value="Business Trip">Business Trip</option>
                                                    <option value="Exess Break">Exess Break</option>
                                                    <option value="Early Leave">Early Leave</option>
                                                    <option value="Half Permit">Half Permit</option>
                                                    <option value="Partially Training">Partially Training</option>
                                                    <option value="Late In">Late In</option>
                                                    <option value="Late In & Early Leave">Late In & Early Leave</option>
                                                    <option value="Leave">Leave</option>
                                                    <option value="On Duty">On Duty</option>
                                                    <option value="Off">Off</option>
                                                    <option value="Overtime">Overtime</option>
                                                    <option value="Permit">Permit</option>
                                                    <option value="Present">Present</option>
                                                    <option value="Present Off">Present Off</option>
                                                    <option value="Sick With Letter">Sick With Letter</option>
                                                    <option value="Sick With No Letter">Sick With No Letter</option>
                                                    <option value="Training">Training</option>
                                                    <option value="Unpaid Leave">Unpaid Leave</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label class="form-group-label font-italic" for="other_attendances_status">*Will Be Used If Request Does Not Fit Day Limit Setting</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Leave Type Setting Modal -->

    </div>

	

@endsection