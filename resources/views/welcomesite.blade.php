@extends('basicosite')
@section('content')
    <div class="row welcome">
        <div class="titlesite">
            Ajude as <br/>instituições <br/>de caridade <br/>em Pelotas
        </div>

        <div class="">
        <img class="imagemwelcome" src="{{ asset('imagens/imagem_welcome2.png') }}"
                   alt="Imagem Menino feliz">
        </div>
    </div>
    <div class="row instrucoes">
        <p class="align-middle">Como funciona?</p>
    </div>
    <div class="row instrucoes2">
        <img class="imagemwelcome" src="{{ asset('imagens/imagem_welcome2.png') }}"
             alt="Imagem Menino feliz">
    </div>
@endsection
