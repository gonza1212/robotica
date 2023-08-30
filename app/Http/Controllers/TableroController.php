<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Robot;

class TableroController extends Controller
{
    /**
     * Muestra el tablero de futbol por defecto
     * DEPRECATED
     * En el futuro se deberia poder crear tableros a gusto con distintos estilos y escoger cual se usa
     * O sino, usar el mismo con diferente skin pero tambien debe pasar por el controlador para modificar las clases (probablemente)
     * O de ultima, que pase por este metodo para devolver el tablero preferido del usuario
     */
    public function tableroFutbol() {
        return view('futbol.tablero', [
            'robots' => Robot::all(),
        ]);
    }
}
