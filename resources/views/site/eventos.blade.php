@extends('rodapesite')
@extends('basicosite')

@section('content')

    <div class="row siteeventos">
        <a href="{{url('/aqa')}}" class="linkReturn">HOME</a>
        <p class="row col-md-12 titulosPrincipais">Eventos</p>
        <div class="row imgeventos">
            <div class="row diveventos">
                <img class="row imagemeventos" src="{{ asset('imagens/campanhadestaque.png') }}"
                     alt="Imagem destaque">
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
            </div>

        </div>

    </div>






@endsection
