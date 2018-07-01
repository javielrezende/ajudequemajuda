<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ config('app.name', 'Ajude quem Ajuda') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="navbar">
                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <a href="{{ url('/eventos') }}">Eventos</a>
                            <a href="{{ url('/campanhas') }}">Campanhas</a>
                            <a href="{{ url('/users') }}">Usuários</a>
                            <a href="{{ url('/entidades') }}">Entidades</a>
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
                            @else
                                <a href="{{ route('login') }}">Entrar</a>
                                <a href="{{ route('register') }}">Cadastrar</a>
                    </div>
                    @endauth
                @endif
    </div>

<div class="container" style="margin-top: 100px; margin-bottom: 30px">

    @yield('content')

</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
