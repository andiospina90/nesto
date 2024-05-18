<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\Tarea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        
            // Validar los datos del formulario
            $errors = Validator::make($request->all(), [
                'nombre' => 'required|string|max:255',
                'descripcion' => 'nullable|string|max:1000',
                'prioridad' => 'required|in:1,2,3',
                'id_proyecto' => 'required|exists:proyectos,id',
                'id_colaborador' => 'required|exists:users,id',
                'estado' => 'required|in:0,1,2',
            ]);

            $colaboradores = User::where('id_empresa', Auth::user()->id_empresa)
            ->select('id', 'name', 'last_name')
            ->get();

            $proyecto = Proyecto::find($request->id_proyecto);

            $tareas = Tarea::where('id_proyecto', $request->id_proyecto)->with('usuario')->get();

            $mensajesErrores = $errors->errors();
            
            if ($errors->fails()) {
                return view('proyecto.seguimiento', compact('proyecto', 'colaboradores', 'mensajesErrores', 'tareas'));
            }

            // Crear una nueva tarea con los datos recibidos
            Tarea::create([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'prioridad' => $request->prioridad,
                'id_proyecto' => $request->id_proyecto,
                'id_usuario' => $request->id_colaborador,
                'estado' => $request->estado,
            ]);
            
            $tareas = Tarea::where('id_proyecto', $request->id_proyecto)->with('usuario')->get();  
            
            return redirect("proyecto/" . $proyecto->id . "/seguimiento")->with('success', 'Tarea creada exitosamente');


        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarea = Tarea::find($id);
        $colaboradores = User::where('id_empresa', Auth::user()->id_empresa)
        ->select('id', 'name', 'last_name')
        ->get();
        return view('tareas.editar', compact('tarea','colaboradores'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'prioridad' => 'required|in:1,2,3',
            'id_colaborador' => 'required|exists:users,id',
            'estado' => 'required|in:0,1,2',
        
        ]);

        $tarea = Tarea::find($id);


        $tarea->update([
            'nombre' => $request->nombre,
            'prioridad' => $request->prioridad,
            'id_usuario' => $request->id_colaborador,
            'estado' => $request->estado,
        ]);
            
        return redirect("proyecto/" . $tarea->id_proyecto . "/seguimiento")->with('success', 'Tarea Editada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarea = Tarea::find($id);
        $tarea->delete();
        return redirect("proyecto/" . $tarea->id_proyecto . "/seguimiento")->with('success', 'Tarea eliminada exitosamente');
    }
}
