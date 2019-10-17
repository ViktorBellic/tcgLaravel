<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="{{ asset('css/styles.css')}}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="{{asset('css/fontello.css')}}">


<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/main.js') }}" ></script>
<script src="https://js.pusher.com/5.0/pusher.min.js"></script>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/d9d4e999e5.js" crossorigin="anonymous"></script>
<title>TCG.GG</title>
</head>
<body>
    <header>
    <style>
  .chat {
    list-style: none;
    margin: 0;
    padding: 0;
  }

  .chat li {
    margin-bottom: 10px;
    padding-bottom: 5px;
    border-bottom: 1px dotted #B3A9A9;
  }

  .chat li .chat-body p {
    margin: 0;
    color: #777777;
  }

  .panel-body {
    overflow-y: scroll;
    height: 350px;
  }

  ::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
  }

  ::-webkit-scrollbar {
    width: 12px;
    background-color: #F5F5F5;
  }

  ::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
  }
</style>
    <!---<div class="header_section">
        <div class="logo_P">logo

         <img src="{{('../img/logo.png')}}"class="img-fluid" alt="Responsive image">
        </div>
        <div class="avatar">
           <h1 class="icon-user">

        </div>
    </div>
-->
    <!-- ================ MENU=================-->
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <a class="navbar-brand" style="color:white;">TC.GG</a>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item "> <!--Icono Home--->
                    <a class="nav-link" href="{{url('/home')}}"><i class="fas fa-home fa-lg" ></i> <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item "> <!--Icono Perfil-->
                    <a class="nav-link" href="{{route('profile',['id'=>Auth::user()->id])}}"><i class="fas fa-user-circle fa-lg"></i><span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item"> <!--Icono Favoritos-->
                    <a class="nav-link" href="{{route('likes')}}"><i class="fas fa-bookmark fa-lg"></i></a>
                </li>
                <li class="nav-item"> <!--Icono Carpeta o BLinder-->
                    <a class="nav-link " href="{{url('/chat')}}" tabindex="-1" aria-disabled="true"><i class="fas fa-book fa-lg"><span class="badge">1</i></a>
                </li>
                <li class="nav-item"> <!--Icono Buscador-->
                    <a class="nav-link " href="{{route('users.index')}}" tabindex="-1" aria-disabled="true"><i class="fas fa-search fa-lg"></i></a>
                </li>
                </ul>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->

                    <ul class="navbar-nav ml-auto">
                            <li><a href="{{url('/friends-requests')}}">Notificaciones<span class="badge">1</span></a></li>
                            <li><a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a></li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                    </ul>
                </div>
               <!-- <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>-->
            </div>
        </nav>
     </div>



        <main class="py-4" id="app">
        @yield('content')
        </main>
    <!-- <div id="app">

        </div>-->
    </header>
    <footer>
    </footer>
</body>
</html>
