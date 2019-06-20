@extends('layout.layout')

@section('content')

<h1 class="mt-5">Delete hotel</h1>

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
            <a class="nav-link" href="{{ route('rooms.index') }}">List</a>
        </li>
        @can('delete rooms')
        <li class="nav-item">
            <a class="nav-link active" href="#">Delete </a>
        </li>
        @endcan
    </ul>
</nav>

@can('edit hotels', 'delete hotels')
<form action="{{ route('hotels.destroy', $hotel) }}" method="POST">
    @csrf
    @method('DELETE')
    <div class="form-group">
        <label>Hotel Name</label>
        <input type="text" readonly class="form-control" name="name_hotel" value="{{ $hotel->name_hotel }}">
    </div>
    <div class="form-group">
        <label>Zip Code</label>
        <input type="text" readonly class="form-control" name="zip_code" value="{{ $hotel->zip_code }}">
    </div>
    <div class="form-group">
        <label>Address</label>
        <input type="text" readonly name="address" class="form-control" value="{{ $hotel->address }}">
    </div>
    <div class="form-group">
        <label>City</label>
        <input type="text" readonly name="city" class="form-control" value="{{ $hotel->city }}">
    </div>
    <div class="form-group">
        <label>Country</label>
        <input type="text" readonly name="country" class="form-control" value="{{ $hotel->country }}">
    </div>
    <div class="form-group">
        <label>Phone Number</label>
        <input type="text" readonly name="phone_number" class="form-control" value="{{ $hotel->phone_number }}">
    </div>
    <button type="submit" class="btn btn-danger">DELETE</button>
</form>
@endcan
@endsection