@section('nav')
<input class="nav-right menu-btn" type="checkbox" id="menu-btn"/>
<label class="nav-right menu-icon" for="menu-btn"><span class="navicon"></span></label>
@guest
        @if (Route::has('register'))
            <li><a class="nav-right" href="{{ route('register') }}">{{ __('Register') }}</a></li>
        @endif
        <li><a class="nav-right" href="{{ route('login') }}">{{ __('Login') }}</a></li>
    @else
    @endguest
@hasanyrole('owner|admin|client')
    <li><a class="nav-right" href="/home">{{ Auth::user()->name }}</a></li>
    <li><form action=""><input class="nav-mid" type="text" placeholder="Search"></form></li>
@endrole
<ul class="navmenu">
    <li><a class="nav-left" href="/frontpage">Home</a></li>
    <li><a class="nav-left" href="{{ route('hotels.show', '') }}">Hotels</a></li>
    @role('owner|admin')
    <ul class="adminmenu">
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
