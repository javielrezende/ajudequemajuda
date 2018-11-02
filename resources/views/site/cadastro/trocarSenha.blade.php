@extends('rodapesite')
@extends('basicosite')

@section('content')
    <div class="row trocarSenha">

        <a href="{{url('/aqa')}}" class="linkReturn">HOME</a>

        <p class="row col-md-12 titulosPrincipais">Alterar Senha</p>

        <form class="row formcadastro" method="post" action="#">
            {{ csrf_field() }}

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <label for="password">Senha atual<span class="obr">*</span></label>
                        <input type="password" class="form-control" id="password" name="password" required autofocus>
                    </div>
                </div>
            </div>

        <div class="container">
            <div class="row">
                <div class="form-group col">
                    <label for="novaSenha">Nova senha<span class="obr">*</span></label>
                    <input type="password" class="form-control" id="novaSenha" name="novaSenha" required>
                </div>
            </div>
        </div>

        <button type="submit" class="btn cad">Salvar</button>
        </form>
    </div>
@endsection