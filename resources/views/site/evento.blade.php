@extends('rodapesite')
@extends('basicosite')

@section('content')

    <div class="row siteevento">

        <div class="row col-6">
            <div class="row divevento">
                <img class="row imagemevento" src="{{ asset('imagens/campanhadestaque.png') }}" alt="Imagem destque">
                <div class="col-6 row observacoesevento">
                    <h4 class="nomeevento">Evento 1</h4>
                    <p class="dataevento">22/03/2018</p>
                    <p class="descricaoevento">Lorem ipsum dolor sit amet, con...</p>
                </div>
            </div>
        </div>



@endsection
