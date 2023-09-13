<a class="sidebar-link fw-bold" href="{{ route('dashboard') }}">{{ config('constants.SOFTWARE_NAME') }}</a>
<a href="#" class="sidebar-link">Contraer</a>
<hr>
<a href="{{ route('tablero-futbol') }}" class="sidebar-link">Tablero de Fútbol</a>
<a href="{{ route('robot.index') }}" class="sidebar-link">Robots</a>
<a href="{{ route('games.index') }}" class="sidebar-link">Partidos</a>
<hr>
<a class="sidebar-link" href="#" onclick="event.preventDefault(); document.getElementById('logout_form').submit();">{{ __('Salir') }}</a>
<form method="POST" action="{{ route('logout') }}" id="logout_form">
    @csrf
</form>
                