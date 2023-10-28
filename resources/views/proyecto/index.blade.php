@extends('layout')

@section('content')
    <div class="">
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
            <a href="{{ url('proyecto/registrar') }}" id="button-login-register" class="btn"
                style="width: 15%; color: white;justify-content:center">
                Agregar proyecto
            </a>
        </div>
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Fecha de Inicio</th>
                        <th>Fecha de Fin</th>
                        <th>Estado</th>
                        <th>Seguimiento</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
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
                                    Completado
                                @elseif ($proyecto->estado == 2)
                                    En Progreso
                                @else
                                    Pendiente
                                @endif
                            </td>
                            <td><a href="{{ url("/proyecto/{$proyecto->id}/seguimiento") }}" class="btn btn-secondary"
                                    id="button-login-register" style="justify-content:center; "><i class="fa-regular fa-eye"></i>Seguimiento</a>
                            <td><a href="{{ url("/proyecto/{$proyecto->id}/editar") }}" class="btn btn-secondary"
                                    id="button-login-register" style="justify-content:center; "><i class="fa-regular fa-pen-to-square"></i>Editar</a>
                            </td>
                            <td>
                                <form action="{{ url("/proyecto/{$proyecto->id}") }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-secondary" id="button-login-register"
                                        style="justify-content:center; "><i class="fa-solid fa-trash"></i>Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
