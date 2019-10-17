@extends('layouts.app')
@section('content')
<div>
        <div class="carousel slide" data-ride="carousel" id="slider-1">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active"><img class="w-100 d-block" src="{{ asset('estilos/assets/img/elesh.jpg')}}" alt="Slide Image">
                    <div id="slide1" style="height: 210px;">
                        <div class="jumbotron" style="padding: 30px;">
                            <h1><strong>Bienvenido a TC.GG</strong></h1>
                            <p>La red social N°1 de Juegos de Cartas Coleccionables!</p>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item"><img class="w-100 d-block" src="{{ asset('estilos/assets/img/xenagos.jpg')}}" alt="Slide Image">
                    <div id="slide1" style="height: 210px;">
                        <div class="jumbotron" style="padding: 30px;">
                            <h1><strong>Bienvenido a TC.GG</strong></h1>
                            <p>La red social N°1 de Juegos de Cartas Coleccionables!</p>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item"><img class="w-100 d-block" src="{{ asset('estilos/assets/img/XrIPH0W.jpg')}}" alt="Slide Image">
                    <div id="slide1" style="height: 210px;">
                        <div class="jumbotron" style="padding: 30px;">
                            <h1><strong>Bienvenido a TC.GG</strong></h1>
                            <p>La red social N°1 de Juegos de Cartas Coleccionables!</p>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
            <div><a class="carousel-control-prev" href="#slider-1" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#slider-1" role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
            <ol
                class="carousel-indicators" style="height: -7px;">
                <li data-target="#slider-1" data-slide-to="0" class="active"></li>
                <li data-target="#slider-1" data-slide-to="1"></li>
                <li data-target="#slider-1" data-slide-to="2"></li>
                </ol>
        </div>
    </div>
    @include('layouts.footer')
    @endsection