
    <div class="login-clean" method="POST" action="{{ route('login') }}">
        @csrf
        <form method="post">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><img src="assets/img/Logo.png" style="width: 235px;"></div>
             data-validate="Username is required
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"  data-validate="El correo es requerido"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" data-validate="Password is required"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Log In</button>
            </div>
            @if (Route::has('password.request'))
                <a href=""{{ route('password.request') }}" class="forgot">¿Olvidaste tu contraseña?</a>
            
            @endif
        </form>
    </div>
    