@extends('basicosite')
@section('content')
    <div class="row welcome">
        <div class="titlesite">
            Ajude as <br/>instituições <br/>de caridade <br/>em Pelotas
        </div>

        <div>
            <img class="imagemwelcome" src="{{ asset('imagens/imagem_welcome2.png') }}"
                 alt="Imagem Menino feliz">
        </div>
    </div>

    <div class="row imginstrucoes">
        <p class="row col-12 ">Como funciona?</p>
        <div class="row circulos">
            <img class="imagemcirculo" src="{{ asset('imagens/circulo.png') }}"
                 alt="circulos">
            <img class="imagemcirculo" src="{{ asset('imagens/circulo.png') }}"
                 alt="circulos">
            <img class="imagemcirculo" src="{{ asset('imagens/circulo.png') }}"
                 alt="circulos">
            <img class="imagemcirculo" src="{{ asset('imagens/circulo.png') }}"
                 alt="circulos">
        </div>
    </div>

@endsection
