@extends('layout')

@section('content')
    <div class="container">
        <h1 class="titulos">Editar Colaborador</h1>
        <form class="row g-3 flex-column flex-md-row" method="post" action="{{ url("usuario/{$usuario->id}") }}">
            @csrf
            @method('PUT')

            <div class="col-md-6">
                <label for="nombre" class="form-label col-auto">Nombre</label>
                <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre"
                    value="{{ $usuario->name }}">
                @if ($errors->has('nombre'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre') }}
                    </div>
                @endif
            </div>

            <div class="col-md-6">
                <label for="apellidos" class="form-label col-auto">Apellidos</label>
                <input type="text" class="form-control @error('apellidos') is-invalid @enderror" id="apellidos"
                    name="apellidos" value="{{ $usuario->last_name }}">
                @if ($errors->has('apellidos'))
                    <div class="invalid-feedback">
                        {{ $errors->first('apellidos') }}
                    </div>
                @endif
            </div>

            <div class="col-md-6">
                <label for="email" class="form-label col-auto">Correo electrónico</label>
                <input type="email" class="form-control @error('correo') is-invalid @enderror" id="email"
                    name="correo" value="{{ $usuario->email }}">
                @if ($errors->has('correo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('correo') }}
                    </div>
                @endif
            </div>

            <div class="col-md-6">
                <label for="telefono" class="form-label col-auto">Teléfono celular</label>
                <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono"
                    name="telefono" value="{{ $usuario->phone }}">
                @if ($errors->has('telefono'))
                    <div class="invalid-feedback">
                        {{ $errors->first('telefono') }}
                    </div>
                @endif
            </div>

            <div class="col-md-6">
                <label for="profesion" class="form-label col-auto">Profesión</label>
                <input type="text" class="form-control @error('profesion') is-invalid @enderror" id="profesion"
                    name="profesion" value="{{ $usuario->profesion }}">
                @if ($errors->has('profesion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('profesion') }}
                    </div>
                @endif
            </div>
            @if (Auth::user()->id_rol == 1)
                <div class="col-md-6">
                    <label for="id_rol" class="form-label col-auto">Rol</label>
                    <select class="form-select @error('id_rol') is-invalid @enderror" id="id_rol" name="id_rol">
                        <option value="1" {{ $usuario->role === '1' ? 'selected' : '' }}>Administrador
                        </option>
                        <option value="2" {{ $usuario->role === '2' ? 'selected' : '' }}>Usuario</option>
                    </select>
                    @if ($errors->has('id_rol'))
                        <div class="invalid-feedback">
                            {{ $errors->first('id_rol') }}
                        </div>
                    @endif
                </div>
            @else
                <input type="hidden" name="id_rol" value="2">
            @endif
            <div class="col-12 d-flex justify-content-between">
                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" id="button-login-register" class="btn"
                            style="width: 13rem; margin-right: 3rem;justify-content:center">
                            <span id="login-register-button-text">Actualizar usuario</span>
                        </button>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ url('usuarios') }}" class="btn btn-secondary" id="button-login-register"
                            style="justify-content:center">Regresar</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
