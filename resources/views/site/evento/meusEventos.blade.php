@extends('rodapesite')
@extends('basicosite')

@section('content')

    <div class="row sitecampanhas">
        <a href="{{url('/entidade-site')}}" class="linkReturn">HOME</a>
        <p class="row col-md-12 titulosPrincipais">Meus Eventos</p>

        <div class="row imgeventos">

            @foreach($campanhas as $campanha)
                @foreach($campanha->eventos as $evento)
                    @if($evento->status == 1)
                        <div class="row diveventos">
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
                                <a href=" {{route('meus-eventos.show', $evento->id)}} "
                                   class=" align-content-end saibamaiseventos">Saiba
                                    mais</a>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>


    </div>







@endsection
