@extends('layouts.master')
@section('content')

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Employee</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Employee</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <a href="#" class="btn add-btn ml-1" data-toggle="modal" data-target="#import_employee"><i class="fa fa-plus"></i> Import Employee</a>
                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee"><i class="fa fa-plus"></i> Add Employee</a>
                        <div class="view-icons">
                            <a href="{{ route('all/employee/card') }}" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
                            <a href="{{ route('all/employee/list') }}" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>
                        </div>
                    </div>
                </div>
            </div>
			<!-- /Page Header -->

            <!-- Search Filter -->
            <form action="{{ route('all/employee/list/search') }}" method="POST">
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
            </form>
            <!-- Search Filter -->
            {{-- message --}}
            {!! Toastr::message() !!}

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table datatable">
                            <thead>
                                <tr>
                                    <th>Employee No</th>
                                    <th>Employee Name</th>
                                    <th>Position</th>
                                    <th>Organization</th>
                                    <th class="text-nowrap">Join Date</th>
                                    <th>Employment Type</th> 
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th class="text-right no-sort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $items )
                                <tr>
                                    <td>{{ $items->rec_id }}</td>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="{{ url('employee/profile/'.$items->rec_id) }}" class="avatar"><img alt="" src="{{ URL::to('/assets/images/'. $items->avatar) }}"></a>
                                            <a href="{{ url('employee/profile/'.$items->rec_id) }}">{{ $items->name }}<span>{{ $items->position }}</span></a>
                                        </h2>
                                    </td>
                                    <td>{{ $items->positions }}</td>
                                    <td>{{ $items->organizations }}</td>
                                    <td>{{ $items->join_date }}</td>
                                    <td>{{ $items->employee_types }}</td>
                                    <td>{{ $items->email }}</td>
                                    <td>{{ $items->phone_number }}</td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{ url('all/employee/view/edit/'.$items->rec_id) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a class="dropdown-item" href="{{url('all/employee/delete/'.$items->rec_id)}}"onclick="return confirm('Are you sure to want to delete it?')"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
      
        <!-- Add Employee Modal -->
        <div id="add_employee" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Employee</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('all/employee/save') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Full Name</label>
                                        <input class="form-control" type="text" id="name" name="name" placeholder="Full Name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" id="email" name="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Phone</label>
                                        <input class="form-control" type="number" id="phone" name="phone" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="col-sm-6">  
                                    <div class="form-group">
                                        <label>Position</label>
                                        <select class="select form-control" style="width: 100%;" tabindex="-1" aria-hidden="true" id="position" name="position">
                                            <option value="">-- Select --</option>
                                            @foreach ($jobLevel as $key => $job_level )
                                                <option value="{{ $job_level->id }}">{{ $job_level->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">  
                                    <div class="form-group">
                                        <label class="col-form-label">Organization</label>
                                        <select class="select" style="width: 100%;" tabindex="-1" aria-hidden="true" id="organization" name="organization">
                                            <option value="">-- Select --</option>
                                            @foreach ($organization as $key => $org )
                                                <option value="{{ $org->id }}">{{ $org->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Join Date</label>
                                        <div class="cal-icon">
                                            <input class="form-control datetimepicker" type="text" id="joinDate" name="joinDate">
                                            <!-- <input class="form-control datetimepicker" type="text" id="joinDate" name="joinDate" onblur="age()"> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Employment Type</label>
                                        <select class="select" style="width: 100%;" tabindex="-1" aria-hidden="true" id="employeeType" name="employeeType">
                                            <option value="">-- Select --</option>
                                            @foreach ($employee_type as $key => $emp_type )
                                                <option value="{{ $emp_type->id }}">{{ $emp_type->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add Employee Modal -->
        <!-- Import Employee Modal -->
        <div id="import_employee" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Import Employee</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('all/employee/import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="col-form-label">File Template</label>
                                    </div>
                                </div>                                
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        : <a href="{{ URL::to('assets/file/employee.xlsx') }}" class="btn btn-success">download</a>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="col-form-label">File Upload</label>
                                    </div>
                                </div>                                
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        : <input type="file" name="file" required>
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Import Employee Modal -->
        
    </div>
    <!-- /Page Wrapper -->
    @section('script')
    <script>
        $("input:checkbox").on('click', function()
        {
            var $box = $(this);
            if ($box.is(":checked"))
            {
                var group = "input:checkbox[class='" + $box.attr("class") + "']";
                $(group).prop("checked", false);
                $box.prop("checked", true);
            }
            else
            {
                $box.prop("checked", false);
            }
        });
    </script>
    <script>
        // select auto id and email
        // $('#name').on('change',function()
        // {
        //     $('#employee_id').val($(this).find(':selected').data('employee_id'));
        //     $('#email').val($(this).find(':selected').data('email'));
        // });
        function age() {

            var birthDate = document.getElementById("birthDate").value;
            // console.log(birthDate);
            $('#birthDate').datetimepicker({
                    onSelect: function(value, ui) {
                        var today = new Date(),
                            dob = new Date(value),
                            age = new Date(today - dob).getFullYear() - 1970;
                        console.log(age)
                        $('#age').text(age);
                    },
                    maxDate: '+0d',
                    yearRange: '1920:2010',
                    changeMonth: true,
                    changeYear: true
            })

            // $age = \Carbon\Carbon::parse($birthDate)->diff(\Carbon\Carbon::now())->format('%y years, %m months and %d days');
            // console.log($age);

        }
    </script>
    @endsection
@endsection
