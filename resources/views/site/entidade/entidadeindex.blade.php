@extends('rodapesite')
@extends('basicosite')

@section('content')
    <div class="row entidadeindex">

        <div class="container">
            <div class="row">
                <a href="{{url('/entidade-site')}}" class="linkReturn">HOME</a>
            </div>
        </div>


        <div class="row escolhaCampanhaEvento">

            <a href="{{route('minhas-campanhas.create')}}" class="precadastrolink">
                <div class="row doarimg">
                    <h4 class="nomeopcao">Criar Campanha</h4>
                    {{--<p class="mensagemopcao">Ajude instituições com suprimentos</p>--}}
                </div>
            </a>

            <a href="{{route('meus-eventos.create')}}" class="precadastrolink">
                <div class="row cadastroimg">
                    <h4 class="nomeopcao">Criar Evento</h4>
                    {{--<p class="mensagemopcao">Cadastre sua entidade e receba auxílio</p>--}}
                </div>
            </a>
        </div>

        {{--<p class="row col-md-12 titulosPrincipais1"><a href="/enviar-email">Enviar E-mail</a></p>--}}

        <p class="row col-md-12 titulosPrincipais">Últimas Campanhas</p>

        <div class="row imgcampanhas">

            @foreach($campanhas as $campanha)
                <div class="row divcampanhas">
                    @if(!empty($campanha->imagens->count() > 0))
                        <img class="row imagemcampanhas" src="/{{$campanha->imagens[0]->caminho}}"
                             alt="Foto de perfil">
                    @else
                        <img class="row imagemcampanhas" src="{{ asset('imagens/campanhadestaque.png') }}"
                             alt="Imagem destaque">
                    @endif
                    <div class="col-6 row observacoescampanhas">
                        <h4 class="nomecampanhas">{{$campanha->nome}}</h4>
                        <h6 class="nomeentidadesite">Por: {{$campanha->users[0]->name}}</h6>
                        <p class="descricaocampanhas">{{$campanha->descricao}}</p>
                        <div class="row like">
                            <i class="far fa-thumbs-up"></i>
                            <p class="numlike">999</p>
                            <i class="far fa-thumbs-down"></i>
                            <p class="numlike">999</p>
                            <a href="{{route('minhas-campanhas.show', $campanha->id)}}" class="saibamaiscampanhas">Saiba
                                mais</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if($c > 4)
            <a href="{{url('/minhas-campanhas')}}" class="col-12 text-center add">Ver todos</a>
        @endif

        <p class="row col-md-12 titulosPrincipais">Últimos Eventos</p>

        <div class="row imgeventos">

            {{--@foreach($campanhas as $campanha)
                @foreach($campanha->eventos as $evento)
                    <div class="row diveventos">
                        <img class="row imagemeventos" src="{{ asset('imagens/campanhadestaque.png') }}"
                             alt="Imagem destaque">
                        <div class="col-6 row observacoeseventos">
                            <h4 class="nomeeventos">{{$evento->nome}}</h4>
                            <p class="dataeventos"><b>Dia: </b>{{$evento->dataHoraInicio}}</p>
                            <p class="descricaoeventos">{{$evento->descricao}}</p>
                            <a href="{{ route('evento.show', $evento->id) }}"
                               class=" align-content-end saibamaiseventos">Saiba
                                mais</a>
                        </div>
                    </div>
                @endforeach
            @endforeach--}}

            @foreach($campanhas as $campanha)
                @foreach($campanha->eventos as $evento)
                    <div class="row diveventos">
                        @if(!empty($evento->imagens->count() > 0))
                            <img class="row imagemcampanhas" src="/{{$evento->imagens[0]->caminho}}"
                                 alt="Foto de perfil">
                        @else
                            <img class="row imagemcampanhas" src="{{ asset('imagens/campanhadestaque.png') }}"
                                 alt="Imagem destaque">
                        @endif

                        <div class="col-6 row observacoeseventos">
                            <h4 class="nomeeventos">{{$evento->nome}}</h4>
                            <p class="dataeventos"><b>Dia: </b>{{$evento->dataHoraInicio}}</p>
                            <p class="descricaoeventos">{{$evento->descricao}}</p>
                            <a href=" {{route('meus-eventos.show', $evento->id)}} "
                               class=" align-content-end saibamaiseventos">Saiba
                                mais</a>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>


        <div class="row final">
            <div class="finalCurtidas">
                <p class="row col-md-12 titulosPrincipais">Curtidas <span id="qnt"
                                                                          style="font-size: 18px; font-weight: lighter; margin-left: 7px; margin-top: 7px">({{$numCur}}
                        )</span>
                </p>
                <div class="imgcurtidas">
                    @foreach($userCur as $u)
                        {{--{{dd($u->imagem)}}--}}
                        @if($u->imagem == null || $u->imagem == "")
                            <img class="imgperfilrefe" src="{{ asset('imagens/perfil.png') }}"
                                 alt="Foto de perfil">
                        @else
                            <img class="imgperfilrefe" src="{{ asset($u->imagem) }}"
                                 alt="Foto de perfil">
                        @endif
                    @endforeach
                    {{--<img class="imgperfilrefe" src="{{ asset('imagens/perfil.png') }}"
                         alt="Foto de perfil"></a>
                    <img class="imgperfilrefe" src="{{ asset('imagens/perfil.png') }}"
                         alt="Foto de perfil"></a>
                    <img class="imgperfilrefe" src="{{ asset('imagens/perfil.png') }}"
                         alt="Foto de perfil"></a>
                    <img class="imgperfilrefe" src="{{ asset('imagens/perfil.png') }}"
                         alt="Foto de perfil"></a>
                    <img class="imgperfilrefe" src="{{ asset('imagens/perfil.png') }}"
                         alt="Foto de perfil"></a>
                    <img class="imgperfilrefe" src="{{ asset('imagens/perfil.png') }}"
                         alt="Foto de perfil"></a>
                    <img class="imgperfilrefe" src="{{ asset('imagens/perfil.png') }}"
                         alt="Foto de perfil"></a>
                    <img class="imgperfilrefe" src="{{ asset('imagens/perfil.png') }}"
                         alt="Foto de perfil"></a>--}}

                </div>
            </div>

            <div class="finalComentarios">
                <p class="row col-md-12 titulosPrincipais">Comentários
                    <span id="qnt"
                          style="font-size: 18px; font-weight: lighter; margin-left: 7px; margin-top: 7px">({{$numCom}}
                        )</span>
                </p>
                @foreach($comentarios as $comentario)
                    <div class="rpts">
                        <div class="container">
                            <div class="row">
                                <div class="col rpt">
                                    <span class="nomerpts">{{$comentario->users->name}}</span>
                                    <span class="datarpts"> - {{$comentario->users->created_at->format('d/m/Y')}}</span>

                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="primletra">
                                {{$comentario->users->name[0]}}
                            </div>

                            <div class="col">
                                <div class="coments">{{$comentario->comentarios}}</div>
                                <hr>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


@endsection