<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RobotFormRequest;
use App\Models\Robot;
use App\Models\School;

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

    /**
     * Devuelve la vista para crear un robot
     */
    public function create() {
        return view('robot.create', [
            'schools' => School::all(),
        ]);
    }

    /**
     * Guarda un Roboto en la BD
     */
    public function store(RobotFormRequest $request) {
        Robot::create($request->all());
        return redirect()->route('robot.index');
    }

    /**
     * Devuelve la lista de robots en la BD
     */
    public function getForScoreboard() {
        return response()->json([
            'robots' => Robot::with('school')->get(),
        ], 200);
    }

    /**
     * Devuelve la vista y los datos para editar
     */
    public function edit($id) {
        return view('robot.edit', [
            'schools' => School::all(),
            'robot' => Robot::find($id),
        ]);
    }

    /**
     * Actualiza el robot en la BD
     */
    public function update(RobotFormRequest $request, $id) {
        $robot = Robot::find($id);
        $robot->fill($request->all());
        $robot->save();
        return redirect()->route('robot.index');
    }

    /**
     * Realiza eliminado suave de un robot
     */
    public function destroy($id) {
        Robot::destroy($id);
        return redirect()->route('robot.index');
    }
}
