@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>





                        <div class="form-group">
                            <label for="cpf" class="col-md-4 control-label">CPF</label>

                            <div class="col-md-6">
                                <input id="cpf" type="text" class="form-control" name="cpf" value="{{ old('cpf') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cnpj" class="col-md-4 control-label">CNPJ</label>

                            <div class="col-md-6">
                                <input id="cpf" type="text" class="form-control" name="cnpj" value="{{ old('cnpj') }}">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="fone" class="col-md-4 control-label">Fone</label>

                            <div class="col-md-6">
                                <input id="fone" type="text" class="form-control" name="fone" value="{{ old('fone') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="rua" class="col-md-4 control-label">Rua</label>

                            <div class="col-md-6">
                                <input id="rua" type="text" class="form-control" name="rua" value="{{ old('rua') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="numero" class="col-md-4 control-label">Número</label>

                            <div class="col-md-6">
                                <input id="numero" type="text" class="form-control" name="numero" value="{{ old('numero') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="complemento" class="col-md-4 control-label">Complemento</label>

                            <div class="col-md-6">
                                <input id="complemento" type="text" class="form-control" name="complemento" value="{{ old('complemento') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cidade" class="col-md-4 control-label">Cidade</label>

                            <div class="col-md-6">
                                <input id="cidade" type="text" class="form-control" name="cidade" value="{{ old('cidade') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="bairro" class="col-md-4 control-label">Bairro</label>

                            <div class="col-md-6">
                                <input id="bairro" type="text" class="form-control" name="bairro" value="{{ old('bairro') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cep" class="col-md-4 control-label">Cep</label>

                            <div class="col-md-6">
                                <input id="cep" type="text" class="form-control" name="cep" value="{{ old('cep') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="estado" class="col-md-4 control-label">Estado</label>

                            <div class="col-md-6">
                                <input id="estado" type="text" class="form-control" name="estado" value="{{ old('estado') }}" required>
                            </div>
                        </div>





                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>





                        <div class="form-group">
                            <label for="solicitacao_entidade" class="col-md-4 control-label">Solicitar Cadastro como Entidade</label>
                            <div class="col-md-6">
                                <input id="solicitacao_entidade" type="checkbox" class="form-control" name="solicitacao_entidade" value={{1}}>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="descricao_entidade" class="col-md-4 control-label">Fale um pouco sobre sua entidade</label>
                            <div class="col-md-6">
                                <textarea id="descricao_entidade" class="form-control" name="descricao_entidade"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="mensagem" class="col-md-4 control-label">Explique o motivo de seu pedido</label>
                            <div class="col-md-6">
                                <textarea id="mensagem" class="form-control" name="mensagem"></textarea>
                            </div>
                        </div>




                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
