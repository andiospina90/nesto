@extends('layout')

@section('content')
    <div class="container">
        <h1 class="titulos">Editar Proyecto</h1>
        <form class="row g-3 flex-column flex-md-row" method="post" action="{{ url("proyecto/{$proyecto->id}") }}">
            @csrf
            @method('PUT')

            <div class="col-md-6">
                <label for="nombre" class="form-label col-auto">Nombre</label>
                <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre"
                    value="{{ $proyecto->nombre }}">
                @if ($errors->has('nombre'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre') }}
                    </div>
                @endif
            </div>

            <div class="col-md-6">
                <label for="descripcion" class="form-label col-auto">Descripción</label>
                <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion"
                    name="descripcion">{{ $proyecto->descripcion }}</textarea>
                @if ($errors->has('descripcion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('descripcion') }}
                    </div>
                @endif
            </div>

            <div class="col-md-6">
                <label for="fecha_inicio" class="form-label col-auto">Fecha de Inicio</label>
                <input type="date" class="form-control @error('fecha_inicio') is-invalid @enderror" id="fecha_inicio"
                    name="fecha_inicio" value="{{ $proyecto->fecha_inicio }}">
                @if ($errors->has('fecha_inicio'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fecha_inicio') }}
                    </div>
                @endif
            </div>

            <div class="col-md-6">
                <label for="fecha_fin" class="form-label col-auto">Fecha de Fin</label>
                <input type="date" class="form-control @error('fecha_fin') is-invalid @enderror" id="fecha_fin"
                    name="fecha_fin" value="{{ $proyecto->fecha_fin }}">
                @if ($errors->has('fecha_fin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fecha_fin') }}
                    </div>
                @endif
            </div>

            <div class="col-md-6">
                <label for="presupuesto" class="form-label col-auto">Presupuesto</label>
                <input type="number" step="0.01" class="form-control @error('presupuesto') is-invalid @enderror"
                    id="presupuesto" name="presupuesto" value="{{ $proyecto->presupuesto }}">
                @if ($errors->has('presupuesto'))
                    <div class="invalid-feedback">
                        {{ $errors->first('presupuesto') }}
                    </div>
                @endif
            </div>

            <div class="col-md-6">
                <label for="estado" class="form-label col-auto">Estado</label>
                <select class="form-select @error('estado') is-invalid @enderror" id="estado" name="estado">
                    <option value="en_proceso" {{ $proyecto->estado === '0' ? 'selected' : '' }}>En Proceso</option>
                    <option value="completado" {{ $proyecto->estado === '1' ? 'selected' : '' }}>Completado</option>
                    <option value="cancelado" {{ $proyecto->estado === '2' ? 'selected' : '' }}>Cancelado</option>
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
                            <button type="submit" id="button-login-register" class="btn" style="width: 13rem; margin-right: 3rem;justify-content:center">   
                            <span id="login-register-button-text">Actualizar Proyecto</span>
                            </button>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ url('proyectos') }}" class="btn btn-secondary" style="justify-content:center"   id="button-login-register">Regresar</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
