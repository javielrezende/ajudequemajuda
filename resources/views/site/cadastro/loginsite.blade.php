@extends('rodapesite')
@extends('basicosite')

@section('content')
    <div class="row login">

        <a href="{{url('/aqa')}}" class="linkReturn">HOME</a>

        <p class="row col-md-12 titulosPrincipais">Login</p>

        <div class="col-md-12">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        </div>

        <form class="row formcadastro" method="post" action="{{route('login')}}">
            {{ csrf_field() }}

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <label for="email">E-mail <span class="obr">*</span></label>
                        <input type="email" class="form-control" id="email" name="email"
                               placeholder="email@provedor.com" required autofocus>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <label for="password">Senha <span class="obr">*</span></label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row justify-content-end">
                    <a class="btn btn-link esqueci" href="{{ route('password.request') }}">Esqueci minha senha</a>
                    <a href="{{ url('login/social') }}" class="btn facebotao">Login com Facebook</a>
                    &nbsp;&nbsp;&nbsp;<button type="submit" class="btn cad">Entrar</button>
                </div>
            </div>
        </form>
    </div>
@endsection