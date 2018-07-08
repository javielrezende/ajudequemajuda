@extends('basico')

@section('content')
    <div class="row cadastro">
        <div class='col-sm-11'>
            @if ($acao == 1)
                <h2> Cadastro de Entidades </h2>
            @else
                <h2> Alteração de dados cadastrados </h2>
            @endif
        </div>
        <div class='col-sm-1'>
            <a href="{{route('entidades.index')}}" class="btn btn-outline-primary btn-sm">Voltar</a>
        </div>

        @if ($acao == 1)
            <form class="row" method="post" action="{{route('entidades.store')}}">
                @else
                    <form class="row" method="post" action="{{route('entidades.update', $registro->id)}}">
                        {!! method_field('put') !!}
                        @endif
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">Nome <span class="obr">*</span></label>
                            <input type="text" class="form-control" id="name" name="name"
                                   value="{{$registro->name or old('name')}}" autofocus required>
                        </div>

                        <div class="form-group">
                            <label for="email">E-mail <span class="obr">*</span></label>
                            <input type="email" class="form-control" id="email" name="email"
                                   value="{{$registro->email or old('email')}}" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Senha <span class="minsenha">(Mínimo 6 caracteres)</span><span class="obr">*</span></label>
                            <input type="password" class="form-control" id="password" name="password"
                                   value="{{$registro->password or old('password')}}" required>
                        </div>

                        <div class="form-group">
                            <label for="cpf">CPF</label>
                            <input type="text" class="form-control" id="cpf" name="cpf"
                                   value="{{$registro->cpf or old('cpf')}}">
                        </div>

                        <div class="form-group">
                            <label for="cnpj">CNPJ</label>
                            <input type="text" class="form-control" id="cnpj" name="cnpj"
                                   value="{{$registro->cnpj or old('cpnj')}}">
                        </div>


                        <div class="form-group">
                            <label for="fone">Fone</label>
                            <input type="tel" class="form-control" id="fone" name="fone"
                                   value="{{$registro->fone or old('fone')}}">
                        </div>

                        <div class="form-group">
                            <label for="cep">CEP <span class="obr">*</span></label>
                            <input type="text" class="form-control" id="cep" name="cep"
                                   value="{{$registro->endereco->cep or old('cep')}}" required>
                        </div>

                        <div class="form-group">
                            <label for="rua">Rua <span class="obr">*</span></label>
                            <input type="text" class="form-control" id="rua" name="rua"
                                   value="{{$registro->endereco->rua or old('rua')}}" required>
                        </div>

                        <div class="form-group">
                            <label for="numero">Nº <span class="obr">*</span></label>
                            <input type="text" class="form-control" id="numero" name="numero"
                                   value="{{$registro->endereco->numero or old('numero')}}" required>
                        </div>

                        <div class="form-group">
                            <label for="complemento">Complemento</label>
                            <input type="text" class="form-control" id="complemento" name="complemento"
                                   value="{{$registro->endereco->complemento or old('complemento')}}">
                        </div>

                        <div class="form-group">
                            <label for="bairro">Bairro <span class="obr">*</span></label>
                            <input type="text" class="form-control" id="bairro" name="bairro"
                                   value="{{$registro->endereco->bairro or old('bairro')}}" required>
                        </div>

                        <div class="form-group">
                            <label for="cidade">Cidade <span class="obr">*</span></label>
                            <input type="text" class="form-control" id="cidade" name="cidade"
                                   value="{{$registro->endereco->cidade or old('cidade')}}" required>
                        </div>

                        <div class="form-group">
                            <label for="estado">Estado <span class="obr">*</span></label>
                            <input type="text" class="form-control" id="estado" name="estado"
                                   value="{{$registro->endereco->estado or old('estado')}}" required>
                        </div>

                        <div class="form-group">
                            <label for="descricao">Descreva sobre sua entidade</label>
                            <textarea id="descricao_entidade" rows="5" class="form-control" name="descricao_entidade"
                            >{{$registro->descricao_entidade or old('descricao_entidade')}}</textarea>
                        </div>
                        <div>
                            &nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-outline-success btn-sm">Enviar</button>
                            &nbsp;&nbsp;&nbsp;<button type="reset" class="btn btn-outline-warning btn-sm">Limpar</button>
                        </div>
                    </form>
            </form>
    </div>
@endsection