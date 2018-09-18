@extends('rodapesite')
@extends('basicosite')

@section('content')

    <div class="row sitecampanha">

        <div class="row divcampanha">
            <img class="row imagemcampanha" src="{{ asset('imagens/evento.png') }}"
                 alt="Imagem campanha">
            <div class="diamescampanha">
                <h4 class="diacampanha">19</h4>
                <h4 class="mescampanha">ABR</h4>
            </div>

            <div class="row observacoescampanha">
                <h4 class="nomecampanha">Campanha 1</h4>
                <div class="localhora">
                    <div>
                        <p class="local">Local:</p>
                        <p class="localcampanha">Estádio Boca do Lobo</p>
                    </div>
                    <div>
                        <p class="hora">Horário:</p>
                        <p class="horacampanha">20 h</p>
                    </div>
                </div>
                <p class="descricaocampanha">Lorem ipsum dolor sit amet, con...</p>
            </div>
        </div>
    </div>



@endsection
