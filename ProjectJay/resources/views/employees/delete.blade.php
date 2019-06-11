@extends('layout.layout')

@section('content')

    <h1 class="mt-5">Delete Employee</h1>

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @can('edit employee', 'delete employees')
        <form action="{{ route('employees.destroy', $employee) }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="form-group">
                <label>Employee ID</label>
                <input type="text" class="form-control" name="id" value="{{ $employee->id }}">
            </div>
            <div class="form-group">
                <label>Date of birth</label>
                <input type="text" class="form-control" name="date_of_birth" value="{{ $employee->date_of_birth }}">
            </div>
            <div class="form-group">
                <label>Position</label>
                <input type="text" class="form-control" name="position" value="{{ $employee->position }}">
            </div>
            <div class="form-group">
                <label>User id</label>
                <input type="text" name="user_id" class="form-control" value="{{ $employee->user_id }}">
            </div>
            <div class="form-group">
                <label>Hotel id</label>
                <input type="text" name="hotel_id" class="form-control" value="{{ $employee->hotel_id }}">
            </div>
            <button type="submit" class="btn btn-danger">DELETE</button>
        </form>
    @endcan
@endsection