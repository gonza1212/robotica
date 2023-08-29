<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Robot;

class RobotController extends Controller
{
    /**
     * Devuelve la vista y la lista de robots cargados
     */
    public function index() {
        return view('robot.index', [
            'robots' => Robot::all(),
        ]);
    }
}
