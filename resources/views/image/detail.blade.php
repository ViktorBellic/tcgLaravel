@extends('home.inicio')

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
                                <!--Comprobar si un usuario le dio like a una imagen-->
                                <?php $user_like = false; ?>

                                    @foreach($image->likes as $like)
                                        @if($like->user->id == Auth::user()->id)
                                        <?php $user_like = true; ?>
                                        @endif
                                    @endforeach

                                    @if($user_like)
                                    <img src="{{asset('img/redHeart.png')}}" data-id="{{$image->id}}"class="btn-dislike">
                                    @else
                                    <img src="{{asset('img/greyHeart.png')}}" data-id ="{{$image->id}}" class="btn-like">
                                    @endif
                                   <span class="number_likes"> {{count($image->likes)}}</span>
                             </div>
                            @if(Auth::user() && Auth::user()->id==$image->user->id)
                                <div class="actions">
                                    <a href="{{route('image.edit',['id'=>$image->id])}}" class="btn btn-sm btn-primary">Actualizar</a>

                                    <!-- Button to Open the Modal -->
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal">
                                        eliminar
                                        </button>

                                        <!-- The Modal -->
                                        <div class="modal" id="myModal">
                                        <div class="modal-dialog">
                                             <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">¿Esta seguro?</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                Si eliminas esta imagen ya no podras recuperarla, ¿Estas seguro de querer borrarla?
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                                                <a href="{{route('image.delete',['id'=>$image->id])}}" class="btn  btn-danger">Borrar Definitivamente</a>
                                            </div>

                                            </div>
                                        </div>
                                        </div>
                                </div>
                            @endif
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
