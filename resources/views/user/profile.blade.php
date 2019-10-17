@extends('home.inicio')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                @include('includes.message')
            </div>
            <div class="profile-user">

                    @if($user->image)
                        <div class="container-avatar">
                        <img src="{{ route('obtenerImagen',['filename'=>$user->image])}}" class="avatar"/>
                        </div>
                    @endif
                <div class="user-info">
                    <h1>{{$user->name}}</h1>
                    <h2>{{$user->email}}</h2>
                    @if(Auth::user()->id == $user->id )
                    <h3><a href="{{route('edit')}}">Editar perfil</a></h3>
                    @endif
                    @if(!empty($friendrequest) && Auth::user()->id != $user->id )
                        @if($friendrequest=="Agregar")
                            <a href="{{url('/gente/add-friend',['username' =>$user->name])}}" styles="font-color:white;"class="btn btn-primary">{{$friendrequest}}</a>
                            <a href="{{url('/chat',['id' => $user->id])}}" styles="font-color:white;"class="btn btn-dark">Enviar mensaje</a>

                        @elseif($friendrequest=="Amigo(Eliminar amigo)")
                            <a href="{{url('/gente/remove-friend',['username' =>$user->name])}}" styles="font-color:white;"class="btn btn-warning">{{$friendrequest}}</a>
                            <a href="#" styles="font-color:white;"class="btn btn-dark">Enviar mensaje</a>
                        @else
                        <span class="btn btn-secondary">{{$friendrequest}}</span>
                        <a href="{{url('/chat',['id' => $user->id])}}" styles="font-color:white;"class="btn btn-dark">Enviar mensaje</a>
                        @endif
                    @endif

                    <p>{{'Se unió:'.FormatTime::LongTimeFilter($user->created_at)}}</p>
                    <hr>
                </div>
                <div class="clearfix"></div>
                <hr>
            </div>
            <div class="clearfix"></div>
            <div class="ops_user">
                <div class="row align-items-start">
                    <div class="col-4 col-md-4">
                        <h3><a class="btn btn-primary" href="{{route('image.create')}}">subir imagen</a></h3>
                    </div>
                    <div class="col-4 col-md-4">
                        <h3><a class="btn btn-primary" href="">Crear Mazo</a></h3>
                    </div>
                </div>
            </div>
            <hr>
            <div class="clearfix"></div>
            <!--Seccion de mazos del usuario-->
            <div class="card-group">
                <div class="card">
                    <div class="card-body">
                    <a href="#" data-toggle="modal" data-target="#exampleModal">
                    <img src="{{asset('img/img2.jpg')}}" class="card-img-top" alt="..."/>
                    </a>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <p class="card-text"><small class="text-muted">54 cartas</small></p>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                    </div>
                </div>
                </div>
                <div class="card">
                    <div class="card-body">
                    <a href="#" >
                    <img src="{{asset('img/img3.jpg')}}" class="card-img-top" alt="..."/>
                    </a>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <p class="card-text"><small class="text-muted">54 cartas</small></p>
                    </div>
                </div>
                <div class="card">

                    <div class="card-body">
                    <a href="#">
                    <img src="{{asset('img/img4.jpg')}}" class="card-img-top" alt="..."/>
                    </a>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <p class="card-text"><small class="text-muted">54 cartas</small></p>
                    </div>
                </div>
                <div class="card">

                    <div class="card-body">
                    <a href="#">
                    <img src="{{asset('img/img4.jpg')}}" class="card-img-top" alt="..."/>
                    </a>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <p class="card-text"><small class="text-muted">54 cartas</small></p>
                    </div>
                </div>
                </div>
                <!--Fin seccion de mazos del usuario-->


    <div class="card-columns">
            @foreach($user->imagen as $image)
            <div class="card">
            <div class="card-body">
                @include('includes.profileImage',['image'=>$image])
            </div>
            </div>
            @endforeach

    </div>

        </div>
    </div>
</div>
@endsection
