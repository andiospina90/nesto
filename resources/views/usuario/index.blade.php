@extends('layout')


@section('content')
    <div class="">
        <h1 class="titulos">Consultar Colaboradores</h1>
        <div>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('error') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <div style="margin-top:4rem;margin-bottom:4rem">
            @if (Auth::user()->id_rol == 1)
                <a href="{{ url('usuario/registrar') }}" id="button-login-register" class="btn"
                    style="width:15%;color:white;justify-content:center">
                    Agregar nuevo usuario
                </a>
            @endif
        </div>
        <div>

            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo electrónico</th>
                        <th>Teléfono</th>
                        <th>Profesión</th>
                        <th>Editar</th>
                        @if (Auth::user()->id_rol == 1)
                            <th>Eliminar</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->last_name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>{{ $usuario->phone }}</td>
                            <td>{{ $usuario->profesion }}</td>

                            <td><a href="{{ url("/usuario/{$usuario->id}/editar") }}" class="btn btn-secondary"
                                    id="button-login-register" style="justify-content:center; "><i
                                        class="fa-regular fa-pen-to-square"></i>Editar</a></td>
                            @if (Auth::user()->id_rol == 1)
                                <td>

                                    <form action="{{ url("/usuario/{$usuario->id}") }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-secondary" id="button-login-register"
                                            style="justify-content:center; "><i
                                                class="fa-solid fa-trash"></i>Eliminar</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
