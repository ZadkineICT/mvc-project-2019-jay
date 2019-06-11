@extends('layout.layout')

@section('content')

    <h1 class="mt-5">Edit employee</h1>

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <nav class="nav">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link " href="{{ route('employees.index') }}">List</a>
            </li>
            @can('create employees')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('employees.create') }}">Add </a>
                </li>
            @endcan
            <li class="nav-item">
                <a class="nav-link active" href="">Edit </a>
            </li>
        </ul>
    </nav>

    @can('edit employees')
        <form method="POST" action="{{ route('employees.update', $employee) }}">
            @csrf
            @method('PUT ')
            <div class="form-group">
                <label>Date of birth</label>
                <input type="text" class="form-control" name="room_size" value="{{ $employee->date_of_birth }}">
            </div>
            <div class="form-group">
                <label>Position</label>
                <input type="text" class="form-control" name="room_size" value="{{ $employee->position }}">
            </div>
            <div class="form-group">
                <label>User id</label>
                <input type="text" name="hotel_id" class="form-control" value="{{ $employee->user_Id }}">
            </div>
            <div class="form-group">
                <label>Hotel id</label>
                <input type="text" name="hotel_id" class="form-control" value="{{ $employee->hotel_id }}">
            </div>
            {{-- <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div> --}}
            <button type="submit" class="btn btn-primary">Edit</button>
        </form>
    @endcan
@endsection