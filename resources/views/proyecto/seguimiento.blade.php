@extends('layout')

@section('content')
    <div class="div-pagina">
        <h1 class="titulos">{{ $proyecto->nombre }}</h1>

        <div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (isset($mensajesErrores) && !empty($mensajesErrores))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <span> Ha ocurrido un error al tratar de registrar la tarea </span>
                    <ul>
                        @foreach ($mensajesErrores->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
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
        <div>
            <h1 class="titulos">Tareas</h1>
        </div>
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre tarea</th>
                        <th>Descripcion</th>
                        <th>Colaborador</th>
                        <th>Estado</th>
                        <th>Prioridad</th>
                        <th>Ultima actualización</th>
                        <th>Editar</th>
                        <th>Comentarios</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tareas as $tarea)
                        <tr>
                            <td>{{ $tarea->id }}</td>
                            <td>{{ $tarea->nombre }}</td>
                            <td>{{ $tarea->descripcion }}</td>
                            <td>{{ $tarea->usuario->name . ' ' . $tarea->usuario->last_name }}</td>
                            <td>
                                @if ($tarea->estado == 2)
                                    <span class="badge bg-success">Completado</span>
                                @elseif ($tarea->estado == 1)
                                    <span class="badge bg-warning text-dark">En Progreso</span>
                                @elseif ($tarea->estado == 0)
                                    <span class="badge bg-danger">Pendiente</span>
                                @endif
                            </td>
                            <td>
                                @if ($tarea->prioridad == 2)
                                    <span class="badge bg-success">Media</span>
                                @elseif ($tarea->prioridad == 1)
                                    <span class="badge bg-warning text-dark">Baja</span>
                                @elseif ($tarea->prioridad == 3)
                                    <span class="badge bg-danger">Alta</span>
                                @endif
                            </td>
                            <td>{{ $tarea->updated_at }}</td>
                            <td><a href="{{ url("/tarea/{$tarea->id}/editar") }}" class="btn btn-secondary"
                                    id="button-login-register" style="justify-content:center;">Editar</a>
                            </td>
                            <td>
                                    <button type="button" data-bs-toggle="modal" class="btn btn-secondary"
                                        id="button-login-register" data-bs-target="#comentariosModal{{ $tarea->id }}">
                                        Ver Comentarios
                                    </button>
                            </td>
                            @if (Auth::user()->id_rol == 1)
                                <td>
                                    <button type="button" class="btn btn-secondary" id="button-login-register"
                                        style="justify-content:center;" data-bs-toggle="modal"
                                        data-bs-target="#confirmModal{{ $tarea->id }}">
                                        Eliminar
                                    </button>
                                </td>
                            @endif
                        </tr>
                        @include('tareas.eliminar')
                    @endforeach
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
    @include('tareas.registrar')
    </div>
@endsection

@foreach ($tareas as $tarea)
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
                    <form action="{{ route('comentario.guardar') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_tarea" value="{{ $tarea->id }}">
                        <input type="hidden" name="id_proyecto" value="{{ $tarea->id_proyecto }}">
                        <textarea class="form-control mt-3" name="comentario" placeholder="Escribe un comentario"></textarea>
                        <button type="submit" class="btn btn-secondary mt-3" id="button-login-register" style="justify-content:center">Guardar Comentario</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" class="btn btn-secondary" id="button-login-register" style="justify-content:center">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
