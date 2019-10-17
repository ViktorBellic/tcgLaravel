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