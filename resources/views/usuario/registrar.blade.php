@extends('layout')


@section('content')
    <div class="container">
        <h1 class="titulos">Registrar Colaborador</h1>
        <form class="row g-3 flex-column flex-md-row" method="post" action="{{ url('usuario/registrar') }}">
            @csrf
            <div class="col-md-6">
                <label for="nombre" class="form-label col-auto">Nombre</label>
                <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre"
                    name="nombre">
                @if ($errors->has('nombre'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre') }}
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                <label for="apellidos" class="form-label col-auto">Apellidos</label>
                <input type="text" class="form-control  @error('apellidos') is-invalid @enderror" id="apellidos"
                    name="apellidos">
                @if ($errors->has('apellidos'))
                    <div class="invalid-feedback">
                        {{ $errors->first('apellidos') }}
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label col-auto">Correo electrónico</label>
                <input type="email" class="form-control  @error('correo') is-invalid @enderror" id="email"
                    name="correo">
                @if ($errors->has('correo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('correo') }}
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                <label for="telefono" class="form-label col-auto">Teléfono celular</label>
                <input type="text" class="form-control  @error('telefono') is-invalid @enderror" id="telefono"
                    name="telefono">
                @if ($errors->has('telefono'))
                    <div class="invalid-feedback">
                        {{ $errors->first('telefono') }}
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                <label for="profesion" class="form-label col-auto">Profesión</label>
                <input type="text" class="form-control  @error('profesion') is-invalid @enderror" id="profesion"
                    name="profesion">
                @if ($errors->has('profesion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('profesion') }}
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                <label for="rol" class="form-label col-auto">Rol</label>
                <select class="form-select  @error('rol') is-invalid @enderror" id="rol" name="rol">
                    <option disabled>Selecciona un estado</option>
                    <option value="1">Administrador</option>
                    <option value="2" selected>Usuario</option>
                </select>
                @if ($errors->has('rol'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rol') }}
                    </div>
                @endif
            </div>
            <div class="col-12">
                <div class="col-12 d-flex justify-content-between">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" id="button-login-register" class="btn" style="width: 12rem; margin-right: 2rem;justify-content:center">   
                            <span id="login-register-button-text">Agregar usuario</span>
                            </button>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ url('usuarios') }}" class="btn btn-secondary" style="justify-content:center"   id="button-login-register">Regresar</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
