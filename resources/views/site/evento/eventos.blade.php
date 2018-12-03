@extends('rodapesite')
@extends('basicosite')

@section('content')

    <div class="row siteeventos">
        <a href="{{url('/aqa')}}" class="linkReturn">HOME</a>
        <p class="row col-md-12 titulosPrincipais">Eventos</p>

        <div class="col-md-12">
            @if (count($errors) > 0)
                <div class="alert alert-info">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>


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
                    <a href="{{ route('evento.show', $evento->id) }}" class=" align-content-end saibamaiseventos">Saiba mais</a>
                </div>
            </div>
            @endforeach


            {{--<div class="row diveventos">
                <img class="row imagemeventos" src="{{ asset('imagens/campanhadestaque.png') }}"
                     alt="Imagem destque">
                <div class="col-6 row observacoeseventos">
                    <h4 class="nomeeventos">Evento 1</h4>
                    <p class="dataeventos">22/03/2018</p>
                    <p class="descricaoeventos">Lorem ipsum dolor sit amet, con...</p>
                    <a href="{{ url('site/evento') }}" class=" align-content-end saibamaiseventos">Saiba mais</a>
                </div>
            </div>

            <div class="row diveventos">
                <img class="row imagemeventos" src="{{ asset('imagens/campanhadestaque.png') }}"
                     alt="Imagem destque">
                <div class="col-6 row observacoeseventos">
                    <h4 class="nomeeventos">Evento 1</h4>
                    <p class="dataeventos">22/03/2018</p>
                    <p class="descricaoeventos">Lorem ipsum dolor sit amet, con...</p>
                    <a href="{{ url('site/evento') }}" class=" align-content-end saibamaiseventos">Saiba mais</a>
                </div>
            </div>--}}

        </div>

    </div>






@endsection
