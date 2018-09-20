@extends('rodapesite')
@extends('basicosite')

@section('content')

    <div class="row sitecampanhas">
        <p class="row col-md-12 titulosPrincipais">Campanhas</p>
        <div class="row imgcampanhas">
            <div class="row divcampanhas">
                <img class="row imagemcampanhas" src="{{ asset('imagens/campanhadestaque.png') }}"
                     alt="Imagem destaque">
                <div class="col-6 row observacoescampanhas">
                    <h4 class="nomecampanhas">Campanha 1</h4>
                    <p class="datacampanhas">Campanha permanente</p>
                    <p class="descricaocampanhas">Lorem ipsum dolor sit amet, con...</p>
                    <a href="{{ url('site/campanha') }}" class=" align-content-end saibamaiscampanhas">Saiba mais</a>
                </div>
            </div>


            <div class="row divcampanhas">
                <img class="row imagemcampanhas" src="{{ asset('imagens/campanhadestaque.png') }}"
                     alt="Imagem destque">
                <div class="col-6 row observacoescampanhas">
                    <h4 class="nomecampanhas">Campanha 1</h4>
                    <p class="datacampanhas">Até 22/03/2018</p>
                    <p class="descricaocampanhas">IPS LOREM IPS LOREM IPS LOREM IPS LOREM IPS EM IPS LOREM IPS LOREM IPS...</p>
                    <a href="{{ url('site/campanha') }}" class=" align-content-end saibamaiscampanhas">Saiba mais</a>
                </div>
            </div>

            <div class="row divcampanhas">
                <img class="row imagemcampanhas" src="{{ asset('imagens/campanhadestaque.png') }}"
                     alt="Imagem destque">
                <div class="col-6 row observacoescampanhas">
                    <h4 class="nomecampanhas">Campanha 1</h4>
                    <p class="datacampanhas">Campanha permanente</p>
                    <p class="descricaocampanhas">Lorem ipsum dolor sit amet, con...</p>
                    <a href="{{ url('site/campanha') }}" class=" align-content-end saibamaiscampanhas">Saiba mais</a>
                </div>
            </div>

        </div>




    </div>






@endsection
