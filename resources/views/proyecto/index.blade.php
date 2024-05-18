@extends('layout')

@section('content')
    <div class="div-pagina">
        <h1 class="titulos">Consultar Proyectos</h1>

        <div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <div style="margin-top: 4rem; margin-bottom: 4rem;">
            @if (Auth::user()->id_rol == 1)
            <a href="{{ url('proyecto/registrar') }}" id="button-login-register" class="btn"
                style="width: 15%; color: white;justify-content:center">
                Agregar proyecto
            </a>
            @endif
        </div>
        <div class="">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Fecha de Inicio</th>
                        <th>Fecha de Fin</th>
                        <th>Estado</th>
                        <th>Porcentaje Cumplido</th>
                        <th>Tareas</th>
                        @if (Auth::user()->id_rol == 1)
                        <th>Editar</th>
                        <th>Eliminar</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proyectos as $proyecto)
                        <tr>
                            <td>{{ $proyecto->id }}</td>
                            <td>{{ $proyecto->nombre }}</td>
                            <td>{{ $proyecto->descripcion }}</td>
                            <td>{{ $proyecto->fecha_inicio }}</td>
                            <td>{{ $proyecto->fecha_fin }}</td>
                            <td>
                                @if ($proyecto->estado == 1)
                                    <span class="badge bg-success">Completado</span>
                                @elseif ($proyecto->estado == 2)
                                    <span class="badge bg-warning text-dark">En Progreso</span>
                                @else
                                    <span class="badge bg-danger">Pendiente</span>
                                @endif
                            </td>
                            <td>{{ $proyecto->porcentaje }}%</td>
                            <td><a href="{{ url("/proyecto/{$proyecto->id}/seguimiento") }}" class="btn btn-secondary"
                                    id="button-login-register" style="justify-content:center;"><i
                                        class="fa-regular fa-eye"></i>Seguimiento</a>
                            </td>
                            @if (Auth::user()->id_rol == 1)
                            <td><a href="{{ url("/proyecto/{$proyecto->id}/editar") }}" class="btn btn-secondary"
                                    id="button-login-register" style="justify-content:center; "><i
                                        class="fa-regular fa-pen-to-square"></i>Editar</a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-secondary"
                                    id="button-login-register" style="justify-content:center;" data-bs-toggle="modal"
                                    data-bs-target="#confirmModal{{ $proyecto->id }}">
                                    Eliminar
                                </button>
                            </td>
                            @include('proyecto.eliminar')
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
