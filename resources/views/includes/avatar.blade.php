@if(Auth::user()->image)
<div class="container_avatar">
    <img src="{{ route('obtenerImagen',['filename'=>Auth::user()->image])}}" class="avatar" />
</div>
                        @endif
