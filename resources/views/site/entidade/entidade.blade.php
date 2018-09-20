@extends('rodapesite')
@extends('basicosite')

@section('content')

    <div class="text-center returnsite"><span class="homelinkreturn">HOME / </span><a href="{{url('/site/entidades')}}"
                                                                                      class="linkReturn">ENTIDADES</a>
    </div>

    <div class="row siteentidade">

        <div class="row diventidade">
            <img class="row imagementidade" src="{{ asset('imagens/evento.png') }}"
                 alt="Imagem entidade">

            <div class="row observacoesentidade">
                <h4 class="nomeentidade">Campanha 1</h4>
                <div class="localhora">
                    <div>
                        <p class="local">Local:</p>
                        <p class="localentidade">Estádio Boca do Lobo, 14 - Bairro Fragata</p>
                    </div>
                </div>
                <p class="descricaoentidade">LOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LO</p>
                <div class="row like">
                    <i class="far fa-thumbs-up"></i>
                    <p class="numlike">999</p>
                    <i class="far fa-thumbs-down"></i>
                    <p class="numlike">999</p>
                    <div class="fb-share-button" data-href="http://ajudequemajudapelotas.herokuapp.com" data-layout="button" data-size="large" data-mobile-iframe="false"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartilhar</a></div>
                </div>
            </div>
        </div>

        <p class="row col-md-12 titulosPrincipais">Campanhas ativas</p>


        <div class="campanhasentidade">
            <div class="camp">
                <p class="campnome">Campanha 1</p>
                <p class="campdescricao">Campanha nome</p>
                <a href="{{ url('site/campanha') }}" class="saibamaisentidades">Saiba mais</a>
            </div>

            <div class="camp">
                <p class="campnome">Campanha 1</p>
                <p class="campdescricao">Campanha nome</p>
                <a href="{{ url('site/campanha') }}" class="saibamaisentidades">Saiba mais</a>
            </div>

            <div class="camp">
                <p class="campnome">Campanha 1</p>
                <p class="campdescricao">Campanha nome</p>
                <a href="{{ url('site/campanha') }}" class="saibamaisentidades">Saiba mais</a>
            </div>

            <div class="camp">
                <p class="campnome">Campanha 1</p>
                <p class="campdescricao">Campanha nome</p>
                <a href="{{ url('site/campanha') }}" class="saibamaisentidades">Saiba mais</a>
            </div>
        </div>

        <p class="row col-md-12 titulosPrincipais">Eventos ativos</p>


        <div class="eventosentidade">
            <div class="event">
                <p class="eventnome">Campanha 1</p>
                <p class="eventdescricao">Campanha nome</p>
                <a href="{{ url('site/eventos') }}" class="saibamaisentidades">Saiba mais</a>
            </div>

            <div class="event">
                <p class="eventnome">Campanha 1</p>
                <p class="eventdescricao">Campanha nome</p>
                <a href="{{ url('site/eventos') }}" class="saibamaisentidades">Saiba mais</a>
            </div>

            <div class="event">
                <p class="eventnome">Campanha 1</p>
                <p class="eventdescricao">Campanha nome</p>
                <a href="{{ url('site/eventos') }}" class="saibamaisentidades">Saiba mais</a>
            </div>

            <div class="event">
                <p class="eventnome">Campanha 1</p>
                <p class="eventdescricao">Campanha nome</p>
                <a href="{{ url('site/eventos') }}" class="saibamaisentidades">Saiba mais</a>
            </div>
        </div>

        <p class="row col-md-12 titulosPrincipais">Deixe seu comentário sobre a entidade</p>

        <form class="row formescrevercomentario" method="post" action="#">
            {{ csrf_field() }}

            <div class="container">
                <div class="row">

                    <div class="form-group primletra">
                        R
                    </div>

                    <div class="form-group col">
                        <textarea id="comentarios" rows="4" class="form-control"
                                  placeholder="Escreva sua mensagem..."
                                  name="comentarios"></textarea>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-end">
                    &nbsp;&nbsp;&nbsp;<button type="submit" class="btn com">COMENTAR</button>
                </div>
            </div>
        </form>

        <div class="rpts">
            <div class="container">
                <div class="row">
                    <div class="col rpt">
                        <span class="nomerpts">Nome </span><span class="datarpts"> - data</span>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="primletra">
                    R
                </div>

                <div class="col">
                    <div class="coments">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus a leo eu
                        nisi cursus auctor. Pellentesque in scelerisque sem, ac mollis tellus. Duis porttitor ultricies
                        arcu a dignissim. Cras in libero eu sapien egestas commodo nec in quam. Vivamus eget suscipit
                        purus. Quisque tincidunt metus vitae gravida posuere. Donec facilisis, elit eu tincidunt semper,
                        nulla erat commodo nisi, ut malesuada mi risus in libero. Suspendisse condimentum ut erat a
                        condimentum.
                    </div>
                </div>
            </div>

            <hr>
        </div>


        <div class="rpts">
            <div class="container">
                <div class="row">
                    <div class="col rpt">
                        <span class="nomerpts">Nome </span><span class="datarpts"> - data</span>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="primletra">
                    R
                </div>

                <div class="col">
                    <div class="coments">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus a leo eu
                        nisi cursus auctor. Pellentesque in scelerisque sem, ac mollis tellus. Duis porttitor ultricies
                        arcu a dignissim. Cras in libero eu sapien egestas commodo nec in quam. Vivamus eget suscipit
                        purus. Quisque tincidunt metus vitae gravida posuere. Donec facilisis, elit eu tincidunt semper,
                        nulla erat commodo nisi, ut malesuada mi risus in libero. Suspendisse condimentum ut erat a
                        condimentum.
                    </div>
                </div>
            </div>

            <hr>
        </div>

    </div>





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
