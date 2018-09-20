@extends('rodapesite')
@extends('basicosite')

@section('content')

    <div class="row cadastrodoador">

        <a href="{{url('/aqa')}}" class="linkReturn">HOME</a>

        <p class="row col-md-12 titulosPrincipais">Fale Conosco</p>

        @if (session('status'))
            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    </div>
                </div>
            </div>
        @endif


        <form class="row formcadastro" method="post" action="{{route('faleconosco.store')}}">
            {{ csrf_field() }}

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <label for="nome">Nome <span class="obr">*</span></label>
                        <input type="text" class="form-control" id="nome" name="nome"
                               placeholder="Insira seu nome completo" autofocus required>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <label for="email">E-mail <span class="obr">*</span></label>
                        <input type="email" class="form-control" id="email" name="email"
                               placeholder="email@provedor.com" required>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <label for="estado">Estado <span class="obr">*</span></label>
                        <input type="text" class="form-control" id="estado" name="estado"
                               placeholder="Escolha seu estado" required>
                    </div>

                    <div class="form-group col m">
                        <label for="cidade">Cidade <span class="obr">*</span></label>
                        <input type="text" class="form-control" id="cidade" name="cidade"
                               placeholder="Insira sua cidade" required>
                    </div>

                    <div class="form-group col">
                        <label for="fone">Fone <span class="obrinv">*</span></label>
                        <input type="tel" class="form-control" id="fone" name="fone"
                               placeholder="(DDD) 00000-0000">
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <label for="mensagem">Digite sua mensagem</label>
                        <textarea id="mensagem" rows="6" class="form-control" name="mensagem"></textarea>

                    </div>
                </div>
            </div>

            <div style="margin-bottom: 35px" class="container">
                <div class="row justify-content-end">
                        &nbsp;&nbsp;&nbsp;<button type="submit" class="btn env">Enviar</button>
                    </div>
            </div>
        </form>
    </div>
@endsection