<x-app-layout>
<h1>* Editar Robot *</h1>
    <hr>
    <div class="row justifiy-content-center">
        <div class="col-md-8">
            <x-robot-edit-form :schools="$schools" :robot="$robot" />
        </div>
    </div>
</x-app-layout>