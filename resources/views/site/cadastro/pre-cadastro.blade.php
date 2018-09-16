@extends('rodapesite')
@extends('basicosite')

@section('content')
    <div class="row precadastrogeral">

        <a href="{{url('/aqa')}}" class="linkReturn">HOME</a>

        <p class="row col-md-12 titulosPrincipais">Cadastro</p>
        <div class="row precadastro">

            <a href="/cadastrodoador" class="precadastrolink">
                <div class="row doarimg">
                    <h4 class="nomeopcao">Quero doar</h4>
                    <p class="mensagemopcao">Ajude instituições com suprimentos</p>
                </div>
            </a>

            <a href="#" class="precadastrolink">
                <div class="row cadastroimg">
                    <h4 class="nomeopcao">Preciso de doações</h4>
                    <p class="mensagemopcao">Cadastre sua entidade e receba auxílio</p>
                </div>
            </a>
        </div>
    </div>


@endsection