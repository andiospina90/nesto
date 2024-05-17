@extends('layout')

@section('contentLogin')
    <div id="login-register-container">
        <div>
            <img src="{{ asset('img/Nesto blanco.svg') }}" alt="logo" id="back-logo-container">
        </div>
        <div class="row  " style="heigth:78% !important">
            <div class="col-md-6">
                <div class="card" id="login-register-card" style="height: 37.25em !important">
                    <div class="card-body">
                        <div id="card-content">
                            <div class="" id="login-register-logo">
                                <img src="{{ asset('img/Nesto.svg') }}" alt="logo" width="200">
                            </div>
                            <div id="login-register-font">
                                <span>Inicia sesión con tu correo y contraseña</span>
                            </div>
                            <form action="{{ route('store') }}" method="post">
                                @csrf
                                <div class="" id="fomr-input-container">
                                    {{-- <label for="email" class="form-label">Correo electrónico</label> --}}
                                    <input type="nombre" class="form-control @error('nombre') is-invalid @enderror"
                                        id="nombre" name="nombre" value="{{ old('nombre') }}" required
                                        placeholder="Nombre">
                                    @error('nombre')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="" id="fomr-input-container">
                                    {{-- <label for="email" class="form-label">Correo electrónico</label> --}}
                                    <input type="apellidos" class="form-control @error('apellidos') is-invalid @enderror"
                                        id="apellidos" name="apellidos" value="{{ old('apellidos') }}" required
                                        placeholder="Apellidos">
                                    @error('apellidos')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="" id="fomr-input-container">
                                    {{-- <label for="email" class="form-label">Correo electrónico</label> --}}
                                    <input type="empresa" class="form-control @error('empresa') is-invalid @enderror"
                                        id="empresa" name="empresa" value="{{ old('empresa') }}" required
                                        placeholder="Empresa o Independiente">
                                    @error('empresa')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="" id="fomr-input-container">
                                    {{-- <label for="email" class="form-label">Correo electrónico</label> --}}
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email') }}" required
                                        placeholder="Correo electrónico">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="" id="fomr-input-container">
                                    {{-- <label for="email" class="form-label">Correo electrónico</label> --}}
                                    <input type="telefono" class="form-control @error('telefono') is-invalid @enderror"
                                        id="telefono" name="telefono" value="{{ old('telefono') }}" required
                                        placeholder="Telefono">
                                    @error('telefono')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="" id="fomr-input-container">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" required placeholder="Contraseña">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 mt-3 d-flex justify-content-center" style="padding-top: 20px;">
                                    <button type="submit" class="btn" id="button-login-register">
                                        <span id="login-register-button-text">Registrarse</span></button>
                                    <a href="{{ route('login') }}" class="btn" id="button-login-register"
                                        style="margin-left:10px;">
                                        <span id="login-register-button-text">Regresar</span>
                                    </a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
