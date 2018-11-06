@extends('rodapesite')
@extends('basicosite')

@section('content')

    <div class="row sitecampanhas">
        <a href="{{url('/entidade-site')}}" class="linkReturn">HOME</a>
        <p class="row col-md-12 titulosPrincipais">Meus Eventos</p>

        <div class="row imgeventos">

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


    </div>







@endsection
