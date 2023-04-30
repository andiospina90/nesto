@extends('layout')


@section('content')
    <div class="">
        <h1 class="titulos">Registrar Empresa</h1>
        <form class="row g-3 flex-column flex-md-row" method="post" action="{{ url('empresa/registrar') }}">
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
                <label for="apellidos" class="form-label col-auto">Nit</label>
                <input type="text" class="form-control" id="nit" name="nit">
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
                <label for="telefono" class="form-label col-auto">Teléfono</label>
                <input type="text" class="form-control  @error('telefono') is-invalid @enderror" id="telefono"
                    name="telefono">
            </div>
            <div class="col-md-6">
                <label for="direccion" class="form-label col-auto">Dirección</label>
                <input type="text" class="form-control  @error('direccion') is-invalid @enderror" id="direccion"
                    name="direccion">
            </div>
            <div class="col-md-6">
                <label for="estado" class="form-label col-auto">Estado</label>
                <select class="form-select  @error('estado') is-invalid @enderror" id="estado" name="estado">
                    <option selected disabled>Selecciona un rol</option>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
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
