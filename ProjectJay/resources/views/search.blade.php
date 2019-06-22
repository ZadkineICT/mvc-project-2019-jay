@extends('layout.layout')

@section('content')

    <div class="hotel-list">
        <div class="row">
            @foreach($hotels as $hotel)
                <div class="col-lg-4 col-md-6 col-12 justify-content-around">
                    <div class="hotel-item">
                        <ul>
                                <li class="hotel-item-title">{{ $hotel->name_hotel }}</li>
                                <a href="{{ route('hotels.show', $hotel) }}">
                                <li><img src="https://www.lottehotel.com/content/dam/lotte-hotel/lotte/yangon/main/180809-1-2000-mai-yangon-hotel.jpg.thumb.768.768.jpg" alt=""></li>
                                </a>
                                <li class="hotel-item-country">{{ $hotel->country }}</li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


{{--        <div class="container">--}}
{{--        <h1>Zoekresultaten</h1>--}}
{{--            <p> The Search results for your query <b> {{ $query }} </b> are :</p>--}}
{{--            <h2>Hotel</h2>--}}
{{--            <table class="table table-striped">--}}
{{--                <thead>--}}
{{--                <tr>--}}
{{--                    <th>Hotel name</th>--}}
{{--                    <th>Country</th>--}}
{{--                    <th>Details</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--        @foreach($hotels as $hotel)--}}
{{--            <tr>--}}
{{--                <td>{{$hotel->name_hotel}}</td>--}}
{{--                <td>{{$hotel->country}}</td>--}}
{{--                <td><a href="{{ route('hotels.show', $hotel) }}">Details</a></td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
{{--        </tbody>--}}
{{--        </table>--}}
{{--    </div>--}}
@endsection