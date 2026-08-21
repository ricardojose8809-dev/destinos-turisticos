<?php

namespace App\Http\Controllers;

use App\Models\Lugar;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    /**
     * Muestra el formulario de contacto, opcionalmente asociado a un lugar.
     */
    public function create(?int $id = null)
    {
        $lugar = $id ? Lugar::find($id) : null;

        return view('contacto.create', compact('lugar'));
    }

    /**
     * Procesa el envío del formulario de contacto.
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre'   => 'required|string|max:100',
            'email'    => 'required|email',
            'mensaje'  => 'required|string|max:1000',
            'lugar_id' => 'nullable|integer',
        ]);

        $datos['fecha'] = now()->toDateTimeString();

        // Guardamos la solicitud en un JSON de "contactos" (simula persistencia)
        $path = 'data/contactos.json';
        $contactos = \Storage::exists($path)
            ? json_decode(\Storage::get($path), true)
            : [];

        $contactos[] = $datos;
        \Storage::put($path, json_encode($contactos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        return redirect()
            ->route('lugares.index')
            ->with('exito', '¡Gracias! Tu solicitud de información fue enviada correctamente.');
    }
}