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

        <a href="{{ route('companies.create')  }}"><button type="button" class="btn btn-primary">New Company</button></a>

        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>Company Name</td>
                <td>Contact Email</td>
                <td>Logo</td>
                <td colspan="2">Website</td>
            </tr>
            </thead>
            <tbody>
            @foreach($companies as $company)
                <tr>
                    <td>{{$company->id}}</td>
                    <td>{{$company->name}}</td>
                    <td>{{$company->email}}</td>
                    <td>{{$company->logo}}</td>
                    <td><a href="{{ $company->website }}">{{$company->website}}</a></td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                More Actions
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Add Employee</a>
                                <a class="dropdown-item" href="{{ route('companies.edit',$company->id)}}">Edit</a>
                                <a class="dropdown-item" href="#">
                                    <form action="{{ route('companies.destroy', $company->id)}}" method="post">
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