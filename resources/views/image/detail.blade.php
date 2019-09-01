@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justifi-content-center">
        <div class="col-md-12">
            <div class="card pub_image pub_image_detail">
                <div class="card-header">
                     @if($image->user->image)
                        <div class="container_avatar">
                        <img src="{{ route('obtenerImagen',['filename'=>$image->user->image])}}" class="avatar" />
                         </div>
                    @endif
                        <div class="data-user">
                         <h1>{{$image->user->name.' '.$image->user->email}}</h1>
                        </div>
                         <div class="card-body">
                            <div class="image-container image-detail">
                                  <img src="{{ route('image.file',['filename'=> $image->image_path]) }}"/>
                            </div>

                            <div class="description">
                            <span class="date">{{FormatTime::LongTimeFilter($image->created_at)}}</span>
                                 <p> {{$image->description}}</p>
                             </div>
                            <div class="likes">
                                 <img src="{{asset('img/greyHeart.png')}}">
                             </div>
                            <div class="clearfix"></div>
                             <div class="comments">
                                <h2>Comentarios({{count($image->comments)}})</h2>
                                <hr>

                                 <form method="POST" action="{{ route('comment.save') }}">
                                   @csrf

                                <input type="hidden" name="image_id" value="{{$image->id}}"/>
                                 <p>
                                    <textarea class="form-control {{$errors->has('content') ? 'is-invalid' : ''}}" name="content" required></textarea>
                                        @if($errors->has('content'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$errors->first('content')}}</strong>
                                            </span>
                                         @endif
                                    </p>
                                    <button type="submit" class="btn btn-success">Enviar</button>
                                   </form>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </div>
</div>
        @endsection
