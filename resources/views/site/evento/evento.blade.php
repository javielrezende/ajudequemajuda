@extends('rodapesite')
@extends('basicosite')

@section('content')

    <div class="text-center returnsite"><span class="homelinkreturn">HOME / </span><a href="{{url('/site/eventos')}}"
                                                                                      class="linkReturn">EVENTOS</a>
    </div>

    <div class="row siteevento">

        <div class="row divevento">
            @if(!empty($registro->imagens->count() > 0))
                <img class="row imagemcampanhas" src="/{{$registro->imagens[0]->caminho}}"
                     alt="Foto de perfil">
            @else
                <img class="row imagemcampanhas" src="{{ asset('imagens/campanhadestaque.png') }}"
                     alt="Imagem destaque">
            @endif
            <div class="diamesevento">
                <h4 class="diaevento">19</h4>
                <h4 class="mesevento">ABR</h4>
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
