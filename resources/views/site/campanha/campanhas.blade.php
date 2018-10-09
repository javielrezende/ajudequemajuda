@extends('rodapesite')
@extends('basicosite')

@section('content')

    <div class="row sitecampanhas">
        <a href="{{url('/aqa')}}" class="linkReturn">HOME</a>
        <p class="row col-md-12 titulosPrincipais">Campanhas</p>
        <div class="row imgcampanhas">

            @foreach($campanhas as $campanha)
                <div class="row divcampanhas">
                    <img class="row imagemcampanhas" src="{{ asset('imagens/campanhadestaque.png') }}"
                         alt="Imagem destaque">
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

            {{--<div class="row divcampanhas">
                <img class="row imagemcampanhas" src="{{ asset('imagens/campanhadestaque.png') }}"
                     alt="Imagem destaque">
                <div class="col-6 row observacoescampanhas">
                    <h4 class="nomecampanhas">Campanha 1</h4>
                    <h6 class="nomeentidadesite">Por: Entidade 0</h6>
                    <p class="descricaocampanhas">Lorem ipsum dolor sit amet, con...</p>
                    <div class="row like">
                        <i class="far fa-thumbs-up"></i>
                        <p class="numlike">999</p>
                        <i class="far fa-thumbs-down"></i>
                        <p class="numlike">999</p>
                        <a href="{{ url('site/campanha') }}" class="saibamaiscampanhas">Saiba mais</a>
                    </div>
                </div>
            </div>

            <div class="row divcampanhas">
                <img class="row imagemcampanhas" src="{{ asset('imagens/campanhadestaque.png') }}"
                     alt="Imagem destaque">
                <div class="col-6 row observacoescampanhas">
                    <h4 class="nomecampanhas">Campanha 2</h4>
                    <h6 class="nomeentidadesite">Por: Entidade 0</h6>
                    <p class="descricaocampanhas">LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORE</p>
                    <div class="row like">
                        <i class="far fa-thumbs-up"></i>
                        <p class="numlike">999</p>
                        <i class="far fa-thumbs-down"></i>
                        <p class="numlike">999</p>
                        <a href="{{ url('site/campanha') }}" class="saibamaiscampanhas">Saiba mais</a>
                    </div>
                </div>
            </div>--}}

        </div>

    </div>






@endsection
