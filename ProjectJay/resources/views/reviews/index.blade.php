@extends('layout.layout')

@section('content')

<h1 class="mt-5">Reviews</h1>

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

<nav class="nav">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('reviews.index') }}">List</a>
        </li>
        @can('edit reviews')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('reviews.create') }}">Add </a>
        </li>
       @endcan
    </ul>
</nav>

<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Date</th>
            <th scope="col">Message</th>
            <th scope="col">Stars</th>
            <th scope="col">Hotel id</th>
            {{-- @hasrole('admin') --}}
            <th scope="col lighter">Details</th>
            @can('edit reviews')
            <th scope="col lighter">Edit</th>
            @endcan
            @can('delete reviews')
            <th scope="col lighter">Delete</th>
            @endcan
        </tr>
    </thead>
    <tbody>
        @foreach($reviews as $review)
        <tr>
            <td scope="row">{{ $review->id }}</td>
            <td>{{ $review->date }}</td>
            <td>{{ $review->message }}</td>
            <td>{{ $review->stars }}</td>
            <td>{{ $review->hotel_id}}</td>

            
            <td><a href="{{ route('reviews.show', $review) }}">Details</a></td>
            @can('edit reviews')
            <td><a href="{{ route('reviews.edit', $review) }}">Edit</a></td>
            @endcan
            @can('delete reviews')
            <td><a href="{{ route('reviews.delete', $review) }}">Delete</a></td>
            @endcan
            {{-- @endhasrole --}}
        </tr>
        @endforeach
    </tbody>
</table>

@endsection