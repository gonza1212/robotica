<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GameFormRequest;
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

    /**
     * Guarda un partido
     */
    public function store(GameFormRequest $request) {
        $game = Game::create($request->all());
        return response()->json([
            'game' => $game,
        ], 200);
    }
}
