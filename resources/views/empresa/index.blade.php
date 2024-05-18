@extends('layout')


@section('content')
    <div class="">
        <h1 class="titulos">Consultar Empresas</h1>

        <div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <div style="margin-top:4rem;margin-bottom:4rem">
        </div>
        <div>

            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Correo electrónico</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Estado</th>
                        @if (Auth::user()->id_rol == 1)
                            <th>Editar</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($empresas as $empresa)
                        <tr>
                            <td>{{ $empresa->id }}</td>
                            <td>{{ $empresa->nombre }}</td>
                            <td>{{ $empresa->correo }}</td>
                            <td>{{ $empresa->telefono }}</td>
                            <td>{{ $empresa->direccion }}</td>
                            <td>
                                @if ($empresa->estado == 1)
                                    <span class="badge bg-success">Activo</span>
                                @else
                                    <span class="badge bg-danger">Inactivo</span>
                                @endif
                            </td>
                            @if (Auth::user()->id_rol == 1)
                                <td><a href="{{ url("/empresa/{$empresa->id}/editar") }}" class="btn btn-secondary"
                                        id="button-login-register" style="justify-content:center; "><i
                                            class="fa-regular fa-pen-to-square"></i>Editar</a>
                                </td>
                                {{-- <td>
                                    <form action="{{ url("/empresa/{$empresa->id}") }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-secondary" id="button-login-register"
                                            style="justify-content:center; "><i
                                                class="fa-solid fa-trash"></i>Eliminar</button>
                                    </form>
                                </td> --}}
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
