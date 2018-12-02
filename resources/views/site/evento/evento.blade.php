@extends('rodapesite')
@extends('basicosite')

@section('content')

    <div class="text-center returnsite"><span class="homelinkreturn">HOME / </span><a href="{{url('/site/eventos')}}"
                                                                                      class="linkReturn">EVENTOS</a>
    </div>

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

    <div class="row siteevento">

        <div class="row divevento">
            @if(!empty($registro->imagens))
                <img class="row imagemcampanhas" src="{{$registro->imagens->caminho}}"
                     alt="Foto de perfil">
            @else
                <img class="row imagemcampanhas" src="{{ asset('https://s3-sa-east-1.amazonaws.com/ajudequemajuda/geral/eventos1.jpg') }}"
                     alt="Imagem destaque">
            @endif
            <div class="diamesevento">
                <h4 class="diaevento">{{$dia}}</h4>
                <h4 class="mesevento">{{$mes}}</h4>
            </div>

            <div class="row observacoesevento">
                <h4 class="nomeevento">{{$registro->nome}}</h4>
                <div class="localhora">
                    <div>
                        <p class="local">Local:</p>
                        <p class="localevento">{{$registro->enderecos->rua}}</p>
                    </div>
                    <div>
                        <p class="hora">Horário:</p>
                        <p class="horaevento">{{$registro->dataHoraInicio1}} h</p>
                    </div>
                </div>
                <p class="descricaoevento">{{$registro->descricao}}</p>
            </div>
        </div>
    </div>



@endsection
