@extends('layout.layout')

@section('content')

<h1 class="mt-5">Add hotel</h1>

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
            <a class="nav-link " href="{{ route('hotels.index') }}">List</a>
        </li>
        @can('create hotels')
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('hotels.create') }}">Add </a>
        </li>
        @endcan
    </ul>
</nav>
@can('create hotels')
<form action="{{ route('hotels.index') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Hotel Name</label>
        <input type="text" class="form-control" name="name_hotel" value="">
    </div>
    <div class="form-group">
        <label>Zip Code</label>
        <input type="text" class="form-control" name="zip_code" value="">
    </div>
    <div class="form-group">
        <label>Address</label>
        <input type="text" name="address" class="form-control" value="">
    </div>
    <div class="form-group">
        <label>City</label>
        <input type="text" name="city" class="form-control" value="">
    </div>
    <div class="form-group">
        <label>Country</label>
        <input type="text" name="country" class="form-control" value="">
    </div>
    <div class="form-group">
        <label>Phone Number</label>
        <input type="text" name="phone_number" class="form-control" value="">
    </div>
    {{-- <div class="form-group">
        <label>Category</label>
        <select class="form-control" name="category_id">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div> --}}
    <button type="submit" class="btn btn-primary">Add</button>
</form>
@endcan
@endsection