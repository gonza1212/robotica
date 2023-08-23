<x-app-layout>
    <div class="text-center">
        <h2 class="mt-5">Inicio</h2>
        <hr class="hr-80">
    </div>
    <p>Algunos links rápidos...</p>
    <hr>
    <p>Datos de usuario:</p>
    <p>{{ \Auth::user() }}</p>
    @foreach(\Auth::user()->roles as $r)
        <p>Rol: {{ $r->name }}</p>
    @endforeach
</x-app-layout>
