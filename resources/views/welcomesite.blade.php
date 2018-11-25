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
            <div class="circulobloco">
                <div class="cir">
                    <img class="imagemcirculo" src="{{ asset('imagens/circulo.png') }}"
                         alt="circulos">
                    <img class="imageminstrucao" src="{{ asset('imagens/1.png') }}"
                         alt="instrucao">
                </div>
                <div class="num">
                    <p>01</p>
                </div>
                <p class="ins">Cadastre-se para
                    doar ou receber
                    doações (caso seja
                    uma instituição)</p>
            </div>

            <div class="circulobloco">
                <div class="cir">
                    <img class="imagemcirculo" src="{{ asset('imagens/circulo.png') }}"
                         alt="circulos">
                    <img class="imageminstrucao" src="{{ asset('imagens/2.png') }}"
                         alt="instrucao">
                </div>
                <div class="num">
                    <p>02</p>
                </div>
                <p class="ins">Acompanhe as campanhas,
                    eventos. Caso seja instituição,
                    cadastre seus eventos e
                    suas necessidades</p>
            </div>

            <div class="circulobloco">
                <div class="cir">
                    <img class="imagemcirculo" src="{{ asset('imagens/circulo.png') }}"
                         alt="circulos">
                    <img class="imageminstrucao" src="{{ asset('imagens/3.png') }}"
                         alt="instrucao">
                </div>
                <div class="num">
                    <p>03</p>
                </div>
                <p class="ins">Escolha o que pode doar e envie através
                    do painel de controle</p>
            </div>

            <div class="circulobloco">
                <div class="cir">
                    <img class="imagemcirculo" src="{{ asset('imagens/circulo.png') }}"
                         alt="circulos">
                    <img class="imageminstrucao" src="{{ asset('imagens/4.png') }}"
                         alt="instrucao">
                </div>
                <div class="num">
                    <p>04</p>
                </div>
                <p class="ins">Faça alguém sorrir</p>
            </div>
        </div>
        <div class="row imginstrucoes">


        </div>
    </div>

    <div class="row sitedestaques">
        <p class="row col-md-12 titulodestaques">Últimas Campanhas</p>
        <div class="row imgdestaques">

            @foreach($campanhas as $campanha)

                <div class="row divdestaques">
                    @if(!empty($campanha->imagens->count() > 0))
                        <img class="row imagemcampanhas" src="/{{$campanha->imagens[0]->caminho}}"
                             alt="Foto de perfil">
                    @else
                        <img class="row imagemcampanhas" src="{{ asset('imagens/campanhadestaque.png') }}"
                             alt="Imagem destaque">
                    @endif
                    <div class="col-6 row observacoes">
                        <h4 class="nomecampanhadestaque">{{$campanha->nome}}</h4>
                        {{--<h6 class="nomeentidadesite">Por: </h6>--}}
                        {{--{{dd($campanha->users[0]->name)}}--}}
                        <h6 class="nomeentidadesite">Por: {{$campanha->users[0]->name}}</h6>
                        <p class="descricaocampanhadestaque">{{$campanha->descricao}}</p>
                        <a href="{{route('campanha.show', $campanha->id)}}"
                           class=" align-content-end saibamaiscampanhadestaque">Saiba mais</a>
                    </div>
                </div>

            @endforeach


            {{--<div class="row divdestaques">
                <img class="row imagemdestaque" src="{{ asset('imagens/campanhadestaque.png') }}" alt="Imagem destque">
                <div class="col-6 row observacoes">
                    <h4 class="nomecampanhadestaque">Campanha 1</h4>
                    <h6 class="nomeentidadesite">Por: Entidade 0</h6>
                    <p class="descricaocampanhadestaque">Lorem ipsum dolor sit amet, con...</p>
                    <a href="#" class=" align-content-end saibamaiscampanhadestaque">Saiba mais</a>
                </div>
            </div>

            <div class="row divdestaques">
                <img class="row imagemdestaque" src="{{ asset('imagens/campanhadestaque.png') }}" alt="Imagem destque">
                <div class="col-6 row observacoes">
                    <h4 class="nomecampanhadestaque">Campanha 1</h4>
                    <h6 class="nomeentidadesite">Por: Entidade 0</h6>
                    <p class="descricaocampanhadestaque">Lorem ipsum dolor sit amet, con...</p>
                    <a href="#" class=" align-content-end saibamaiscampanhadestaque">Saiba mais</a>
                </div>
            </div>--}}
        </div>
    </div>



@endsection
