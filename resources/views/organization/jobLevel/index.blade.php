@extends('layouts.main')

@section('title', 'Job Level')
@section('content')

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Job Level</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Job Level</li>
                        </ul>
                    </div>
                    <div class="col-auto float-right ml-auto">
                        <!-- <a href="#" class="btn add-btn ml-1" data-toggle="modal" data-target="#import_employee"><i class="fa fa-plus"></i> Import Employee</a> -->
                        <a href="#" class="btn add-btn"><i class="fa fa-plus"></i> Add</a>
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
                                    <th>Job Level Code</th>
                                    <th>Job Level Name</th>
                                    <th>Job Class</th>
                                    <th>Is Actiove</th>
                                    <!-- <th>Fax</th> -->
                                    <!-- <th>Email</th> -->
                                    <!-- <th>Tax Number</th> -->
                                    <th class="text-right no-sort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $dat)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $dat->code }}</td>
                                        <td>{{ $dat->name }}</td>
                                        <td>{{ $dat->job_class }}</td>
                                        <td>{{ $dat->status }}</td>
                                        <!-- <td>{{ $dat->code }}</td> -->
                                        <!-- <td>{{ $dat->code }}</td> -->
                                        <!-- <td>{{ $dat->code }}</td> -->
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

	

@endsection