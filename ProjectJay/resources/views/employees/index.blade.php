@extends('layout.layout')

@section('content')

    <h1 class="mt-5">Employees</h1>

    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <nav class="nav">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('employees.index') }}">List</a>
            </li>
            @can('edit employees')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('employees.create') }}">Add </a>
            </li>
            @endcan
        </ul>
    </nav>

    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Date of birth</th>
            <th scope="col">Position</th>
            <th scope="col">User</th>
            <th scope="col">Hotel</th>

            {{-- @hasrole('admin') --}}
            <th scope="col lighter">Details</th>
            @can('edit employees')
            <th scope="col lighter">Edit</th>
            @endcan
            @can('delete employees')
            <th scope="col lighter">Delete</th>
            @endcan
        </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)
            <tr>
                <td scope="row">{{ $employee->id }}</td>
                <td>{{ $employee->date_of_birth}}</td>
                <td>{{ $employee->position }}</td>
                <td>{{ $employee->user_id}}</td>
                <td>{{ $employee->hotel_id }}</td>


                <td><a href="{{ route('employees.show', $employee) }}">Details</a></td>
                @can('edit employees')
                <td><a href="{{ route('employees.edit', $employee) }}">Edit</a></td>
                @endcan
                @can('delete employees')
                <td><a href="{{ route('employees.delete', $employee) }}">Delete</a></td>
                @endcan
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection