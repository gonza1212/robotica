<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    /**
     * Devuelve la vista con la lista de partidos
     */
    public function index() {
        return view('games.index', [
            'games' => Game::all(),
        ]);
    }
}
