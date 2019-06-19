@extends('layout.layout')

@section('content')

    <div class="container">
        @if(isset($hotel))
            <p> The Search results for your query <b> {{ $query }} </b> are :</p>
            <h2>Hotel</h2>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Hotel name</th>
                    <th>Country</th>
                </tr>
                </thead>
                <tbody>
                @foreach($hotels as $hotel)
                    <tr>
                        <td>{{$hotel->name_hotel}}</td>
                        <td>{{$hotel->country}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection