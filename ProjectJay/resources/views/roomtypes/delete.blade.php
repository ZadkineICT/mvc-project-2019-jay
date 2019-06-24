@extends('layout.layout')

@section('content')

<h1 class="mt-5">Delete roomtype</h1>

@if ($errors->any()) 
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@can('edit roomtypes', 'delete roomtypes')
<form action="{{ route('roomtypes.destroy', $roomtype) }}" method="POST">
    @csrf
    @method('DELETE')
    <div class="form-group">
        <label>Roomtype Id</label>
        <input type="text" class="form-control" name="id" value="{{ $roomtype->id }}">
    </div>
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="name" value="{{ $roomtype->name }}">
    </div>
    <div class="form-group">
        <label>Price</label>
        <input type="text" name="price" class="form-control" value="{{ $roomtype->price }}">
    </div>
    <button type="submit" class="btn btn-danger">DELETE</button>
</form>
@endcan
@endsection