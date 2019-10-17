@extends('layouts.app')

@section('content')
<div class="login-clean">
        <form method="POST" action="{{ route('login') }}">
             @csrf
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><img src="{{ asset('estilos/assets/img/Logo.png')}}" style="width: 235px;"></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Correo Electrónico"  data-validate="El correo es requerido"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Contraseña" data-validate="Password is required"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Log In</button>
            </div>
            @if (Route::has('password.request'))
                <a href=""{{ route('password.request') }}" class="forgot">¿Olvidaste tu contraseña?</a>
            
            @endif
        </form>
    </div>
@include('layouts.footer')
@endsection
