@extends('layout.layout')

{{-- Navigation Section --}}
@section("aside-filter")
    <input type="checkbox" id="aside-checkbox">
    <div class="filters">   
        <h3>Filters</h3>
        <ul>
            <li><input type="checkbox" id="pool"></input> <label for="pool">Swimming pool</li>
            <li><input type="checkbox" id="center"></input> <label for="center">Center of city</li>
            <li><input type="checkbox" id="shops"></input> <label for="shops">Shops</li>
            <li><input type="checkbox" id="sauna"></input> <label for="sauna">Sauna</li>
        </ul>
        <div class="aside-button"><label for="aside-checkbox"><i class="fas fa-sort-up"></i></label></div>
    </div>
@endsection

@section('popular')
    <h3>Popular Items</h3>
    <div class="hotel-list">
        <div class="row">
            <?php $count = 0;?>
            @foreach($hotels as $hotel)
                <?php if($count == 3) break; ?>
                <div class="col-lg-4 col-md-6 col-12 justify-content-around">
                    <div class="hotel-item item-popular">
                        <ul>
                            <a href="{{ route('hotels.show', $hotel) }}">
                                <li class="hotel-item-title">{{ $hotel->name_hotel }}</li>
                                <li><img src="https://www.lottehotel.com/content/dam/lotte-hotel/lotte/yangon/main/180809-1-2000-mai-yangon-hotel.jpg.thumb.768.768.jpg" alt=""></li>
                                <li class="hotel-item-country">{{ $hotel->country }}</li>
                            </a>
                            {{-- @hasrole('admin') --}}
                            {{-- @endhasrole --}}
                        </ul>
                    </div>
                </div>
                <?php $count++; ?>
            @endforeach 
        </div>
        <hr>
    </div>
@endsection

@section('hotel-list')
    <h3>Hotels</h3>
    <div class="hotel-list">
        <div class="row">
            @foreach($hotels as $hotel)
                <div class="col-lg-4 col-md-6 col-12 justify-content-around">
                    <div class="hotel-item">
                        <ul>
                            <a href="{{ route('hotels.show', $hotel) }}">
                                <li class="hotel-item-title">{{ $hotel->name_hotel }}</li>
                                <li><img src="https://www.lottehotel.com/content/dam/lotte-hotel/lotte/yangon/main/180809-1-2000-mai-yangon-hotel.jpg.thumb.768.768.jpg" alt=""></li>
                                <li class="hotel-item-country">{{ $hotel->country }}</li>
                            </a>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div> 
@endsection

