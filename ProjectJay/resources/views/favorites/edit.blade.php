@extends('layout.layout')

@section('content')

<h1 class="mt-5">Edit favorite</h1>

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
            <a class="nav-link " href="{{ route('favorites.index') }}">List</a>
        </li>
        @can('create users')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('favorites.create') }}">Add </a>
        </li>
        @endcan
        <li class="nav-item">
            <a class="nav-link active" href="">Edit </a>
        </li>
    </ul>
</nav>

@can('edit favorites')
<form method="POST" action="{{ route('favorites.update', $favorite) }}">
    @csrf
    @method('PUT ')
    <div class="form-group">
        <label>User</label>
        <select class="form-control" name="user_id">
            <?php $option = 0; ?>
            @foreach($users as $user);
                <option value="{{ $favorite->user->id }} "> >> {{ $favorite->user->id }} {{ $favorite->user->name }}</option>
                <?php $option++; 
                    $current = $favorite->user->id;
                ?>
                @if ($option > 0)
                    @break
                @endif
            @endforeach
    
            @foreach ($users as $user)
                @if ($user->id != $current) 
                <option value="{{ $user->id }}">{{ $user->id }} {{ $user->name }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Hotel</label>
        <select class="form-control" name="hotel_id">
            <?php $option = 0; ?>
            @foreach($hotels as $hotel);
                <option value="{{ $favorite->hotel->id }} "> >> {{ $favorite->hotel->id }} {{ $favorite->hotel->name_hotel }}</option>
                <?php $option++; 
                    $current = $favorite->hotel->id;
                ?>
                @if ($option > 0)
                    @break
                @endif
            @endforeach
    
            @foreach ($hotels as $hotel)
                @if ($hotel->id != $current) 
                <option value="{{ $hotel->id }}">{{ $hotel->id }} {{ $hotel->name_hotel }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
</form>
@endcan
@endsection