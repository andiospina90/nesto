@extends('layout')

@section('contentLogin')
    <div id="login-register-container">
        <div>
            <img src="{{ asset('img/Nesto blanco.svg') }}" alt="logo" id="back-logo-container">
        </div>
        <div class="row  ">
            <div class="col-md-6">
                <div class="card" id="login-register-card">
                    <div class="card-body">
                        <div id="card-content">
                            <div class="" id="login-register-logo">
                                <img src="{{ asset('img/Nesto.svg') }}" alt="logo" width="200">
                            </div>
                            <div id="login-register-font">
                                <span>Inicia sesión con tu correo y contraseña</span>
                            </div>
                            <form action="{{ route('authenticate') }}" method="post">
                                @csrf
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
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" required placeholder="Contraseña">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3 mt-3 d-flex justify-content-center" style="padding-top: 20px;">
                                    <button type="submit" class="btn" id="button-login-register">
                                        <span id="login-register-button-text">Iniciar sesion</span></button>
                                </div>
                                <div class="mb-3 d-flex justify-content-center" style="margin-top:35px">
                                    <a href="{{ route('register') }}" id="login-register-font">Si no tienes un usuario
                                        puedes
                                        registrate aquí</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
