@extends('layout')

@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">Nesto</div>
                <div class="card-body">
                    <div><span>Usuario: </span><span>{{ $user->name }} {{ $user->last_name }}</span></div>
                    <div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline-block;">
                            @csrf
                            <button type="submit" class="btn" id="button-login-register"
                              class="btn" id="button-login-register" style="margin-top: 20px">
                                <span style="color:white">Logout</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
