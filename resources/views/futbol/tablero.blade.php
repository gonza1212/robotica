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
                        <p class="my-3 fs-4" id="school_local">-- Escuela --</p>
                    </div>
                </div>
            </div>
            <!-- RELOJ Y SET -->
            <div class="col-md-4 px-3 py-2 mt-3">
                <div class="row white-border py-4" id="scoreboard">
                    <div class="col-md-12 mt-1 mb-3">
                    <a href="#" class="btn" id="set_title_toggler"><h3 class="color-futbol" id="title_set">1° TIEMPO</h3></a>
                        <div class="card mt-4">
                            <div class="card-body p-0">
                                <h1 class="text-futbol" id="time">5:00</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <a href="#" class="btn btn-outline-secondary" id="restart"><i class="fa-solid fa-clock-rotate-left"></i></a>
                    </div>
                    <div class="col-sm-4 d-grid">
                        <a href="#" class="btn btn-success" id="play_pause"><i class="fa-solid fa-play"></i></a>
                    </div>
                    <div class="col-sm-4">
                        <a href="#" class="btn" id="set_toggler"><h4 class="color-futbol mb-0" id="set">1 / 2</h4></a>
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
                        <p class="my-3 fs-4" id="school_visitante">-- Escuela --</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-0" id="last_matches">
            <div class="col-md-12 text-center">
                <p><i>Últimos encuentros</i></p>
            </div>
        </div>
    </div>    
</x-app-layout>