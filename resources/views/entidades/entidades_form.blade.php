@extends('basico')

@section('content')

    <div class='col-sm-11'>
        @if ($acao == 1)
            <h2> Cadastro de Entidades </h2>
        @else
            <h2> Alteração de dados cadastrados </h2>
        @endif
    </div>
    <div class='col-sm-1'>
        <a href="{{route('entidades.index')}}" class="btn btn-default">Voltar</a>
    </div>


    @if ($acao == 1)
        <form method="post" action="{{route('entidades.store')}}">
            @else
                <form method="post" action="{{route('entidades.update', $registro->id)}}">
                    {!! method_field('put') !!}
                    @endif
                    {{ csrf_field() }}

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   value="{{$registro->name or old('name')}}">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email"
                                   value="{{$registro->email or old('email')}}">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input type="password" class="form-control" id="password" name="password"
                                   value="{{$registro->password or old('password')}}">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="cpf">CPF</label>
                            <input type="text" class="form-control" id="cpf" name="cpf"
                                   value="{{$registro->cpf or old('cpf')}}">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="cnpj">CNPJ</label>
                            <input type="text" class="form-control" id="cnpj" name="cnpj"
                                   value="{{$registro->cnpj or old('cpnj')}}">
                        </div>
                    </div>


                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="fone">Fone</label>
                            <input type="tel" class="form-control" id="fone" name="fone"
                                   value="{{$registro->fone or old('fone')}}">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="cep">CEP</label>
                            <input type="text" class="form-control" id="cep" name="cep"
                                   value="{{$registro->endereco->cep or old('cep')}}">
                        </div>
                    </div>

                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="rua">Rua</label>
                            <input type="text" class="form-control" id="rua" name="rua"
                                   value="{{$registro->endereco->rua or old('rua')}}">
                        </div>
                    </div>

                    <div class="col-sm-1">
                        <div class="form-group">
                            <label for="numero">Nº</label>
                            <input type="text" class="form-control" id="numero" name="numero"
                                   value="{{$registro->endereco->numero or old('numero')}}">
                        </div>
                    </div>

                    <div class="col-sm-1">
                        <div class="form-group">
                            <label for="complemento">Complemento</label>
                            <input type="text" class="form-control" id="complemento" name="complemento"
                                   value="{{$registro->endereco->complemento or old('complemento')}}">
                        </div>
                    </div>

                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="bairro">Bairro:</label>
                            <input type="text" class="form-control" id="bairro" name="bairro"
                                   value="{{$registro->endereco->bairro or old('bairro')}}">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="cidade">Cidade:</label>
                            <input type="text" class="form-control" id="cidade" name="cidade"
                                   value="{{$registro->endereco->cidade or old('cidade')}}">
                        </div>
                    </div>

                    <div class="col-sm-1">
                        <div class="form-group">
                            <label for="estado">Estado:</label>
                            <input type="text" class="form-control" id="estado" name="estado"
                                   value="{{$registro->endereco->estado or old('estado')}}">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <label for="descricao" class="col-md-4 control-label">Descreva sobre sua entidade</label>
                        <div class="col-md-6">
                            <textarea id="descricao_entidade" class="form-control" name="descricao_entidade"
                            >{{$registro->descricao_entidade or old('descricao_entidade')}}</textarea>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-default">Enviar</button>
                        <button type="reset" class="btn btn-default">Limpar</button>
                    </div>

                </form>





@endsection