@extends('basico')

@section('content')
    <div class="row cadastro">
        <form method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">Nome</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required
                       autofocus>
                @if ($errors->has('name'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email">E-mail</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="cpf">CPF</label>
                <input id="cpf" type="text" class="form-control" name="cpf" value="{{ old('cpf') }} ">
            </div>

            <div class="form-group">
                <label for="cnpj">CNPJ</label>
                <input id="cpf" type="text" class="form-control" name="cnpj" value="{{ old('cnpj') }}">
            </div>

            <div class="form-group">
                <label for="fone">Fone</label>
                <input id="fone" type="text" class="form-control" name="fone" value="{{ old('fone') }}">
            </div>

            <div class="form-group">
                <label for="rua">Rua</label>
                <input id="rua" type="text" class="form-control" name="rua" value="{{ old('rua') }}" required>
            </div>

            <div class="form-group">
                <label for="numero">Número</label>
                <input id="numero" type="text" class="form-control" name="numero" value="{{ old('numero') }}" required>
            </div>

            <div class="form-group">
                <label for="complemento">Complemento</label>
                <input id="complemento" type="text" class="form-control" name="complemento"
                       value="{{ old('complemento') }}">
            </div>

            <div class="form-group">
                <label for="cidade">Cidade</label>
                <input id="cidade" type="text" class="form-control" name="cidade" value="{{ old('cidade') }}" required>
            </div>

            <div class="form-group">
                <label for="bairro">Bairro</label>
                <input id="bairro" type="text" class="form-control" name="bairro" value="{{ old('bairro') }}" required>
            </div>

            <div class="form-group">
                <label for="cep">Cep</label>
                <input id="cep" type="text" class="form-control" name="cep" value="{{ old('cep') }}" required>
            </div>

            <div class="form-group">
                <label for="estado">Estado</label>
                <input id="estado" type="text" class="form-control" name="estado" value="{{ old('estado') }}" required>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password">Password</label>
                <input id="password" type="password" class="form-control" name="password" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="password-confirm">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>

            <div class="form-group">
                <label for="solicitacao_entidade">Solicitar Cadastro como Entidade</label>
                <input id="solicitacao_entidade" type="checkbox" class="form-control" name="solicitacao_entidade"
                       value={{1}}>
            </div>

            <div class="form-group">
                <label for="descricao_entidade">Fale um pouco sobre sua entidade</label>
                <textarea id="descricao_entidade" class="form-control" name="descricao_entidade"></textarea>
            </div>

            <div class="form-group">
                <label for="mensagem">Explique o motivo de seu pedido</label>
                <textarea id="mensagem" class="form-control" name="mensagem"></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    Cadastrar
                </button>
            </div>
        </form>
    </div>
@endsection
