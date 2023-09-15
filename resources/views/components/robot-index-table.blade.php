<div class="responsive-table">
    <table class="table table-sm table-striped" id="robots_index_table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Escuela</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($robots as $r)
            <tr>
                <td>{{ $r->id }}</td>
                <td>{{ $r->name }}</td>
                <td>{{ $r->description }}</td>
                <td>{{ $r->school->name }} - {{ $r->school->description }}</td>
                <td>
                    <a href="{{ route('robot.edit', $r->id) }}" class="btn btn-warning btn-sm">Edit.</a>
                    <a href="javascript:confirmDelete({{ $r->id }}, '{{ $r->name }}', '{{ $r->school->name }}')" class="btn btn-danger btn-sm">Del.</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    let table = new DataTable("#robots_index_table");
</script>

<x-robot-confirm-delete />