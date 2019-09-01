@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justifi-content-center">
        <div class="col-md-12">
            @include('includes.message')
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
                                    <hr>
                                @foreach($image->comments as $comment)
                                <hr>
                                <div class="comment">
                                        <span class="nickname">{{'@'.$comment->user->name}}</span>
                                        <span class="date">{{FormatTime::LongTimeFilter($comment->created_at)}}</span>
                                        <p> {{$comment->content}}<br/>
                                        @if(Auth::check() && ($comment->user_id == Auth::user()->id || $comment->image->id == Auth::user()->id))
                                            <a href="{{route('comment.delete',['id'=> $comment->id])}}" class="btn btn-sm btn-danger">
                                                Eliminar
                                            </a>
                                        @endif
                                        </p>
                                </div>
                                @endforeach
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </div>
</div>
        @endsection
