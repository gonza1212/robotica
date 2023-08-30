<div class="responsive-table">
    <table class="table table-sm table-striped" id="robots_index_table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Escuela</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($robots as $r)
            <tr>
                <td>{{ $r->id }}</td>
                <td>{{ $r->name }}</td>
                <td>{{ $r->school->name }}</td>
                <td>buttons</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    let table = new DataTable("#robots_index_table");
</script>