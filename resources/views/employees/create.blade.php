@extends('layouts.layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Add Employee
            <br>
            {{ $company->name }}
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
            <form method="post" action="{{ route('employees.store', ['company' => $id]) }}">

                <input type="hidden" class="form-control" name="company_id" value="{{ $id }}"/>

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
@endsection