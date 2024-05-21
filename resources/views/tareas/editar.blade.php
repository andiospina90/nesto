@extends('layout')

@section('content')
    <div class="container">
        <h1 class="titulos">Editar Tarea</h1>
        <form class="row g-3 flex-column flex-md-row" method="post" action="{{ url("tarea/{$tarea->id}") }}">
            @csrf
            @method('PUT')

            <div class="col-md-6">
                <label for="nombre" class="form-label col-auto">Nombre</label>
                <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre"
                    value="{{ $tarea->nombre }}">
                @if ($errors->has('nombre'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombre') }}
                    </div>
                @endif
            </div>

            <div class="col-md-6">
                <label for="descripcion" class="form-label col-auto">Insertar Comentario</label>
                <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion">{{ $tarea->descripcion }}</textarea>
                @if ($errors->has('descripcion'))
                    <div class="invalid-feedback">
                        {{ $errors->first('descripcion') }}
                    </div>
                @endif
            </div>

            <div class="col-md-6">
                <label for="fecha_inicio" class="form-label col-auto">Prioridad</label>
                <select class="form-select" id="prioridad" name="prioridad" required>
                    <option value="1" {{ $tarea->prioridad == '1' ? 'selected' : '' }}>Baja</option>
                    <option value="2" {{ $tarea->prioridad == '2' ? 'selected' : '' }}>Media</option>
                    <option value="3" {{ $tarea->prioridad == '3' ? 'selected' : '' }}>Alta</option>
                </select>
                @if ($errors->has('prioridad'))
                    <div class="invalid-feedback">
                        {{ $errors->first('prioridad') }}
                    </div>
                @endif
            </div>

            <div class="col-md-6">
                <label for="id_colaborador" class="form-label col-auto">Colaborador</label>
                <select class="form-select" id="id_colaborador" name="id_colaborador">
                    <option value="" disabled selected>Selecciona un colaborador</option>
                    @foreach ($colaboradores as $colaborador)
                        <option value="{{ $colaborador->id }}"
                            {{ $tarea->id_usuario === $colaborador->id ? 'selected' : '' }}>{{ $colaborador->name }}
                            {{ $colaborador->last_name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('id_colaborador'))
                    <div class="invalid-feedback">
                        {{ $errors->first('id_colaborador') }}
                    </div>
                @endif
            </div>

            <div class="col-md-6">
                <label for="estado" class="form-label col-auto">Estado</label>
                <select class="form-select @error('estado') is-invalid @enderror" id="estado" name="estado">
                    <option value="0" {{ $tarea->estado == '0' ? 'selected' : '' }}>Pendiente</option>
                    <option value="1" {{ $tarea->estado == '1' ? 'selected' : '' }}>Activa</option>
                    <option value="2" {{ $tarea->estado == '2' ? 'selected' : '' }}>Terminada</option>
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
                            <button type="submit" id="button-login-register" class="btn"
                                style="width: 13rem; margin-right: 3rem;justify-content:center">
                                <span id="login-register-button-text">Actualizar Tarea</span>
                            </button>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ url('proyecto/' . $tarea->id_proyecto . '/seguimiento') }}" class="btn btn-secondary"
                                style="justify-content:center" id="button-login-register">Regresar</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
