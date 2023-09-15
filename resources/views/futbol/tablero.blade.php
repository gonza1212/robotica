<x-app-layout>
    <div id="tablero_futbol">
        <div class="row text-center pt-4 m-0">
            <!-- LOCAL -->
            <div class="col-md-4 p-3">
                <div class="row m-0 p-2 white-border" id="local">
                    <div class="col-sm-12 mb-3">
                        <h6 class="color-futbol">LOCAL</h6>
                        <select name="robot_id_local" id="robot_id_local" class="form-control mt-2 text-center fs-4 text-muted">
                            <option value="-1">Recuperando robots...</option>
                        </select>
                    </div>
                    <!-- Botones para modificar contador -->
                    <div class="col-sm-4 my-auto">
                        <a href="#" id="gol_local" class="btn btn-outline-success btn-x"><i class="fa-solid fa-circle-plus"></i></a>
                        <a href="#" id="anular_local" class="btn btn-outline-secondary btn-x mt-2"><i class="fa-solid fa-circle-minus"></i></a>
                    </div>
                    <!-- Contador del local -->
                    <div class="col-sm-8">
                        <div class="card">
                            <div class="card-body p-0">
                                <h1 class="text-futbol" id="score_local">00</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <p class="my-3 fs-4" id="school_local" title="Muestra la escuela del equipo local una vez seleccionado">-- Escuela --</p>
                    </div>
                </div>
            </div>
            <!-- RELOJ Y SET -->
            <div class="col-md-4 px-3 py-2 mt-2">
                <div class="row white-border py-3" id="scoreboard">
                    <div class="col-md-12 mb-3">
                        <a href="#" class="btn" id="set_title_toggler" title="Click para alternar entre primer y segundo tiempo"><h3 class="color-futbol" id="title_set">1° TIEMPO</h3></a>
                        <input type="text" class="input-futbol" name="comments" id="comments" placeholder="Instancia">
                        <div class="card mt-4">
                            <div class="card-body p-0">
                                <h1 class="text-futbol" id="time">5:00</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <a href="#" class="btn btn-outline-secondary" id="restart" title="Reiniciar reloj y contadores"><i class="fa-solid fa-clock-rotate-left"></i></a>
                    </div>
                    <div class="col-sm-4 d-grid">
                        <a href="#" class="btn btn-success" id="play_pause" title="Iniciar/pausar partido"><i class="fa-solid fa-play"></i></a>
                    </div>
                    <div class="col-sm-4">
                        <a href="#" class="btn" id="set_toggler" title="Click para alternar entre primer y segundo tiempo"><h4 class="color-futbol mb-0" id="set">1 / 2</h4></a>
                    </div>
                    <div class="col-md-12 d-grid mt-3" title="Guarda el resultado de un partido una vez finalizado">
                        <a href="#" class="btn btn-secondary gap-2 disabled" id="save_result"><i class="fa-solid fa-floppy-disk"></i> Guardar Resultado</a>
                        <input type="hidden" id="game_id" value="-1">
                    </div>
                </div>
            </div>
            <!-- VISITANTE -->
            <div class="col-md-4 p-3">
                <div class="row m-0 p-2 white-border" id="visitante">
                    <div class="col-sm-12 mb-3">
                        <h6 class="color-futbol">VISITANTE</h6>
                        <select name="robot_id_visitante" id="robot_id_visitante" class="form-control mt-2 text-center fs-4 text-muted">
                            <option value="-1">Recuperando robots...</option>
                        </select>
                    </div>
                    <!-- Contador del visitante -->
                    <div class="col-sm-8">
                        <div class="card">
                            <div class="card-body p-0">
                                <h1 class="text-futbol" id="score_visitante">00</h1>
                            </div>
                        </div>
                    </div>
                    <!-- Botones para modificar contador -->
                    <div class="col-sm-4 my-auto">
                        <a href="#" id="gol_visitante" class="btn btn-outline-success btn-x"><i class="fa-solid fa-circle-plus"></i></a>
                        <a href="#" id="anular_visitante" class="btn btn-outline-secondary btn-x mt-2"><i class="fa-solid fa-circle-minus"></i></a>
                    </div>
                    <div class="col-md-12">
                        <p class="my-3 fs-4" id="school_visitante" title="Muestra la escuela del equipo visitante una vez seleccionado">-- Escuela --</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-0" id="last_matches">
            <div class="col-md-12 mt-3 mb-0 text-center">
                <h5 class="mb-1"><i>Últimos encuentros</i></h5>
                <div class="responsive-table">
                    <table class="table-futbol">
                        <thead>
                            <tr>
                                <th>Local</th>
                                <th>Visitante</th>
                                <th>Instancia</th>
                                <th>Resultado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($games as $g)
                            <tr>
                                <td>{{ $g->local->name }} - {{ $g->local->school->name }}</td>
                                <td>{{ $g->visitor->name }} - {{ $g->visitor->school->name }}</td>
                                <td>{{ $g->comments }}</td>
                                <td>{{ $g->local_score }} - {{ $g->visitor_score }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>    
</x-app-layout>