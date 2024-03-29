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
                <a class="nav-link active" href="{{ route('reviewUserShow') }}">List</a>
            </li>
        </ul>
    </nav>

    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Date</th>
            <th scope="col">Message</th>
            <th scope="col">Stars</th>
            <th scope="col">Hotel_id</th>
            <th scope="col lighter">Remove</th>
        </tr>
        </thead>
        <tbody>
        @foreach($reviews as $review)
            <tr>
                <td>{{ $review->date}}</td>
                <td>{{ $review->message }}</td>
                <td>{{ $review->stars }}</td>
                <td>{{ $review->hotel_id }}</td>
                <td><a href="{{ route('reviewUserDelete', $review) }}">Remove</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection