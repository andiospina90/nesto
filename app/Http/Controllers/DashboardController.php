<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Tarea;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $proyectosConPorcentaje = $this->porcentajesProyectos();

            $tareasActivas = $this->mostrarTareasActivas();

            return view('admin.dashboard', compact('proyectosConPorcentaje','tareasActivas'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    private function porcentajesProyectos()
    {
        // Obtén los proyectos que no están completados
        $proyectos = Proyecto::orderBy('created_at', 'desc')
            ->where('estado', '!=', 1)
            ->take(10)
            ->get();

        // Array para almacenar proyectos con su porcentaje de completitud
        $proyectosConPorcentaje = [];

        foreach ($proyectos as $proyecto) {
            $totalTasks = $proyecto->tareas()->count();
            $completedTasks = $proyecto->tareas()->where('estado', 2)->count();

            $porcentajeCompletado = $totalTasks > 0 ? ($completedTasks / $totalTasks) * 100 : 0;

            $proyectosConPorcentaje[] = [
                'id' => $proyecto->id,
                'nombre' => $proyecto->nombre,
                'porcentaje_completado' => $porcentajeCompletado,
            ];
        }

        return $proyectosConPorcentaje;
    }

    private function mostrarTareasActivas()
    {

        return Tarea::where('estado', 1)
            ->with('proyecto')
            ->with('usuario')
            ->with('comentarios')
            ->take(10)->get();
    }
}
