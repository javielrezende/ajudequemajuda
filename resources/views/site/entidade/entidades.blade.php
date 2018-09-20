@extends('rodapesite')
@extends('basicosite')

@section('content')

    <div class="row siteentidades">
        <p class="row col-md-12 titulosPrincipais">Entidades</p>
        <div class="row imgentidades">
            <div class="row diventidades">
                <img class="row imagementidades" src="{{ asset('imagens/campanhadestaque.png') }}"
                     alt="Imagem destaque">
                <div class="col-6 row observacoesentidades">
                    <h4 class="nomeentidades">Entidade 1</h4>
                    <p class="dataentidades">22/03/2018</p>
                    <p class="descricaoentidades">Lorem ipsum dolor sit amet, con...</p>
                    <div class="row like">
                        <i class="far fa-thumbs-up"></i>
                        <p class="numlike">999</p>
                        <i class="far fa-thumbs-down"></i>
                        <p class="numlike">999</p>
                        <a href="{{ url('site/entidade') }}" class="saibamaisentidades">Saiba mais</a>
                    </div>
                </div>
            </div>


            <div class="row diventidades">
                <img class="row imagementidades" src="{{ asset('imagens/campanhadestaque.png') }}"
                     alt="Imagem destque">
                <div class="col-6 row observacoesentidades">
                    <h4 class="nomeentidades">Entidade 1</h4>
                    <p class="dataentidades">22/03/2018</p>
                    <p class="descricaoentidades">IPS LOREM IPS LOREM IPS LOREM IPS LOREM IPS EM IPS LOREM IPS LOREM
                        IPS...</p>
                    {{--<i class="far fa-thumbs-up align-content-start saibamaisentidades"></i>--}}
                    <a href="{{ url('site/entidade') }}" class=" align-content-end saibamaisentidades">Saiba mais</a>
                </div>
            </div>

            <div class="row diventidades">
                <img class="row imagementidades" src="{{ asset('imagens/campanhadestaque.png') }}"
                     alt="Imagem destque">
                <div class="col-6 row observacoesentidades">
                    <h4 class="nomeentidades">Entidade 1</h4>
                    <p class="dataentidades">22/03/2018</p>
                    <p class="descricaoentidades">Lorem ipsum dolor sit amet, con...</p>
                    {{--<i class="far fa-thumbs-up align-content-start saibamaisentidades"></i>--}}
                    <a href="{{ url('site/entidade') }}" class=" align-content-end saibamaisentidades">Saiba mais</a>
                </div>
            </div>

        </div>

    </div>






@endsection
