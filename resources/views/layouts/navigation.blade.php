<a class="sidebar-link fw-bold" href="{{ route('dashboard') }}">{{ config('constants.SOFTWARE_NAME') }}</a>
<hr>
<a class="sidebar-link" href="#" onclick="event.preventDefault(); document.getElementById('logout_form').submit();">{{ __('Salir') }}</a>
<form method="POST" action="{{ route('logout') }}" id="logout_form">
    @csrf
</form>
                