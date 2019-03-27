@extends('layouts.layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <a class="uper">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif

        <a href="{{ route('employees.create', ['company' => $company])  }}"><button type="button" class="btn btn-primary">Add Employee</button></a>
        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>Company Name</td>
                <td>Contact Email</td>
                <td>Phone</td>
                <td></td>
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
        <div>
@endsection
