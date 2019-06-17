@extends('layout.layout')

@section('content')

<h1 class="mt-5">review details</h1>

<nav class="nav">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('reviews.index') }}">List</a>
        </li>
        @can('edit reviews')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('reviews.create') }}">Add </a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="">Details </a>
        </li>
       @endcan
    </ul>
</nav>

<div class="card" style="width: 100%;">
    <div class="card-header">
        Review Details
    </div>
    <ul class="list-group list-group-flush" style="list-style-type: none">
        <li class="list-group-item">
            Id
            <br>
            {{ $review->id }}
        </li>
        <li class="list-group-item">
            Date
            <br>
            {{ $review->date }}
        </li>
        <li class="list-group-item">
            Message
            <br>
            {{ $review->message }}
        </li>
        <li class="list-group-item">
            Stars
            <br>
            {{ $review->stars }}
        </li>
        <li class="list-group-item">
            Hotel_id
            <br>
            {{ $review->hotel_id }}
        </li>
    </ul>
</div>
@endsection