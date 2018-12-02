@extends('rodapesite')
@extends('basicosite')

@section('content')
    <div class="row usuarioindex">

        <div class="container">
            <div class="row">
                <a href="{{url('/usuario-site')}}" class="linkReturn">HOME</a>
            </div>
        </div>

        <p class="row col-md-12 titulosPrincipais">Principais Campanhas</p>

        <div class="row imgcampanhas">
            @if($num != 0)
                @foreach($campanhasInteressadas as $campanha)
                    <div class="row divcampanhas">
                        @if(!empty($campanha->imagens))
                            <img class="row imagemcampanhas" src="{{$campanha->imagens->caminho}}"
                                 alt="Foto de perfil">
                        @else
                            <img class="row imagemcampanhas" src="{{ asset('https://s3-sa-east-1.amazonaws.com/ajudequemajuda/geral/campanhas1.jpg') }}"
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
                                <a href="{{route('campanha.show', $campanha->id)}}" class="saibamaiscampanhas">Saiba
                                    mais</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            @else
                <p class="col-12 aviso1"> Você ainda não está seguindo nenhuma Campanha! :( </p>
            @endif
        </div>

        <p class="row col-md-12 titulosPrincipais">Últimas Campanhas</p>


        <div class="row imgcampanhas">

            @foreach($campanhas as $campanha)
                <div class="row divcampanhas">
                    @if(!empty($campanha->imagens))
                        <img class="row imagemcampanhas" src="{{$campanha->imagens->caminho}}"
                             alt="Foto de perfil">
                    @else
                        <img class="row imagemcampanhas" src="{{ asset('https://s3-sa-east-1.amazonaws.com/ajudequemajuda/geral/campanhas1.jpg') }}"
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
                            <a href="{{route('campanha.show', $campanha->id)}}" class="saibamaiscampanhas">Saiba
                                mais</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <p class="row col-md-12 titulosPrincipais">Últimos Eventos</p>

        <div class="row imgeventos">

            <div class="row imgeventos">

                @foreach($eventos as $evento)
                    <div class="row diveventos">
                        {{--{{dd($evento)}}--}}
                        @if(!empty($evento->imagens))
                            <img class="row imagemcampanhas" src="{{$evento->imagens->caminho}}"
                                 alt="Foto de perfil">
                        @else
                            <img class="row imagemcampanhas" src="{{ asset('https://s3-sa-east-1.amazonaws.com/ajudequemajuda/geral/eventos1.jpg') }}"
                                 alt="Imagem destaque">
                        @endif

                        <div class="col-6 row observacoeseventos">
                            <h4 class="nomeeventos">{{$evento->nome}}</h4>
                            <p class="dataeventos"><b>Dia: </b>{{$evento->dataHoraInicio}}</p>
                            <p class="descricaoeventos">{{$evento->descricao}}</p>
                            <a href="{{ route('evento.show', $evento->id) }}"
                               class=" align-content-end saibamaiseventos">Saiba mais</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection