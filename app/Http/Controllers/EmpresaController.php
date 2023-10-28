<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::all();
        return view("empresa.index",compact("empresas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("empresa.registrar");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'nit' => '',
            'direccion' => '',
            'telefono' => '',
            'correo' => 'required|email',
            'estado' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/empresa/registrar')
                        ->withErrors($validator)
                        ->withInput();
        }

        Empresa::create([
            'nombre' => $request->nombre,
            'nit' => $request->nit,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'estado' => $request->estado,
        ]);

        return redirect('/empresas')->with('success', 'Empresa registrada correctamente');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresas = Empresa::find();
        return view("empresa.index",compact("empresas"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  model  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        return view('empresa.editar', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        $request->validate([
            'nombre' => 'required',
            'nit' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'correo' => 'required',
            'estado' => 'required',
        ]);

        $empresa->update($request->all());

        return redirect()->route('empresas')->with('success', 'Empresa actualizada exitosamente.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        // Lógica para eliminar la empresa
        $empresa->delete();
    
        return redirect('empresas')
            ->with('success', 'Empresa eliminada exitosamente.');
    }
}
