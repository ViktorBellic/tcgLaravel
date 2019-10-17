<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>TCG</title>
    <!-- Estilos -->
    <link href="{{ asset('estilos/assets/.bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('estilos/assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('estilos/assets/fonts/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('estilos/assets/css/Footer-Basic.css') }}">
    <link rel="stylesheet" href="{{ asset('estilos/assets/css/Footer-Dark.css') }}">
    <link rel="stylesheet" href="{{ asset('estilos/assets/css/Login-Form-Clean.css')}}">
    <link rel="stylesheet" href="{{ asset('estilos/assets/css/Navigation-with-Button.css')}}">
    <link rel="stylesheet" href="{{ asset('estilos/assets/css/Registration-Form-with-Photo.css')}}">
    <link rel="stylesheet" href="{{ asset('estilos/assets/css/styles.css')}}">

</head>

<body>

        <div>
                <nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
                    <div class="container"><a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('estilos/assets/img/Logo.png')}}" style="width: 123px;"></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                        @guest
                        <div
                            class="collapse navbar-collapse" id="navcol-1">
                            <ul class="nav navbar-nav mr-auto"></ul><span class="navbar-text actions"> <a class="login" href="{{ route('login') }}">{{ __('Log In') }}</a>
                        @if (Route::has('register'))
                            <a class="btn btn-light action-button" role="button" href="{{ route('register') }}">{{ __('Regístrate!') }}</a></span>
                        @endif
                        @endguest
                        </div>
            </div>
            </nav>
            </div>
    <main>
    @yield('content')
</main>
    <script src="{{ asset('estilos/assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('estilos/assets/bootstrap/js/bootstrap.min.js')}}"></script>
</body>

</html>