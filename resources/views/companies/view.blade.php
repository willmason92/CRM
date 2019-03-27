@extends('layouts.layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            <h2><b>Company:</b> {{ $company->name }}</h2>
        </div>
        <div>
            <a href="{{ route('employees.create', ['company' => $company]) }}"><button class="btn-primary">Add Employee</button></a>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif

        </div>
    </div>

    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="{{ asset('storage/placeholder.png') }}" alt="Company Logo">

                        <h3 class="profile-username text-center">{{ $company->getName() }}</h3>

                        <p class="text-muted text-center">Business Sector</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Employees</b> <a class="pull-right">{{ $employeeCount }}</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Company Info</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i> Contact</strong>

                        <p class="text-muted">
                            {{ $company->getEmail() }}
                        </p>

                        <hr>
                        <strong><i class="fa fa-book margin-r-5"></i> Website</strong>

                        <p class="text-muted">
                            <a href="{{ $company->getWebsite() }}">{{ $company->getWebsite() }}</a>
                        </p>

                        <hr>

                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                        <p></p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <td>ID</td>
                        <td>Company Name</td>
                        <td>Contact Email</td>
                        <td>Phone</td>
                        <td></td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{ $employee->id}}</td>
                            <td>{{ $employee->getFullName() }}</td>
                            <td>{{ $employee->getEmail()}}</td>
                            <td>{{ $employee->getPhone() }}</td>
                            <td><a href="{{ route('employees.show', ['company' => $company, 'employee' => $employee->id]) }}"><button type="button" class="btn btn-primary">View</button></a></td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        More Actions
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Add Employee</a>
                                        <a class="dropdown-item" href="{{ route('companies.edit',$employee->id)}}">Edit</a>
                                        <a class="dropdown-item" href="#">
                                            <form action="{{ route('companies.destroy', $employee->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form></a>
                                    </div>
                                </div>
                            </td>
                            <td>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
@endsection