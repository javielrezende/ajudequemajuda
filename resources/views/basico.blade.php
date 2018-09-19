<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Ajude Quem Ajuda</title>

    <!-- Styles -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<nav class="navbar">
    <div class="top-left links">
        <a href="{{ url('/admin') }}"><img class="logo" src="{{ asset('imagens/logo_p.png') }}" alt="Logo Ajude Quem Ajuda"></a>
    </div>
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/admin/faleconoscoadmin') }}">Mensagens</a>
                <a href="{{ url('/admin/itens') }}">Itens</a>
                <a href="{{ url('/admin/eventos') }}">Eventos</a>
                <a href="{{ url('/admin/campanhas') }}">Campanhas</a>
                <a href="{{ url('/admin/users') }}">Usuários</a>
                <a href="{{ url('/admin/entidades') }}">Entidades</a>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                    Sair
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                      style="display: none;">
                    {{ csrf_field() }}
                </form>
                <span style="margin-left: 10px; margin-right: 10px">{{ Auth::user()->name }}</span>
        </div>
                @else
                    <a href="{{ route('login') }}">Entrar</a>
                    <a href="{{ route('register') }}">Cadastrar</a>
        </div>
        @endauth
    @endif
</nav>

<div class="container-fluid principal">

    @yield('content')

</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
