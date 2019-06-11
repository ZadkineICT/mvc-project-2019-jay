@extends('layout.layout')

@section('content')

    <h1 class="mt-5">Employee details</h1>

    <nav class="nav">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('employees.index') }}">List</a>
            </li>
            @can('edit employees')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('employees.create') }}">Add </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="">Details </a>
                </li>
            @endcan
        </ul>
    </nav>

    <div class="card" style="width: 100%;">
        <div class="card-header">
            Employee Details
        </div>
        <ul class="list-group list-group-flush" style="list-style-type: none">
            <li class="list-group-item">
                Id
                <br>
                {{ $employee->id }}
            </li>
            <li class="list-group-item">
                Date of birth
                <br>
                {{ $employee->date_of_birth }}
            </li>
            <li class="list-group-item">
                Position
                <br>
                {{ $employee->position }}
            </li>
            <li class="list-group-item">
                User ID
                <br>
                {{ $employee->user_id }}
            </li>
            <li class="list-group-item">
                Hotel ID
                <br>
                {{ $employee->hotel_id }}
            </li>
        </ul>
    </div>
@endsection