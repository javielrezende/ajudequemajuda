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
            <div class="cir"><img class="imagemcirculo" src="{{ asset('imagens/circulo.png') }}"
                                  alt="circulos"><img class="imageminstrucao" src="{{ asset('imagens/1.png') }}"
                                                      alt="instrucao"></div>
            <div class="num"><p>1</p></div>

            <div class="cir"><img class="imagemcirculo" src="{{ asset('imagens/circulo.png') }}"
                                  alt="circulos"><img class="imageminstrucao" src="{{ asset('imagens/2.png') }}"
                                                      alt="instrucao"></div>
            <div class="num"><p>2</p></div>

            <div class="cir"><img class="imagemcirculo" src="{{ asset('imagens/circulo.png') }}"
                                  alt="circulos"><img class="imageminstrucao" src="{{ asset('imagens/3.png') }}"
                                                      alt="instrucao"></div>
            <div class="num"><p>3</p></div>

            <div class="cir"><img class="imagemcirculo" src="{{ asset('imagens/circulo.png') }}"
                                  alt="circulos"><img class="imageminstrucao" src="{{ asset('imagens/4.png') }}"
                                                      alt="instrucao"></div>
            <div class="num"><p>4</p></div>
        </div>
        <div class="row imginstrucoes">


        </div>
    </div>

    <div class="row sitedestaques">
        <p class="row col-md-12 titulodestaques">Campanhas em destaque</p>
        <div class="row col-6 imgdestaques">
            <div class="row divdestaques">
                <img class="row imagemdestaque" src="{{ asset('imagens/campanhadestaque.png') }}" alt="Imagem destque">
                <div class="col-6 row observacoes">
                    <h4 class="nomecampanhadestaque">Campanha 1</h4>
                    <p class="datacampanhadestaque">22/03/2018</p>
                    <p class="descricaocampanhadestaque">Lorem ipsum dolor sit amet, con...</p>
                    <a href="#" class=" align-content-end saibamaiscampanhadestaque">Saiba mais</a>
                </div>
            </div>

            <div class="row divdestaques">
                <img class="row imagemdestaque" src="{{ asset('imagens/campanhadestaque.png') }}" alt="Imagem destque">
                <div class="col-6 row observacoes">
                    <h4 class="nomecampanhadestaque">Campanha 1</h4>
                    <p class="datacampanhadestaque">22/03/2018</p>
                    <p class="descricaocampanhadestaque">Lorem ipsum dolor sit amet, con...</p>
                    <a href="#" class=" align-content-end saibamaiscampanhadestaque">Saiba mais</a>
                </div>
            </div>
        </div>
    </div>



@endsection
