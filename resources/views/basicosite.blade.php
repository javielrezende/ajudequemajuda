<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Ajude Quem Ajuda</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<nav class="navbarsite">
    <div class="top-leftsite linkssitelogo">
        <a href="{{ url('/') }}"><img class="logosite" src="{{ asset('imagens/logo_p.png') }}"
                                      alt="Logo Ajude Quem Ajuda"></a>
    </div>
    {{--@if (Route::has('login'))--}}
        <div class="menu text-center">
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ url('/entidades') }}">Entidades</a>
            <a href="{{ url('/campanhas') }}">Campanhas</a>
            <a href="{{ url('/eventos') }}">Eventos</a>
        </div>
        <div class="top-rightsite linkssite">
            {{--@auth--}}
                {{--<a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                    Sair
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                      style="display: none;">
                    {{ csrf_field() }}
                </form>--}}
                {{--<span style="margin-left: 10px; margin-right: 10px">{{ Auth::user()->name }}</span>--}}
        {{--</div>--}}
    {{--@else--}}
        <a class="stylelogin" href="{{ route('login') }}">LOGIN</a>
        <a class="stylecadastro" href="{{ route('register') }}">CADASTRO</a>
        </div>
        {{--@endauth--}}
    {{--@endif--}}
</nav>

<div class="container-fluid principalsite">

    @yield('content')

</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
