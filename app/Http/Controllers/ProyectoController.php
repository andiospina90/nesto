<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;

class ProyectoController extends Controller
{
    public function index()
    {
        $proyectos = Proyecto::all();
        return view('proyecto.index', compact('proyectos'));
    }

    public function create()
    {
        return view('proyecto.registrar');
    }

    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'fecha_inicio' => 'required|date',
        'fecha_fin' => 'required|date|after:fecha_inicio',
        'estado' => 'required',
        'presupuesto' => 'required|numeric',
    ]);

    Proyecto::create([
        'nombre' => $request->nombre,
        'descripcion' => $request->descripcion,
        'fecha_inicio' => $request->fecha_inicio,
        'fecha_fin' => $request->fecha_fin,
        'estado' => $request->estado,
        'presupuesto' => $request->presupuesto,
    ]);

    return redirect('proyectos')
        ->with('success', 'Proyecto creado exitosamente.');
}

    public function edit(Proyecto $proyecto)
    {
        return view('proyecto.editar', compact('proyecto'));
    }

    public function update(Request $request, Proyecto $proyecto)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'fecha_inicio' => 'required|date',
        'fecha_fin' => 'required|date|after:fecha_inicio',
        'estado' => 'required',
        'presupuesto' => 'required|numeric',
    ]);

    $proyecto->update([
        'nombre' => $request->nombre,
        'descripcion' => $request->descripcion,
        'fecha_inicio' => $request->fecha_inicio,
        'fecha_fin' => $request->fecha_fin,
        'estado' => $request->estado,
        'presupuesto' => $request->presupuesto,
    ]);

    return redirect('proyectos')
    ->with('success', 'Proyecto actualizado exitosamente.');
}

    public function destroy(Proyecto $proyecto)
    {
        // Elimina el proyecto de la base de datos
        $proyecto->delete();

        return redirect('proyectos')
        ->with('success', 'Proyecto eliminado exitosamente.');
    }

    public function show(Proyecto $proyecto){
        return view('proyecto.seguimiento', compact('proyecto'));
    }
}
