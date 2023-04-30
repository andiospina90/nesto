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
            <a href="{{ url('empresa/registrar') }}" id="button-login-register" class="btn" style="width:16%;color:white">
            Agregar nueva empresa
            </a>
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
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
