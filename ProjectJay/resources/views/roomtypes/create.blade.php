@extends('layout.layout')

@section('content')

<h1 class="mt-5">Add roomtype</h1>

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
        @can('create roomtypes')
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('roomtypes.create') }}">Add </a>
        </li>
        @endcan
    </ul>
</nav>
@can('create roomtypes')
<form action="{{ route('roomtypes.index') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="name" value="">
    </div>
    <div class="form-group">
        <label>Price</label>
        <input type="text" class="form-control" name="price" value="">
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
</form>
@endcan
@endsection