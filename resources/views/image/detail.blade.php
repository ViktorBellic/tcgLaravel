
     <div class="container">
            <div class="row justifi-content-center">
                <div class="col-md-10">
                    <div class="card pub_image">
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
                                    btn-sm btn-warning btn-comments">Comentarios()</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

