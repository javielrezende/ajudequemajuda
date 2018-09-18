@extends('rodapesite')
@extends('basicosite')

@section('content')

    <div class="row siteentidade">

        <div class="row diventidade">
            <img class="row imagementidade" src="{{ asset('imagens/evento.png') }}"
                 alt="Imagem entidade">
            <div class="diamesentidade">
                <h4 class="diaentidade">19</h4>
                <h4 class="mesentidade">ABR</h4>
            </div>

            <div class="row observacoesentidade">
                <h4 class="nomeentidade">Campanha 1</h4>
                <div class="localhora">
                    <div>
                        <p class="local">Local:</p>
                        <p class="localentidade">Estádio Boca do Lobo</p>
                    </div>
                    <div>
                        <p class="hora">Horário:</p>
                        <p class="horaentidade">20 h</p>
                    </div>
                </div>
                <p class="descricaoentidade">Lorem ipsum dolor sit amet, con...</p>
            </div>
        </div>
    </div>



@endsection
