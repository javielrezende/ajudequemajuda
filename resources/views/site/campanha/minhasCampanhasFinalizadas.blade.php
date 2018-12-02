@extends('rodapesite')
@extends('basicosite')

@section('content')

    <div class="row sitecampanhas">
        <a href="{{url('/entidade-site')}}" class="linkReturn">HOME</a>
        <p class="row col-md-12 titulosPrincipais">Minhas Campanhas Finalizadas</p>
        <div class="row imgcampanhas">

            {{--{{dd('teste tela minhas cmapnahs')}}--}}

            @foreach($campanhas as $campanha)
                <div class="row divcampanhas">

                    @if(!empty($campanha->imagens))
                        <img class="row imagemcampanhas" src="{{$campanha->imagens->caminho}}"

                             alt="Foto de perfil">
                    @else
                        <img class="row imagemcampanhas"
                             src="{{ asset('https://s3-sa-east-1.amazonaws.com/ajudequemajuda/geral/campanhas1.jpg') }}"
                             alt="Imagem destaque">
                    @endif

                    <div class="col-6 row observacoescampanhas">
                        <h4 class="nomecampanhas">{{$campanha->nome}}</h4>
                        <h6 class="nomeentidadesite">Por: {{$campanha->users[0]->name}}</h6>
                        <p class="descricaocampanhas">{{$campanha->descricao}}</p>
                        <div class="row like">
                            {{--<i class="far fa-thumbs-up"></i>
                            <p class="numlike">999</p>
                            <i class="far fa-thumbs-down"></i>
                            <p class="numlike">999</p>
                            <a href=" {{route('minhas-campanhas.show', $campanha->id)}} " class="saibamaiscampanhas">Saiba
                                mais
                            </a>--}}
                        </div>
                    </div>
                </div>
            @endforeach


        </div>

    </div>






@endsection