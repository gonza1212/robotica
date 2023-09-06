<form action="{{ route('robot.update', $robot->id) }}" method="post">
    @csrf
    @method('put')
    <div class="mb-2">
        <label for="name" class="form-label">Nombre <span class="text-muted">(Necesario)</span>:</label>
        @if(old('name'))
            <x-input-text id="name" :max="20" name="name" autocomplete="off" value="{{ old('name') }}" required />
        @else
            <x-input-text id="name" :max="20" name="name" autocomplete="off" value="{{ $robot->name }}" required />
        @endif
        @error('name')
        <x-error-alert :message="$message" />
        @enderror
    </div>
    <div class="mb-2">
        <label for="description" class="form-label">Descripción <span class="text-muted">(Opcional)</span>:</label>
        @if(old('description'))
            <x-input-text id="description" :max="255" name="description" autocomplete="off" value="{{ old('description') }}" />
        @else
            <x-input-text id="description" :max="255" name="description" autocomplete="off" value="{{ $robot->description }}" />
        @endif
        @error('description')
        <x-error-alert :message="$message" />
        @enderror
    </div>
    @csrf
    <div class="mb-2">
        <label for="code" class="form-label">Código:</label>
        <select name="school_id" id="school_id" class="form-control">
            @foreach($schools as $s)
            <option value="{{ $s->id }}" @if($robot->school_id == $s->id) selected @endif>{{ $s->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary" id="enviar" name="enviar">Actualizar</button>
</form>