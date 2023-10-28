@extends('layout')

@section('content')
    <div class="">
        <h1 class="titulos">{{ $proyecto->nombre }}</h1>

        <div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <div style="margin-top: 4rem; margin-bottom: 4rem;">
            <a type="button" id="button-login-register" class="btn"
                style="width: 16%; color: #fff; justify-content: center" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                <i class="fa-regular fa-file" style="font-size: 1rem;"></i> Adjuntos del proyecto
            </a>
        </div>
        <div><h1 class="titulos">Tareas</h1></div>
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre tarea</th>
                        <th>Colaborador</th>
                        <th>Estado</th>
                        <th>Ultima actualización</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Crear interfaz de usuario</td>
                        <td>Pedronel camacho</td>
                        <td>En progreso</td>
                        <td>28/10/2023</td>
                    </tr>
                    {{-- @foreach ($proyectos as $proyecto)
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
                            <td><a href="{{ url("/proyecto/{$proyecto->id}/editar") }}" class="btn btn-warning">Editar</a>
                            </td>
                            <td>
                                <form action="{{ url("/proyecto/{$proyecto->id}") }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
        <div class="col-12 d-flex ">
            <div class="col-md-1">
                <a href="{{ url('proyectos') }}" class="btn btn-secondary" id="button-login-register"
                    style="justify-content:center; margin-right:1rem">Volver
                </a>
            </div>
            <div lass="col-md-1">
                <button type="button" id="button-login-register" class="btn btn-secondary" style="justify-content: center"
                    data-bs-toggle="modal" data-bs-target="#exampleModal2">
                    Nueva tarea
                </button>
            </div>

        </div>
    </div>
    {{-- iniacia modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Archivos adjuntos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul>
                        <li><a href="#">Acta de compromisos</a></li>
                        <li><a href="#">Contrato</a></li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" id="button-login-register" style="justify-content:center"
                        data-bs-dismiss="modal">Añadir archivo
                        </button>
                    <button class="btn btn-secondary" id="button-login-register" style="justify-content:center"
                        data-bs-dismiss="modal">Cerrar
                        </button>
                </div>
            </div>
        </div>
    </div>
    {{-- Finaliza modal --}}

    {{-- Inicia modal para cerar tarea --}}

    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Título del Nuevo Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Contenido del nuevo modal -->
                    <p>Este es el contenido del nuevo modal.</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" id="button-login-register" style="justify-content: center"
                        data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Finaliza el modal para crear tarea --}}
    </div>
@endsection
