@extends('inicio')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                @include('includes.message')
            </div>
            @foreach($images as $image)
                @include('includes.image',['image'=>$image])
            @endforeach
                        <!--pagiacion -->
                        <div class="clearfix"> </div>
                        {{$images->links()  }}
        </div>
    </div>
</div>
@endsection
