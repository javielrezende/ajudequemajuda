@extends('rodapesite')
@extends('basicosite')

@section('content')

    <div class="text-center returnsite"><span class="homelinkreturn">HOME / </span><a href="{{url('/site/campanhas')}}"
                                                                                      class="linkReturn">CAMPANHAS</a>
    </div>

    <div class="row sitecampanha">

        <div class="row divcampanha">
            @if(!empty($registro->imagens->count() > 0))
                <img class="row imagemcampanhas" src="/{{$registro->imagens[0]->caminho}}"
                     alt="Foto de perfil">
            @else
                <img class="row imagemcampanhas" src="{{ asset('imagens/campanhadestaque.png') }}"
                     alt="Imagem destaque">
            @endif

            <div class="row observacoescampanha">
                <h4 class="nomecampanha">{{$registro->nome}}</h4>
                <div class="localhora">
                    <div>
                        <p class="local">Local:</p>
                        <p class="localcampanha">{{$registro->users[0]->endereco->rua}}
                            , {{$registro->users[0]->endereco->numero}} - {{$registro->users[0]->endereco->bairro}}</p>
                    </div>
                    <div>
                        <p class="hora">Data Final:</p>
                        <p class="horacampanha">{{$registro->dataFim}}</p>
                    </div>
                </div>
                <p class="descricaocampanha">{{$registro->descricao}}</p>
                <div class="row like">
                    @auth
                        @if($curtida == 0 || $curtida == null)
                            <a href="{{route('curtir-campanha', $registro->id)}}" class="far fa-thumbs-up"
                               style="color: black"></a>
                        @endif
                        @if($curtida == 1)
                            <a href="{{route('curtir-campanha', $registro->id)}}" class="fas fa-thumbs-up"></a>
                        @endif
                        @else
                            <a href="{{route('curtir-campanha', $registro->id)}}" class="far fa-thumbs-up"
                               style="color: black"></a>
                            @endauth
                            <p class="numlike">{{$registro->num}}</p>
                            {{--<i class="far fa-thumbs-down"></i>--}}
                            <p class="numlike">{{$c}}</p>
                            <div class="fb-share-button" data-href="http://ajudequemajudapelotas.herokuapp.com"
                                 data-layout="button" data-size="large" data-mobile-iframe="false"><a target="_blank"
                                                                                                      href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse"
                                                                                                      class="fb-xfbml-parse-ignore">Compartilhar</a>
                            </div>
                </div>
                <div class="row opcoescampanha">
                    @auth
                        @if($seguindo == 0 || $seguindo == null)
                            <a href="{{route('seguir-campanha', $registro->id)}}" class="col seguircampanha">SEGUIR</a>
                        @endif
                        @if($seguindo == 1)
                            <a href="{{route('seguir-campanha', $registro->id)}}" class="col seguircampanha">DEIXAR DE
                                SEGUIR</a>
                        @endif
                        @else
                            <a href="{{route('seguir-campanha', $registro->id)}}" class="col seguircampanha">SEGUIR</a>
                            @endauth
                            <a href="#" class="col doarcampanha">DOAR</a>
                </div>
            </div>
        </div>
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
