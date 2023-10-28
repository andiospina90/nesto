@extends('layout')

@section('content')
    <div class="container">
        <h1 class="titulos">Editar Empresa</h1>
        <form class="row g-3 flex-column flex-md-row" action="{{ url("/empresa/$empresa->id") }}" method="POST">
            @csrf
            @method('PUT')

            <div class="col-md-6">
                <label for="nombre" class="form-label col-auto">Nombre de la Empresa</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $empresa->nombre }}">
            </div>

            <div class="col-md-6">
                <label for="nit" class="form-label col-auto">NIT</label>
                <input type="text" name="nit" id="nit" class="form-control" value="{{ $empresa->nit }}">
            </div>

            <div class="col-md-6">
                <label for="direccion" class="form-label col-auto">Dirección</label>
                <input type="text" name="direccion" id="direccion" class="form-control"
                    value="{{ $empresa->direccion }}">
            </div>

            <div class="col-md-6" class="form-label col-auto">
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="form-control" value="{{ $empresa->telefono }}">
            </div>

            <div class="col-md-6" class="form-label col-auto">
                <label for="correo">Correo Electrónico</label>
                <input type="email" name="correo" id="correo" class="form-control" value="{{ $empresa->correo }}">
            </div>

            <div class="col-md-6">
                <label for="estado">Estado</label>
                <select name="estado" id="estado" class="form-control">
                    <option value="opcion1" @if ($empresa->estado == 1) selected @endif>Activa</option>
                    <option value="opcion2" @if ($empresa->estado == 0) selected @endif>Inactiva</option>
                </select>
            </div>


            <div class="col-12 d-flex justify-content-between">
                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" id="button-login-register" class="btn">
                            <span id="login-register-button-text">Guardar</span>
                        </button>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ url('empresas') }}" class="btn btn-secondary" id="button-login-register" style="justify-content:center">Volver</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
