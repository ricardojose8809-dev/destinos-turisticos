<?php

namespace App\Http\Controllers;

use App\Models\Lugar;
use Illuminate\Http\Request;

class LugarController extends Controller
{
    /**
     * Lista todos los lugares turísticos.
     */
    public function index()
    {
        $lugares = Lugar::all();

        return view('lugares.index', compact('lugares'));
    }

    /**
     * Muestra el detalle de un lugar específico.
     */
    public function show(int $id)
    {
        $lugar = Lugar::find($id);

        if (!$lugar) {
            abort(404, 'Lugar turístico no encontrado');
        }

        return view('lugares.show', compact('lugar'));
    }
}