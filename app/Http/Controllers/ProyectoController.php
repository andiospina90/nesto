<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\Tarea;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProyectoController extends Controller
{
    public function index()
    {
        $proyectos = Proyecto::where('id_empresa', Auth::user()->id_empresa)->with('tareas')->get();

        foreach ($proyectos as $key => $proyecto) {
            $cantidadTareasTerminadas = Tarea::where('estado', 2)->where('id_proyecto', $proyecto['id'])->get()->count();
            $cantidadTareas = count($proyecto['tareas']);
            if ($cantidadTareas == 0) {
                $porcentaje = 0;
            }else{
                $porcentaje = round(($cantidadTareasTerminadas / $cantidadTareas) * 100, 2);
            }
            $proyectos[$key]['porcentaje'] = $porcentaje;
        }
        return view('proyecto.index', compact('proyectos'));
    }

    public function create()
    {
        return view('proyecto.registrar');
    }

    public function store(Request $request)
    {
        try {

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
                'id_empresa' => Auth::user()->id_empresa
            ]);
    
            return redirect('proyectos')
                ->with('success', 'Proyecto creado exitosamente.');
        } catch (\Throwable $th) {
            throw $th;
        }

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

        //eliminar las tareas del proyecto
        Tarea::where('id_proyecto', $proyecto->id)->delete();

        return redirect('proyectos')
            ->with('success', 'Proyecto eliminado exitosamente.');
    }

    public function show(Proyecto $proyecto)
    {

        $colaboradores = User::where('id_empresa', Auth::user()->id_empresa)
            ->select('id', 'name', 'last_name')
            ->get();

        $tareas = Tarea::where('id_proyecto', $proyecto->id)->with('usuario')->get();

        return view('proyecto.seguimiento', compact('proyecto', 'colaboradores', 'tareas'));
    }
}
