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
        tocarSilbato();
        if(pause) {
            document.getElementById("play_pause").innerHTML = '<i class="fa-solid fa-pause"></i>';
            document.getElementById("play_pause").classList = 'btn btn-secondary';
        } else {
            document.getElementById("play_pause").innerHTML = '<i class="fa-solid fa-play"></i>';
            document.getElementById("play_pause").classList = 'btn btn-success';
        }
        pause = !pause;
        if(!pause)
            runTimer();
    }

    /**
     * reinicia el contador de tiempo a su valor inicial
     */
    function restart() {
        min = 5;
        sec = 0;
        showTime();
    }

    /**
     * Muestra el tiempo actual en el tablero
     */
    function showTime() {
        console.log("min:"+min+"|sec:"+sec);
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
                    }
                }
            }
            showTime();
            if(!pause) {
                runTimer();
            }
        }, 100);
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
        document.getElementById("set").innerText = set + " / 2";
        document.getElementById("title_set").innerText = set + "° TIEMPO";
    }
}