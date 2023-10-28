<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        return view("usuario.index", compact("usuarios"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("usuario.registrar");
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
            'apellidos' => 'required',
            'correo' => 'required|email',
            'rol' => 'required',
            'telefono' => 'required',
            'profesion' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/usuario/registrar')
                ->withErrors($validator)
                ->withInput();
        }

        User::create([
            'name' => $request->nombre,
            'last_name' => $request->apellidos,
            'email' => $request->correo,
            'phone' => $request->telefono,
            'profesion' => $request->profesion,
            'password' => bcrypt(substr(str_replace(['+', '/', '='], '', Str::random(40)), 0, 10))
        ]);

        return redirect('usuarios')->with('success', 'Usuario agregado exitosamente.');
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
    public function edit(User $usuario)
    {
        return view('usuario.editar', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'correo' => 'required|email',
            'telefono' => 'required|string|max:20',
            'profesion' => 'required|string|max:255',
            'rol' => 'required|in:administrador,usuario',
        ]);

        $usuario->update([
            'name' => $request->nombre,
            'last_name' => $request->apellidos,
            'email' => $request->correo,
            'phone' => $request->telefono,
            'profesion' => $request->profesion,
            'role' => $request->rol,
        ]);

        return redirect('usuarios')->with('success', 'Usuario actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        $usuario->delete();

        return redirect('usuarios')->with('success', 'Usuario eliminado exitosamente.');
    }
}
