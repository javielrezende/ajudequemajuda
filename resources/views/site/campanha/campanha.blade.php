@extends('rodapesite')
@extends('basicosite')

@section('content')

    <div class="text-center returnsite"><span class="homelinkreturn">HOME / </span><a href="{{url('/site/campanhas')}}"
                                                                                      class="linkReturn">CAMPANHAS</a>
    </div>

    <div class="row sitecampanha">

        <div class="row divcampanha">
            <img class="row imagemcampanha" src="{{ asset('imagens/evento.png') }}"
                 alt="Imagem campanha">

            <div class="row observacoescampanha">
                <h4 class="nomecampanha">Campanha 1</h4>
                <div class="localhora">
                    <div>
                        <p class="local">Local:</p>
                        <p class="localcampanha">Estádio Boca do Lobo, 14 - Bairro Fragata</p>
                    </div>
                </div>
                <p class="descricaocampanha">LOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LO</p>
                <div class="row like">
                    <i class="far fa-thumbs-up"></i>
                    <p class="numlike">999</p>
                    <i class="far fa-thumbs-down"></i>
                    <p class="numlike">999</p>
                    <div class="fb-share-button" data-href="http://ajudequemajudapelotas.herokuapp.com"
                         data-layout="button" data-size="large" data-mobile-iframe="false"><a target="_blank"
                                                                                              href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse"
                                                                                              class="fb-xfbml-parse-ignore">Compartilhar</a>
                    </div>
                </div>
                <div class="row opcoescampanha">
                    <a href="#" class="col seguircampanha">SEGUIR</a>
                    <a href="#" class="col doarcampanha">DOAR</a>
                </div>
            </div>
        </div>
    </div>


    {{--Js de compartilhamento do facebook--}}
    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.1&appId=2191446141141309&autoLogAppEvents=1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

@endsection
