@extends('home.inicio')
@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
            <div class="card">
                <div class="card-header">Configuracion de Mi Cuenta</div>

                <div class="card-body">
                    <form method="POST" action="{{route('actualizar')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">

                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Correo Electronico</label>

                        <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email}}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image_path" class="col-md-4 col-form-label text-md-right">Avatar</label>

                        <div class="col-md-6">

                        @if(Auth::user()->image)
                                <img src="{{ route('obtenerImagen',['filename'=>Auth::user()->image])}}" class="avatar" />
                        @endif
                                <input id="image_path" type="file" class="form-control @error('image_path') is-invalid @enderror" name="image_path">

                                @error('image_path')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Guardar Cambios
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
