@extends('home.home')
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
                    <p>{{'Se unió:'.FormatTime::LongTimeFilter($user->created_at)}}</p>
                    <hr>
                </div>
                <div class="clearfix"></div>
                <hr>
            </div>
            <div class="clearfix"></div>
            @foreach($user->imagen as $image)
                @include('includes.image',['image'=>$image])
            @endforeach

        </div>
    </div>
</div>
@endsection
