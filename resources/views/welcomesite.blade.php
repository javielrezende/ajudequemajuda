@extends('rodapesite')
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

    <div class="row instrucoes">
        <p class="row col-12 ">Como funciona?</p>
        <div class="row circulos">
            <img class="imagemcirculo" src="{{ asset('imagens/circulo.png') }}"
                 alt="circulos"  >
            <img class="imagemcirculo" src="{{ asset('imagens/circulo.png') }}"
                 alt="circulos">
            <img class="imagemcirculo" src="{{ asset('imagens/circulo.png') }}"
                 alt="circulos">
            <img class="imagemcirculo" src="{{ asset('imagens/circulo.png') }}"
                 alt="circulos">
        </div>
        <div class="row imginstrucoes">
            <img class="imageminstrucao" src="{{ asset('imagens/1.png') }}"
                 alt="instrucao">
            <img class="imageminstrucao" src="{{ asset('imagens/2.png') }}"
                 alt="instrucao">
            <img class="imageminstrucao" src="{{ asset('imagens/3.png') }}"
                 alt="instrucao">
            <img class="imageminstrucao" src="{{ asset('imagens/4.png') }}"
                 alt="instrucao">
        </div>
    </div>

    <div class="row sitedestaques">
        <p class="row col-12 titulodestaques">Campanhas em destaque</p>
        <div class="row imgdestaques">
            <div class="row col-6 divdestaques">
                <div class="imagemdestaque"></div>
                <h4 class="nomecampanhadestaque">Campanha 1</h4>
                <p class="datacampanhadestaque"> 22/03/2018 </p>
                <p class="descricaocampanhadestaque"> Lorem ipsum dolor sit amet, con... </p>
                <p class="saibamaiscampanhadestaque"> Saiba mais</p>
            </div>
        </div>
    </div>



@endsection
