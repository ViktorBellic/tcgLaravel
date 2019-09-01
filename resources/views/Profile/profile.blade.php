<!Doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!--Temporal--> <link rel="stylesheet" href="{{('css/styles.css')}}">
<script src="{{ asset('js/app.js') }}" defer></script>


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
                @foreach($images as $image)
                    <div class="card pub_image">
                        <div class="card-header">
                            @if($image->user->image)
                                <div class="container_avatar">
                                <img src="{{ route('obtenerImagen',['filename'=>$image->user->image])}}" class="avatar" />
                                </div>
                            @endif
                            <div class="data-user">
                                <a href="{{ route('image.detail', ['id' => $image->id])}}">
                                    <h1>{{$image->user->name.' '.$image->user->email.' '.$image->id_imagen}}</h1>
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="image-container">
                                    <img src="{{ route('image.file',['filename'=> $image->image_path]) }}"/>
                                </div>

                                <div class="description">
                                   <p> {{$image->description}}</p>
                                </div>
                                <div class="likes">
                                    <img src="{{asset('img/greyHeart.png')}}">
                                </div>
                                <div class="comments">
                                    <a href="" class="btn
                                    btn-sm btn-warning btn-comments">Comentarios({{count($image->comments)}})</a>
                                </div>
                            </div>

                        </div>
                    </div>
                 @endforeach
                <!--pagiacion -->
                <div class="clearfix"> </div>
                {{$images->links()  }}
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
