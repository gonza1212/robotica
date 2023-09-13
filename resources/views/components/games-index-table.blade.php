<div class="responsive-table">
    <table class="table table-sm table-striped" id="games_index_table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Local</th>
                <th>Visitante</th>
                <th>Resultado</th>
                <th>Comentarios</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($games as $g)
            <tr>
                <td>{{ $g->id }}</td>
                <td>{{ $g->local->name }} - {{ $g->local->school->name }}</td>
                <td>{{ $g->visitor->name }} - {{ $g->visitor->school->name }}</td>
                <td>{{ $g->local_score }} - {{ $g->visitor_score }}</td>
                <td>{{ $g->comments }}</td>
                <td>
                    <a href="javascript:confirmDelete({{ $g->id }})" class="btn btn-danger btn-sm">Del.</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    let table = new DataTable("#games_index_table");
</script>