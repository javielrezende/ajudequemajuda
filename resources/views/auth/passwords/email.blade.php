@extends('rodapesite')
@extends('basicosite')

@section('content')
    <div class="row cadastrodoador" style=" min-height: calc(100vh - 190px);">

        <a href="{{url('/aqa')}}" class="linkReturn">HOME</a>

        <p class="row col-md-12 titulosPrincipais">Recuperação de senha</p>


        @if (session('status'))
            <div class="container">
                <div class="row">
                    <div class="col form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <form class="form-horizontal formcadastro" method="POST" action="{{ route('password.email') }}">
            {{ csrf_field() }}

            <div class="container">
                <div class="row">
                    <div class="col form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">Endereço de E-mail</label>

                        <input id="email" type="email" class="form-control" name="email"
                               value="{{ old('email') }}" placeholder="email@provedor.com" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row justify-content-end">
                    &nbsp;&nbsp;&nbsp;<button type="submit" class="btn cad">Recuperar senha</button>
                </div>
            </div>
        </form>
    </div>

@endsection
