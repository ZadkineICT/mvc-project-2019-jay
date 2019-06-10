@extends('layout.layout')

@section('content')

<h1 class="mt-5">Edit room</h1>

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
            <a class="nav-link" href="{{ route('rooms.create') }}">Add </a>
        </li>
        @endcan
        <li class="nav-item">
            <a class="nav-link active" href="">Edit </a>
        </li>
    </ul>
</nav>

@can('edit rooms')
<form method="POST" action="{{ route('rooms.update', $room) }}">
    @csrf
    @method('PUT ')
    <div class="form-group">
        <label>Room Size</label>
        <input type="text" class="form-control" name="room_size" value="{{ $room->room_size }}">
    </div>
    <div class="form-group">
        <label>Hotel id</label>
        <input type="text" name="hotel_id" class="form-control" value="{{ $room->hotel_id }}">
    </div>
    <div class="form-group">
        <label>Roomtype</label>
        <input type="text" name="roomtype_id" class="form-control" value="{{ $room->roomtype_id }}">
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