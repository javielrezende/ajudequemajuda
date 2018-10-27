<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Ajude Quem Ajuda</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    {{--<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">--}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<nav class="navbarsite">
    <div class="top-leftsite linkssitelogo">
        @if(Auth::user() && Auth::user()->funcao == 1)
            <a href="{{ url('/entidade-site') }}"><img class="logosite" src="{{ asset('imagens/logo_p.png') }}"
                                                       alt="Logo Ajude Quem Ajuda"></a>
        @else
            <a href="{{ url('/aqa') }}"><img class="logosite" src="{{ asset('imagens/logo_p.png') }}"
                                             alt="Logo Ajude Quem Ajuda"></a>
        @endif
    </div>
    @if (Route::has('login'))
        <div class="menu text-center">
            {{--@if(Auth::user() && Auth::user()->can('entidade'))--}}
            {{--@if(Gate::check('entidade'))--}}

            @if(Auth::user() && Auth::user()->funcao == 1)
                {{--@if(\Illuminate\Support\Facades\Auth::user() && \Illuminate\Support\Facades\Auth::user()->funcao == 1)--}}
                <a href="{{ url('/entidade-site') }}">Home</a>
            @else
                <a href="{{ url('/aqa') }}">Home</a>
            @endif
            <a href="{{ url('site/entidades')  }}">Entidades</a>
            {{--<a href="{{ url('/entidades') }}">Entidades</a>--}}
            <a href="{{ url('site/campanhas')  }}">Campanhas</a>
            {{--<a href="{{ url('/campanhas') }}">Campanhas</a>--}}
            <a href="{{ url('site/eventos')  }}">Eventos</a>
            <a class="fas fa-search"></a>
            {{-- <a href="{{ url('/eventos') }}">Eventos</a>--}}
        </div>
        <div class="top-rightsite linkssite">
            {{--------------------------------------------------------------------  --}}

            @auth
                <div class="dropdown" style="display: inline">
                    <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                        <img class="imgperfil" src="{{ asset('imagens/perfil.png') }}"
                             alt="Foto de perfil"></a>
                    @if(Auth::user()->funcao == 1)
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item"
                               href=" {{route('entidade-site.show', $usuario = Auth::user()->id)}} ">Meu
                                cadastro</a>
                            <a class="dropdown-item" href="#">Trocar senha</a>
                            <a class="dropdown-item" href="{{route('minhas-campanhas.index')}}">Minhas Campanhas</a>
                            <a class="dropdown-item" href="{{route('meus-eventos.index')}}">Meus Eventos</a>
                            <a class="dropdown-item" href="{{route('doacao-confirmar.index')}}">Doações para confirmar</a>
                            <a class="dropdown-item" href="{{route('relatorios.index')}}">Relatórios</a>
                        </div>
                    @else
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item"
                               href=" {{route('usuario-site.show', $usuario = Auth::user()->id)}} ">Meu
                                cadastro</a>
                            <a class="dropdown-item" href="#">Trocar senha</a>
                            <a class="dropdown-item" href="{{route('campanhas-interessantes.index')}}">Campanhas interessantes</a>
                            <a class="dropdown-item" href="#">Doações efetuadas</a>
                        </div>
                    @endif
                </div>

                <span class="ola">Olá, </span>
                <span class="nomeperfil">{{ Auth::user()->name }}</span>
                {{--style="margin-left: 10px; margin-right: 10px"--}}

                <a class="sair" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                    [Sair]
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                      style="display: none;">
                    {{ csrf_field() }}
                </form>

        </div>
    @else



        <a class="stylelogin" href="{{ route('aqa-login') }}">LOGIN</a>
        {{--<a class="stylelogin" href="{{ route('login') }}">LOGIN</a>--}}
        <a class="stylecadastro" href="{{ route('pre-cadastro') }}">CADASTRO</a>
        {{--<a class="stylecadastro" href="{{ route('register') }}">CADASTRO</a>--}}
        </div>
        @endauth
    @endif
</nav>

<div class="container-fluid principalsite">

    @yield('content')

</div>
<!-- Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/js/tether.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
