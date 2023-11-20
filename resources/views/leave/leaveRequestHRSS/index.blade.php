@extends('layouts.main')

@section('title', 'Leave Request HRSS')
@section('content')

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Leave Request HRSS</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Leave Request HRSS</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn ml-1" data-toggle="modal" data-target="#add_modal"><i class="fa fa-plus"></i> Add</a>
                    </div>
                </div>
            </div>
			<!-- /Page Header -->

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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!--Add Leave Type Setting Modal -->
    <div id="add_modal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Employee Leave Request ESS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <hr>
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <input type="hidden" name="request_no" value="{{ $leaveNo }}">
                            <label class="col-sm-4 col-form-label">Request No</label>
                            <label class="col-sm-8 col-form-label">{{ $leaveNo }}</label>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="request_date" value="{{ $date }}">
                            <label class="col-sm-4 col-form-label">Request Date</label>
                            <label class="col-sm-8 col-form-label">{{ $date }}</label>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="employee_no" value="{{ auth::user()->rec_id }}">
                            <label class="col-sm-4 col-form-label">Employee No</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" value="{{ auth::user()->rec_id }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="hidden" name="employee_name" value="{{ auth::user()->name }}">
                            <label class="col-sm-4 col-form-label">Employee Name</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" value="{{ auth::user()->rec_id }} - {{ auth::user()->name }}" readonly>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="view_employee">
                                    <label class="form-check-label" for="view_employee">
                                    View Employee Information
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div id="position" style="display: none;">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Position</label>
                                <label class="col-sm-8 col-form-label">{{ $employee->positions }}</label>
                            </div>
                        </div>
                        <div id="organization" style="display: none;">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Organization</label>
                                <label class="col-sm-8 col-form-label">{{ $employee->organizations }}</label>
                            </div>
                        </div>
                        <div id="employment_type" style="display: none;">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Employment Type</label>
                                <label class="col-sm-8 col-form-label">{{ $employee->employee_types }}</label>
                            </div>
                        </div>
                        <div id="join_date" style="display: none;">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Join Date</label>
                                <label class="col-sm-8 col-form-label">{{ date('d M Y', strtotime(auth::user()->join_date)) }}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Leave Type</label>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <select class="form-control" name="leave_type" id="leave_type">
                                        <option value="" selected disabled>-- Select --</option>
                                        @foreach($leave_type as $leave)
                                            <option value="{{ $leave->id }}">{{ $leave->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Leave Date</label>
                            <label class="col-sm-8 col-form-label">{{ date('d M Y', strtotime(auth::user()->join_date)) }}</label>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Total Days</label>
                            <label class="col-sm-8 col-form-label"></label>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Remark</label>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <textarea class="form-control" name="remark"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Attachment</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input class="form-control" type="file" name="attachment">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Address During Leave</label>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <textarea class="form-control" name="address_during"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"></label>
                            <label class="col-sm-4 col-form-label">Phone/HP No</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input class="form-control" type="number" name="phone">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Delegation</label>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <input class="form-control" type="number" name="phone">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="submit-section">
                            <button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Leave Type Setting Modal -->

    <script type="text/javascript">
        
        var checkbox1 = document.getElementById('view_employee');
        var delivery_div1 = document.getElementById('position');
        var delivery_div2 = document.getElementById('organization');
        var delivery_div3 = document.getElementById('employment_type');
        var delivery_div4 = document.getElementById('join_date');
        checkbox1.onclick = function() {
           if(this.checked) {
             delivery_div1.style['display'] = 'block';
             delivery_div2.style['display'] = 'block';
             delivery_div3.style['display'] = 'block';
             delivery_div4.style['display'] = 'block';
           } else {
             delivery_div1.style['display'] = 'none';
             delivery_div2.style['display'] = 'none';
             delivery_div3.style['display'] = 'none';
             delivery_div4.style['display'] = 'none';
           }
        };

    </script>	

@endsection