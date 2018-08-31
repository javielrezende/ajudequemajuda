@extends('rodapesite')
@extends('basicosite')

@section('content')

    <div class="row siteevento">

        <div class="row divevento">
            <img class="row imagemevento" src="{{ asset('imagens/evento.png') }}"
                 alt="Imagem evento">
            <div class="diamesevento">
                <h4 class="diaevento">19</h4>
                <h4 class="mesevento">ABR</h4>
            </div>

            <div class="row observacoesevento">
                <h4 class="nomeevento">Evento 1</h4>
                <div class="localhora">
                    <div>
                        <p class="local">Local:</p>
                        <p class="localevento">Estádio Boca do Lobo</p>
                    </div>
                    <div>
                        <p class="hora">Horário:</p>
                        <p class="horaevento">20 h</p>
                    </div>
                </div>
                <p class="descricaoevento">Lorem ipsum dolor sit amet, con...</p>
            </div>
        </div>
    </div>



@endsection
