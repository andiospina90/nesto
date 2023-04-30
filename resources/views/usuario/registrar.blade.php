@extends('layout')


@section('content')
    <div class="">
        <h1 class="titulos">Registrar Colaborador</h1>
        <form class="row g-3 flex-column flex-md-row" method="post" action="{{ url('empresa/registrar') }}">
            @csrf
            <div class="col-md-6">
                <label for="nombre" class="form-label col-auto">Nombre</label>
                <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre">
                @if ($errors->has('nombre'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre') }}
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                <label for="apellidos" class="form-label col-auto">Apellidos</label>
                <input type="text" class="form-control  @error('apellidos') is-invalid @enderror" id="apellidos" name="apellidos">
                                @if ($errors->has('apellidos'))
                    <div class="invalid-feedback">
                        {{ $errors->first('apellidos') }}
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label col-auto">Correo electrónico</label>
                <input type="email" class="form-control  @error('correo') is-invalid @enderror" id="email" name="correo">
                                @if ($errors->has('correo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('correo') }}
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                <label for="telefono" class="form-label col-auto">Teléfono celular</label>
                <input type="text" class="form-control  @error('telefono') is-invalid @enderror" id="telefono" name="telefono">
                                @if ($errors->has('telefono'))
                    <div class="invalid-feedback">
                        {{ $errors->first('telefono') }}
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                <label for="profesion" class="form-label col-auto">Profesión</label>
                <input type="text" class="form-control  @error('profesion') is-invalid @enderror" id="profesion" name="profesion">
                                @if ($errors->has('profesion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('profesion') }}
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                <label for="rol" class="form-label col-auto">Rol</label>
                <select class="form-select  @error('rol') is-invalid @enderror" id="rol" name="rol">
                    <option selected disabled>Selecciona un estado</option>
                    <option value="administrador">Administrador</option>
                    <option value="usuario">Usuario</option>
                </select>
                                @if ($errors->has('rol'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rol') }}
                    </div>
                @endif
            </div>
            <div class="col-12">
                <button type="submit" id="button-login-register" class="btn">
                    <span id="login-register-button-text">Guardar</span>
                </button></button>
            </div>
        </form>
    </div>
@endsection
