@extends('layout')

@section('content')
    <div class="container">
        <h1 class="titulos">Registrar Proyecto</h1>
        <form class="row g-3 flex-column flex-md-row" method="post" action="{{ url('proyecto/registrar') }}">
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
                <label for="descripcion" class="form-label col-auto">Descripción</label>
                <input class="form-control" id="descripcion" name="descripcion">
            </div>
            <div class="col-md-6">
                <label for="fecha_inicio" class="form-label col-auto">Fecha de Inicio</label>
                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio">
            </div>
            <div class="col-md-6">
                <label for="fecha_fin" class="form-label col-auto">Fecha de Fin</label>
                <input type="date" class="form-control" id="fecha_fin" name="fecha_fin">
            </div>
            <div class="col-md-6">
                <label for="presupuesto" class="form-label col-auto">Presupuesto</label>
                <input type="number" step="0.01" class="form-control @error('presupuesto') is-invalid @enderror"
                    id="presupuesto" name="presupuesto" value="{{ old('presupuesto') }}">
                @if ($errors->has('presupuesto'))
                    <div class="invalid-feedback">
                        {{ $errors->first('presupuesto') }}
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                <label for="estado" class="form-label col-auto">Estado</label>
                <select class="form-select @error('estado') is-invalid @enderror" id="estado" name="estado">
                    <option selected disabled>Selecciona un estado</option>
                    <option value="0">Pendiente</option>
                    <option value="2">En Progreso</option>
                    <option value="1">Completado</option>
                </select>
                @if ($errors->has('estado'))
                    <div class="invalid-feedback">
                        {{ $errors->first('estado') }}
                    </div>
                @endif
            </div>
            <div class="col-12">
                <div class="col-12 d-flex justify-content-between">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" id="button-login-register" class="btn" style="width: 12rem; margin-right: 2rem;justify-content:center">   
                            <span id="login-register-button-text">Agregar Proyecto</span>
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
