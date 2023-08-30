/** CSS */
import '../css/bootstrap.css';
import '../css/app.css';
import '../css/all.min.css';
import '../css/sidebar.css';

/** JS */
import './bootstrap';
import './bootstrap.bundle';
import './all.min.js';
import './tablero';
import './utilities';

/**
 * Configuracion de AJAX
 */
$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
