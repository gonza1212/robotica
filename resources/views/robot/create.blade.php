<x-app-layout>
    <h1>* Nuevo Robot *</h1>
    <hr>
    <div class="row justifiy-content-center">
        <div class="col-md-8">
            <x-robot-create-form :schools="$schools" />
        </div>
    </div>
</x-app-layout>