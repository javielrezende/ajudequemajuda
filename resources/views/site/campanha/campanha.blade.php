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
                            <a style="cursor: pointer;" class="col doarcampanha" data-toggle="modal"
                               data-target="#modalDoacaoCenter">DOAR </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalDoacaoCenter" tabindex="-1" role="dialog"
         aria-labelledby="modalEmailCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form class="" method="post" action="{{route('doar.store')}}">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <h6 class="modal-title" id="modalEmailCenterTitle">Faça a sua doação &nbsp&nbsp :)</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">


                        <div class="container">
                            <div class="row">
                                <div class="form-group col">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th scope="col">Ítens</th>
                                            <th scope="col" class="ur">Quantidade</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($registro->itens as $item)
                                            <tr>
                                                <td>{{$item->descricaoItem}}</td>
                                                <td><i class="fas fa-minus verde"></i></td>
                                                <td class="ch">
                                                <span>
                                                0
                                                </span>
                                                    <input type="hidden" id="idModal" name="descricaoItem[]"
                                                           value="{{$item->descricaoItem}}">
                                                    <input type="hidden" id="quantidadeModal" name="quantidade[]"
                                                           class="qtd">
                                                    <input type="hidden" name="campId" value="{{$registro->id}}">

                                                </td>
                                                <td><i class="fas fa-plus vermelho"></i></td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn addS" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn addB">Doar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--Fim Modal--}}


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
