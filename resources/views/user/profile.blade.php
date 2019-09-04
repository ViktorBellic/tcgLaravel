<!Doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!--Temporal--> <link rel="stylesheet" href="{{('css/styles.css')}}">
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/main.js') }}" ></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
<title>TCG.GG</title>
</head>
<body>
 <span>
     <form></form>
     <section>
       <main>
        <div><!--=== Aqui va, foto del usuaroi, configuraciones,desc y cartas=====-->
         <header>
             <div class="av_section">@include('includes.avatar')</div>
             <div><a href="{{ route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        >Cerrar sesión</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></div>
             <section>
                 <div><!--configuraciones-->
                    <h1>{{ Auth::user()->name }}</h1>
                    <div>Configuracion</div>
                 </div>
                 <div><a href="{{route('edit')}}">Editar Perfil</a></div>
             </section>
         </header>
         <!--fin de foto y configuraciones -->
         <!--Sección de Descripción del usuario-->
         <div>
             <h1>Ricardo </h1>
             <br>
             <span>asdasdasdasdsadassadasdas</span>
         </div>
         <!--Fin de sección de descripción de usuario-->
         <!--Sección de cartas prioridad para el usario-->
         <div>
             @include('includes.message')
            <div>
                <h1><a href="{{route('image.create')}}">subir imagen</a></h1>

                <ul>
                    <li>Carta1</li>
                    <li>Carta2</li>
                    <li>Carta3</li>

                </ul>
            </div>
         </div><!--Fin de sección de cartas Prioridad-->
        </div>
       </main>
     </section>
 </span>


</body>
</html>
