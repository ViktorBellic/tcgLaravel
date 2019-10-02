@extends('home.inicio')

@section('content')
<div class="container">
    <div class="row justify-content-center">
     <div class="col-md-8">
     <div class="card pub_image">
        <h1 class="fav_h1">Mis imagenes favoritas</h1>
        <hr>
        @foreach($likes as $like)
            @include('includes.image',['image'=>$like->image])
        @endforeach
        <!--paginacion -->
        <div class="clearfix"> </div>
         {{$likes->links()  }}
     </div>
</div>
    </div>
</div>
@endsection
