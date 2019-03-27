@extends('layouts.layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
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
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card uper">
                    <div class="card-header">
                        Add Employee
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
                        <form method="post" action="{{ route('employees.store', ['company' => $company]) }}">

                            <input type="hidden" class="form-control" name="company_id" value="{{ $company }}"/>

                            <div class="form-group">
                                @csrf
                                <label for="name">First Name:</label>
                                <input type="text" class="form-control" name="first_name"/>
                            </div>
                            <div class="form-group">
                                <label for="name">Last Name:</label>
                                <input type="text" class="form-control" name="last_name"/>
                            </div>
                            <div class="form-group">
                                <label for="price">Email:</label>
                                <input type="email" class="form-control" name="email"/>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Phone:</label>
                                <input type="text" class="form-control" name="phone"/>
                            </div>
                            <button type="submit" class="btn btn-primary">Create Book</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
@endsection