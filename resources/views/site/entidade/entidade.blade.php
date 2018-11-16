@extends('rodapesite')
@extends('basicosite')

@section('content')

    <div class="text-center returnsite"><span class="homelinkreturn">HOME / </span><a href="{{url('/site/entidades')}}"
                                                                                      class="linkReturn">ENTIDADES</a>
    </div>

    <div class="row siteentidade">

        <div class="row diventidade">
            @if($registro->imagem)
                <img class="row imagemcampanhas" src="/{{$registro->imagem}}"
                     alt="Foto de perfil">
            @else
                <img class="row imagemcampanhas" src="{{ asset('imagens/campanhadestaque.png') }}"
                     alt="Imagem destaque">
            @endif

            <div class="row observacoesentidade">
                <h4 class="nomeentidade">{{$registro->name}}</h4>
                <div class="localhora">
                    <div>
                        <p class="local">Local:</p>
                        <p class="localentidade">{{$registro->endereco->rua}}, {{$registro->endereco->numero}}
                            - {{$registro->endereco->bairro}}</p>
                    </div>
                </div>
                <p class="descricaoentidade">{{$registro->descricao_entidade}}</p>
                <div class="row like">

                    {{--@auth
                        @if($tr == 0)
--}}

                    <a href="{{route('curtir-entidade', $registro->id)}}" class="far fa-thumbs-up"
                       style="color: black"></a>
                    <p class="numlike">999</p>
                    {{--<i class="far fa-thumbs-down"></i>
                    <p class="numlike">999</p>--}}
                    <div class="fb-share-button" data-href="http://ajudequemajudapelotas.herokuapp.com"
                         data-layout="button" data-size="large" data-mobile-iframe="false"><a target="_blank"
                                                                                              href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse"
                                                                                              class="fb-xfbml-parse-ignore">Compartilhar</a>
                    </div>
                </div>
            </div>
        </div>

        <p class="row col-md-12 titulosPrincipais">Campanhas ativas</p>


        <div class="campanhasentidade">
            @foreach($registroCampanhas as $r)
                <div class="camp">
                    <p class="campnome">{{$r->nome}}</p>
                    <p class="campdescricao">{{$r->descricao}}</p>
                    <a href="{{ url('site/campanha') }}" class="saibamaisentidades">Saiba mais</a>
                </div>
            @endforeach
        </div>

        <p class="row col-md-12 titulosPrincipais">Eventos ativos</p>

        <div class="eventosentidade">
            @foreach($registroCampanhas as $r)
                @foreach($r->eventos as $e)
                    <div class="event">
                        <p class="eventnome">{{$e->nome}}</p>
                        <p class="eventdescricao">{{$e->descricao}}</p>
                        <a href="{{ route('evento.show', $e->id) }}" class="saibamaisentidades">Saiba mais</a>
                    </div>
                @endforeach
            @endforeach
        </div>

        <p class="row col-md-12 titulosPrincipais">Deixe seu comentário sobre a entidade</p>

        <form class="row formescrevercomentario" method="post" action="{{route('comentar-entidade', $registro->id)}}">
            {{ csrf_field() }}

            <div class="container">
                <div class="row">

                    <div class="form-group primletra">
                        {{$primeiraLetraNome}}
                    </div>

                    <div class="form-group col">
                        <textarea id="comentarios" rows="4" class="form-control"
                                  placeholder="Escreva sua mensagem..."
                                  name="comentarios"></textarea>
                    </div>
                    <div name="entidade" style="display: none">{{$registro->id}}</div>
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-end">
                    &nbsp;&nbsp;&nbsp;<button type="submit" class="btn com">COMENTAR</button>
                </div>
            </div>
        </form>

        @foreach($comentarios as $comentario)

            <div class="rpts">
                <div class="container">
                    <div class="row">
                        <div class="col rpt">
                            @foreach($nomes as $nome)
                                <span class="nomerpts">{{$nome->name}}</span><span
                                        class="datarpts"> - {{$nome->getDataComentarioAttribute()}}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="primletra">
                        @foreach($nomes as $nome)
                        {{$nome->name[0]}}
                        @endforeach
                    </div>

                    <div class="col">
                        <div class="coments">{{$comentario->comentarios}}</div>
                    </div>
                </div>

                <hr>
            </div>
        @endforeach


        {{--<div class="rpts">
            <div class="container">
                <div class="row">
                    <div class="col rpt">
                        <span class="nomerpts">Nome </span><span class="datarpts"> - data</span>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="primletra">
                    R
                </div>

                <div class="col">
                    <div class="coments">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus a leo eu
                        nisi cursus auctor. Pellentesque in scelerisque sem, ac mollis tellus. Duis porttitor ultricies
                        arcu a dignissim. Cras in libero eu sapien egestas commodo nec in quam. Vivamus eget suscipit
                        purus. Quisque tincidunt metus vitae gravida posuere. Donec facilisis, elit eu tincidunt semper,
                        nulla erat commodo nisi, ut malesuada mi risus in libero. Suspendisse condimentum ut erat a
                        condimentum.
                    </div>
                </div>
            </div>

            <hr>
        </div>--}}

    </div>




    {{--Js de compartilhamento do facebook--}}
    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.1&appId=2191446141141309&autoLogAppEvents=1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

@endsection
