@extends('layout.layout')

{{-- Navigation Section --}}




@section('popular')
<h3>Popular Items</h3>
<div class="hotel-list">
    <ul class="row">
        <?php $count = 0;?>
        @foreach($hotels as $hotel)
        <?php if($count == 3) break; ?>
        <li class="col-lg-4 col-sm-1 ustify-content-around hotel-item item-popular">
            <ul>
                <a href="{{ route('hotels.show', $hotel) }}">
                    <li class="hotel-item-title">{{ $hotel->name_hotel }}</li>
                    <li><img src="https://www.lottehotel.com/content/dam/lotte-hotel/lotte/yangon/main/180809-1-2000-mai-yangon-hotel.jpg.thumb.768.768.jpg" alt=""></li>
                    <li class="hotel-item-country">{{ $hotel->country }}</li>
                </a>
                {{-- @hasrole('admin') --}}
                {{-- @endhasrole --}}
            </ul>
        </li>
        <?php $count++; ?>
        @endforeach 
    </ul>
    <hr>
</div>
@endsection



@section("aside-filter")
<div>
    <h3>Filters</h3>
    <ul>
        <li><input type="checkbox" id="pool"></input> <label for="pool">Swimming pool</li>
        <li><input type="checkbox" id="center"></input> <label for="center">Center of city</li>
        <li><input type="checkbox" id="shops"></input> <label for="shops">Shops</li>
        <li><input type="checkbox" id="sauna"></input> <label for="sauna">Sauna</li>
    </ul>
</div>
@endsection



@section('hotel-list')
<h3>Browse Random Picks</h3>
<div class="hotel-list">
    <ul class="row">
        @foreach($hotels as $hotel)
        <li class="col-lg-4 col-sm-1 ustify-content-around hotel-item">
            <ul>
                <a href="{{ route('hotels.show', $hotel) }}">
                    <li class="hotel-item-title">{{ $hotel->name_hotel }}</li>
                    <li><img src="https://www.lottehotel.com/content/dam/lotte-hotel/lotte/yangon/main/180809-1-2000-mai-yangon-hotel.jpg.thumb.768.768.jpg" alt=""></li>
                    <li class="hotel-item-country">{{ $hotel->country }}</li>
                </a>
                {{-- @hasrole('admin') --}}
                {{-- @endhasrole --}}
            </ul>
        </li>
        @endforeach
    </ul>
</div> 
@endsection