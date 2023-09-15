if(document.getElementById("tablero_futbol")) {
    // Variables
    var local = 0;
    var visitante = 0;
    var min = 5;
    var sec = 0;
    var pause = true;
    var set = 1;
    var silbato = new Audio('./sounds/whistle.wav');
    var plus = new Audio('./sounds/beep1.wav');
    var minus = new Audio('./sounds/beep2.wav');
    var robots;
    var deltaTime = 1000;

    /**
     * Recuperar robots desde BD
     */
    $.ajax({
        type:'get',
        url:'/get-robots-for-scoreboard',
        data:'_token = <?php echo csrf_token() ?>',
        success: function(data) {
            //console.log({data});
            robots = data.robots;
            llenarRobotSelectors();
        }
    });

    /** 
     * Listener para boton de gol local
     */
    document.getElementById("gol_local").addEventListener("click", function(event) {
        event.preventDefault();
        gol('local');
    });

    /**
     * Listener para boton de anular gol local
     */
    document.getElementById("anular_local").addEventListener("click", function(event) {
        event.preventDefault();
        anular('local');
    });

    /** 
     * Listener para boton de gol visitante
     */
    document.getElementById("gol_visitante").addEventListener("click", function(event) {
        event.preventDefault();
        gol('visitante');
    });

    /**
     * Listener para boton de anular gol visitante
     */
    document.getElementById("anular_visitante").addEventListener("click", function(event) {
        event.preventDefault();
        anular('visitante');
    });

    /**
     * Listener para boton de play y pause de tiempo
     */
    document.getElementById("play_pause").addEventListener("click", function(event) {
        event.preventDefault();
        toggleTimer();
    });

    /**
     * Listener para boton de reiniciar tiempo
     */
    document.getElementById("restart").addEventListener("click", function(event) {
        event.preventDefault();
        restart();
        stopTimer(true);
    });

    /**
     * Listener para boton de set 
     */
    document.getElementById("set_toggler").addEventListener("click", function(event) {
        event.preventDefault();
        toggleSet();
    });

    /**
     * Listener para boton del titulo de set 
     */
    document.getElementById("set_title_toggler").addEventListener("click", function(event) {
        event.preventDefault();
        toggleSet();
    });

    /**
     * Listener para selector de equipo local
     */
    document.getElementById("robot_id_local").addEventListener("change", function() {
        showSchool("local");
    });

    /**
     * Listener para selector de equipo visitante
     */
    document.getElementById("robot_id_visitante").addEventListener("change", function() {
        showSchool("visitante");
    });

    document.getElementById("save_result").addEventListener("click", function(event) {
        event.preventDefault();
        saveResult();
    })

    /**
     * Suma un gol al equipo seleccionado
     * @param {*} team 
     */
    function gol(team) {
        if(validScore('gol', team)) {
            team == 'local' ? 
            document.getElementById("score_local").innerText = ++local > 9 ? local : "0" + local : 
            document.getElementById("score_visitante").innerText = ++visitante > 9 ? visitante : "0" + visitante;
        }
    }

    /**
     * Resta un gol al equipo seleccionado
     * @param {} team 
     */
    function anular(team) {
        if(validScore('anular', team)) {
            team == 'local' ? 
            document.getElementById("score_local").innerText = --local > 9 ? local : "0" + local : 
            document.getElementById("score_visitante").innerText = --visitante > 9 ? visitante : "0" + visitante;
        }
    }

    /**
     * Verifica que el puntaje de cada equipo esté dentro de un rango válido
     * @param {*} event 
     * @param {*} team 
     * @returns 
     */
    function validScore(event, team) {
        if(team == 'local') {
            if(event == 'gol')
                return local < 99;
            else
                return local > 0;
        }
        if(team == 'visitante') {
            if(event == 'gol')
                return visitante < 99;
            else
                return visitante > 0;
        }
    }

    /**
     * Pausa o reinicia el contador de tiempo
     * Tambien se encarga de cambiar el icono del boton
     */
    function toggleTimer() {
        if(pause) {
            if(equiposValidos()) {
                document.getElementById("play_pause").innerHTML = '<i class="fa-solid fa-pause"></i>';
                document.getElementById("play_pause").classList = 'btn btn-secondary';
            }
        } else {
            document.getElementById("play_pause").innerHTML = '<i class="fa-solid fa-play"></i>';
            document.getElementById("play_pause").classList = 'btn btn-success';
        }
        if(equiposValidos()) {
            pause = !pause;
            if(!pause)
                runTimer();
            tocarSilbato();
            showSet();
        }
    }

    /**
     * Reinicia el contador de tiempo a su valor inicial, los marcadores y los robots elegidos
     */
    function restart() {
        // document.getRobotById("robot_local_id").value = -1;
        // document.getRobotById("robot_visitante_id").value = -1;
        // local = 0;
        // visitante = 0;
        min = 5;
        sec = 0;
        showTime();
    }

    /**
     * Muestra el tiempo actual en el tablero
     */
    function showTime() {
        //console.log("min:"+min+"|sec:"+sec);
        document.getElementById("time").innerText = min + ":" + (sec > 9 ? sec : "0" + sec);
    }

    /**
     * Hacer correr el reloj hacia atrás
     */
    function runTimer() {
        setTimeout(() => {
            if(!pause && min >= 0) {
                if(--sec < 0) {
                    sec = 59;
                    if(--min < 0) {
                        min = 0;
                        sec = 0;
                        stopTimer();
                        enableSaveButton();
                    }
                }
            }
            showTime();
            if(!pause) {
                runTimer();
            }
        }, deltaTime);
    }

    /**
     * Detiene el reloj pero deja los ceros en pantalla
     */
    function stopTimer(restart = false) {
        document.getElementById("play_pause").innerHTML = '<i class="fa-solid fa-play"></i>';
        document.getElementById("play_pause").classList = 'btn btn-success';
        pause = true;
        if(!restart)
            tocarSilbato();
    }

    /**
     * Habilita el boton para guardar el resultado del partido si es que ya terminó
     */
    function enableSaveButton() {
        if(set == 2 && min == 0 && sec == 0) {
            document.getElementById("save_result").classList = "btn btn-primary gap-2";
        }
    }

    /**
     * Reproduce el sonido del silbato si el tiempo comienza o termina
     */
    function tocarSilbato() {
        if(min == 5 || (min == 0 && sec == 0)) {
            //console.log("silbato");
            silbato.play();
        }
    }

    /**
     * Cambia el set (primer o segundo tiempo)
     */
    function toggleSet() {
        set == 1 ? set ++ : set --;
        showSet();
    }

    /**
     * Actualiza el set en pantalla
     */
    function showSet() {
        document.getElementById("set").innerText = set + " / 2";
        document.getElementById("title_set").classList = "color-futbol";
        document.getElementById("title_set").innerText = set + "° TIEMPO";
    }

    /**
     * Arma la lista de robots en los select de local y visitante
     */
    function llenarRobotSelectors() {
        document.getElementById("robot_id_local").innerHTML = '<option value="-1">Seleccione un equipo...</option>';
        document.getElementById("robot_id_visitante").innerHTML = '<option value="-1">Seleccione un equipo...</option>';
        for(let i=0; i<robots.length; i++) {
            document.getElementById("robot_id_local").innerHTML += '<option value="'+robots[i].id+'" title="'+robots[i].school.name+'">'+robots[i].name+'</option>';
            document.getElementById("robot_id_visitante").innerHTML += '<option value="'+robots[i].id+'" title="'+robots[i].school.name+'">'+robots[i].name+'</option>';
        }
        document.getElementById("robot_id_local").classList = "form-control mt-2 text-center fs-4";
        document.getElementById("robot_id_visitante").classList = "form-control mt-2 text-center fs-4";
    }

    /**
     * Se valida que no se comience el partido si los equipos son iguales
     */
    function equiposValidos() {
        if(document.getElementById("robot_id_local").value == document.getElementById("robot_id_visitante").value) {
            console.log("equipos iguales");
            document.getElementById("title_set").innerText = "Los equipos son iguales";
            document.getElementById("title_set").classList = "text-danger";
            return false;
        } else {
            if(document.getElementById("robot_id_local").value < 0 || document.getElementById("robot_id_visitante").value < 0) {
                console.log("no se eligio a uno o dos equipos");
                document.getElementById("title_set").innerText = "Uno o ambos equipos son inválidos";
                document.getElementById("title_set").classList = "text-danger";
                return false;
            }
            console.log("equipos diferentes");
            return true;
        }
    }

    /**
     * Muestra la escuela segun el equipo elegido
     */
    function showSchool(team) {
        document.getElementById("school_"+team).innerText = 
        (getRobotById(document.getElementById("robot_id_"+team).value) != null ? 
        getRobotById(document.getElementById("robot_id_"+team).value).school.name + "\n" + getRobotById(document.getElementById("robot_id_"+team).value).school.description :
         "-- Escuela --");
    }

    /**
     * Devuelve el robot segun el id
     * @param {*} id 
     * @returns 
     */
    function getRobotById(id) {
        for(let i=0; i<robots.length; i++) {
            if(robots[i].id == id) {
                return robots[i];
            }
        }
        return null;
    }

    /**
     * Intenta guardar el resultado mediante AJAX
     * Si falla, muestra un mensaje en pantalla
     */
    function saveResult() {
        document.getElementById("save_result").classList = "btn btn-secondary gap-2 disabled";
        $.ajax({
            type:'post',
            url: '/games',
            data: {
                'local_id' : document.getElementById("robot_id_local").value,
                'visitor_id' : document.getElementById("robot_id_visitante").value,
                'local_score' : local,
                'visitor_score' : visitante,
                'finished' : 1,
                'comments' : document.getElementById("comments").value, 
            },
            success: function(data) {
                console.log("Guardado exitoso");
                console.log({data});
                window.location.href = "/tablero-futbol";
            },
            error: function(data) {
                console.log("Error al guardar");
                console.log({data});
                alert("Error al guardar, intente nuevamente");
            }

        });
    }
}