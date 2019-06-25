@section('nav')
<input class="nav-right menu-btn" type="checkbox" id="menu-btn"/>
<label class="nav-right menu-icon" for="menu-btn"><span class="navicon"></span></label>
@guest
        @if (Route::has('register'))
            <li><a class="nav-right" href="{{ route('register') }}">{{ __('Register') }}</a></li>
        @endif
        <li ><a  href="{{ route('login') }}">{{ __('Login') }}</a></li>
    @else
    @endguest
<li><a href="/frontpage">Home</a></li>
@hasanyrole('owner|admin|client')
    <li><a class="nav-right" href="/home">{{ Auth::user()->name }}</a></li>
@endrole
<form action="/search" method="GET" role="search">
    @csrf
    <li><input type="text" class="nav-mid" name="q" placeholder="Search hotels"></li>
</form>
<ul class="navmenu">
    <li><a class="nav-left" href="/frontpage">Home</a></li>
    @role('owner|admin')
    <ul class="adminmenu">
        <li><a class="nav-left" href="{{ route('hotels.show', '') }}">Hotels</a></li>
        <li><a class="nav-left" href="{{ route('rooms.show', '') }}">Rooms</a></li>
        <li><a class="nav-left" href="{{ route('reservations.show', '') }}">Reservations</a></li>
        <li><a class="nav-left" href="{{ route('employees.show', '') }}">Employees</a></li>
        <li><a class="nav-left" href="{{ route('roomtypes.show', '') }}">Roomtypes</a></li>
        <li><a class="nav-left" href="{{ route('reviews.show', '') }}">Reviews</a></li>
    </ul>
    @endrole
    @guest
        @if (Route::has('register'))
        @endif
    @else
        <li>
            <a class="" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sort-up"></i> {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    @endguest
@endsection 
