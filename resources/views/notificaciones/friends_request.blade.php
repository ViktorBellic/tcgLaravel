@extends('home.inicio')
@section('content')
<br/>
<br/>
<br/>

@foreach($friendsRequests as $frequest)

    @foreach($users as $user)
        @if($frequest->user_id == $user->id && $frequest->accept == 0)

             <div class="profile-user">

                @if($user->image)
                    <div class="container-avatar">
                    <img src="{{ route('obtenerImagen',['filename'=>$user->image])}}" class="avatar"/>
                    </div>
                @endif

                <div class="user-info">
                <h2>{{$user->name}}</h2>
                <h3>{{$user->email}}</h3>
                <p>{{'Se unió:'.FormatTime::LongTimeFilter($user->created_at)}}</p>
                <p><a href="{{route('profile',['id' => $user->id])}}"> Ver perfil</a></p>
                <a href="{{url('/accept-friend-request',['id' => $user->id])}}" class="btn btn-success  btn-sm">Aceptar </a>
                <a href="{{url('/reject-friend-request',['id' => $user->id])}}" class="btn btn-danger  btn-sm">Rechazar </a>
                <a href="" styles="font-color:white;"class="btn btn-primary  btn-sm"> Seguir</a>
                <hr>
                </div>
                <div class="clearfix"></div>
                <hr>
                </div>
             @endif
            @endforeach

@endforeach
<br/>
@endsection
