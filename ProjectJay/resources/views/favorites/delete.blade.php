@extends('layout.layout')

@section('content')

<h1 class="mt-5">Delete favorite</h1>

@if ($errors->any()) 
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@can('edit favorites', 'delete favorites')
<form action="{{ route('favorites.destroy', $favorite) }}" method="POST">
    @csrf
    @method('DELETE')
    <div class="form-group">
        <label>Favorite Id</label>  
        <input type="text" readonly class="form-control" name="id" value="{{ $favorite->id }}">
    </div>
    <div class="form-group">
        <label>User</label>
        <input type="text" readonly class="form-control" name="user" value="{{ $favorite->user->name }}">
    </div>
    <div class="form-group">
        <label>Hotel</label>
        <input type="text" readonly class="form-control" name="hotel" value="{{ $favorite->hotel->name_hotel }}">
    </div>
    <button type="submit" class="btn btn-danger">DELETE</button>
</form>
@endcan
@endsection