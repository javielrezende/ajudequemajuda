@extends('rodapesite')
@extends('basicosite')

@section('content')
    <div class="row campanhasInteressantes">

        <div class="container">
            <div class="row">
                <a href="{{url('/usuario-site')}}" class="linkReturn">HOME</a>
            </div>
        </div>

        <p class="row col-md-12 titulosPrincipais">Campanhas Interessantes</p>

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

        </div>

    </div>




@endsection