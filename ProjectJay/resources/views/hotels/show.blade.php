@extends('layout.layout')

@section('content')

<h1 class="mt-5">Hotel details</h1>

@if (session('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
@endif

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

@if ($errors->any()) 
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<style>
    body {
        color:black;
    }
</style>

<nav class="nav">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('hotels.index') }}">List</a>
        </li>
        @can('edit hotels')
        <li class="nav-item">
            <a class="nav-link active" href="">Details </a>
        </li>
        @endcan
        <li class="nav-item">
            <a class="nav-link" href="{{ route('reservations.create', ['hotel'=>$hotel->id]) }}">Reservation</a>
        </li>
    </ul>
</nav>

<div class="card" style="width: 100%;">
    <div class="card-header">
        Hotel Details
    </div>
    <ul class="list-group list-group-flush" style="list-style-type: none">
        @hasrole('owner|admin')
        <li class="list-group-item">
            Id
            <br>
            {{ $hotel->id }}
        </li>
        @endhasrole
        <li class="list-group-item">
            Hotel Name
            <br>
            {{ $hotel->name_hotel }}
        </li>
        <li class="list-group-item">
            Address
            <br>
            {{ $hotel->address }}
        </li>
        <li class="list-group-item">
            City
            <br>
            {{ $hotel->city}}
        </li>
        <li class="list-group-item">
            Country
            <br>
            {{ $hotel->country}}
        </li>
        <li class="list-group-item">
            Phone Number
            <br>
            {{ $hotel->phone_number}}
        </li>
    </ul>
</div>
@can('delete favorites')
    @if($favorites)
        <form action="{{ route('favoriteUserDestroy', $hotel->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-success" value="Unfavorite">
        </form>
    @else
        <form action="{{ route('favoriteUserStore', $hotel->id) }}" method="POST">
            @csrf
            <input type="submit" class="btn btn-success" value="Favorite">
        </form>
    @endif
    <br>
@endcan

<br>
<div class="reviews">
@can('create reviews')
<form action="{{ route('reviews.index', ['id'=>$hotel->id]) }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Message</label>
        <textarea class="form-control" name="message"></textarea>
    </div>
    <div class="form-group">
        <label>Stars</label>    
        <select name="stars">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    </div>
    <div class="form-group">
        <input type="hidden" class="form-control" name="hotel_id" value="{{ $hotel->id }}">
    </div>
    <button type="submit" class="btn btn-primary">Comment</button>
</form>
<br>
@endcan
<br><br>
<h4>Reviews</h3>
@foreach ($reviews as $review)
    @if ($review->hotel_id == $hotel->id)
        <div class="review-item">
            <p>{{ $review->date }}</p>
            <p>{{ $review->stars }} Stars<br>{{ $review->message }}</p>
        </div>
        <br>
    @endif
@endforeach    
</div><br><br>
@endsection