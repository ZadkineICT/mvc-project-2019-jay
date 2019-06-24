@extends('layout.layout')

@section('content')

<h1 class="mt-5">Edit roomtypes</h1>

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
            <a class="nav-link " href="{{ route('roomtypes.index') }}">List</a>
        </li>
        @can('create rooms')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('roomtypes.create') }}">Add </a>
        </li>
        @endcan
        <li class="nav-item">
            <a class="nav-link active" href="">Edit </a>
        </li>
    </ul>
</nav>

@can('edit roomtypes')
<form method="POST" action="{{ route('roomtypes.update', $roomtype) }}">
    @csrf
    @method('PUT ')
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="name" value="{{ $roomtype->name }}">
    </div>
    <div class="form-group">
        <label>Price</label>
        <input type="text" name="price" class="form-control" value="{{ $roomtype->price }}">
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
</form>
@endcan
@endsection