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
            @if($num != 0)
                @foreach($campanhasInteressadas as $campanha)
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
                                <a href="{{route('campanha.show', $campanha->id)}}" class="saibamaiscampanhas">Saiba
                                    mais</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            @else
                <div class="container">
                    <div class="row">
                        <p class="row col-md-12 aviso1"> Você ainda não está seguindo nenhuma Campanha! :( </p>
                    </div>
                </div>
            @endif
        </div>

    </div>




@endsection