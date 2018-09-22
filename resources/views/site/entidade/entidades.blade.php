@extends('rodapesite')
@extends('basicosite')

@section('content')

    <div class="row siteentidades">
        <a href="{{url('/aqa')}}" class="linkReturn">HOME</a>
        <p class="row col-md-12 titulosPrincipais">Entidades</p>
        <div class="row imgentidades">
            <div class="row diventidades">
                <img class="row imagementidades" src="{{ asset('imagens/campanhadestaque.png') }}"
                     alt="Imagem destaque">
                <div class="col-6 row observacoesentidades">
                    <h4 class="nomeentidades">Entidade 1</h4>
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
                     alt="Imagem destaque">
                <div class="col-6 row observacoesentidades">
                    <h4 class="nomeentidades">Entidade 1</h4>
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
                     alt="Imagem destaque">
                <div class="col-6 row observacoesentidades">
                    <h4 class="nomeentidades">Entidade 1</h4>
                    <p class="descricaoentidades">LOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORE</p>
                    <div class="row like">
                        <i class="far fa-thumbs-up"></i>
                        <p class="numlike">999</p>
                        <i class="far fa-thumbs-down"></i>
                        <p class="numlike">999</p>
                        <a href="{{ url('site/entidade') }}" class="saibamaisentidades">Saiba mais</a>
                    </div>
                </div>
            </div>

        </div>

    </div>






@endsection
