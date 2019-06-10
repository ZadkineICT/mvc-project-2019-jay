@extends('layout.layout')

@section('content')

<h1 class="mt-5">Add room</h1>

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
            <a class="nav-link " href="{{ route('rooms.index') }}">List</a>
        </li>
        @can('create rooms')
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('rooms.create') }}">Add </a>
        </li>
        @endcan
    </ul>
</nav>
@can('create rooms')
<form action="{{ route('rooms.index') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Room Size</label>
        <input type="text" class="form-control" name="room_size" value="">
    </div>
    <div class="form-group">
        <label>Hotel ID</label>
        <input type="text" class="form-control" name="hotel_id" value="">
    </div>
    <div class="form-group">
        <label>Roomtype</label>
        <input type="text" class="form-control" name="roomtype_id" value="">
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