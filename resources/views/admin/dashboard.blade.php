@extends('layout')

@section('content')
    <div class="container">
        {{-- <div class="row">
            <div class="col-md-12">
                <h1 class="titulos">Dashboard</h1>
            </div>
        </div> --}}

        {{-- Contenedor con cards mostrando el porcentaje del proyecto y el nombre del proyecto --}}
        <div class="col-md-12">
            <h2>Proyectos y su Porcentaje completado</h2>
        </div>
        <div class="row mt-4 mb-4">
            <div class="col-md-6">
                <div class="card-group">
                    @foreach (collect($proyectosConPorcentaje)->slice(0, 5) as $proyecto)
                        <div class="col-md-12 mb-3">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $proyecto['nombre'] }}</h5>
                                    <p class="card-text">Porcentaje completado: {{ $proyecto['porcentaje_completado'] }}%</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-group">
                    @foreach (collect($proyectosConPorcentaje)->slice(5) as $proyecto)
                        <div class="col-md-12 mb-3">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $proyecto['nombre'] }}</h5>
                                    <p class="card-text">Porcentaje completado: {{ $proyecto['porcentaje_completado'] }}%
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Una tabla que muestre las tareas activas --}}
        <div class="row">
            <div class="col-md-12">
                <h2>Tareas Activas</h2>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Proyecto</th>
                            <th>Usuario</th>
                            <th>Comentarios</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tareasActivas as $tarea)
                            <tr>
                                <td>{{ $tarea->id }}</td>
                                <td>{{ $tarea->nombre }}</td>
                                <td>{{ $tarea->descripcion }}</td>
                                <td>{{ $tarea->proyecto->nombre }}</td>
                                <td>{{ $tarea->usuario->name }}</td>
                                <td>
                                    <button type="button" data-bs-toggle="modal" class="btn btn-secondary"
                                        id="button-login-register" data-bs-target="#comentariosModal{{ $tarea->id }}">
                                        Ver Comentarios
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@foreach ($tareasActivas as $tarea)
    <div class="modal fade" id="comentariosModal{{ $tarea->id }}" tabindex="-1"
        aria-labelledby="comentariosModalLabel{{ $tarea->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="comentariosModalLabel{{ $tarea->id }}">Comentarios de la Tarea
                        {{ $tarea->id }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="list-group">
                        @foreach ($tarea->comentarios as $comentario)
                            <li class="list-group-item">{{ $comentario->comentario }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
