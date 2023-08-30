<x-app-layout>
    <h1 class="mt-2">Robots</h1>
    <hr>
    <x-robot-index-table :robots="$robots" />
    <a href="{{ route('robot.create') }}" class="btn btn-primary mt-3">Nuevo Robot</a>
</x-app-layout>