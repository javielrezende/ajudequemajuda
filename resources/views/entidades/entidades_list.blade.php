@extends('basico')

@section('content')
<div class="row">
    <div>
        <h2> Entidades Cadastradas </h2>
    </div>
    <div>
        &nbsp;&nbsp;&nbsp;<a href="{{route('entidades.create')}}" class="btn btn-outline-success btn-sm">Novo</a>
        &nbsp;&nbsp;&nbsp;<a href="{{url('/')}}" class="btn btn-outline-primary btn-sm">Voltar</a>
    </div>

    <div class='row'>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class='col-sm-1'>


        </div>


        <table class="table table-hover">
            <thead>
            <tr>
                <th>Nº de Cadastro</th>
                <th>Nome da Entidade</th>
                <th>E-mail</th>
                <th>CPF</th>
                <th>CNPJ</th>
                <th>Fone</th>
                <th>Rua</th>
                <th>Número</th>
                <th>Complemento</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>Bairro</th>
                <th>CEP</th>
                <th>Mensagem</th>
                <th>Descrição da entidade</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($entidades as $entidade)
                <tr>
                    <td>{{$entidade->id}}</td>
                    <td>{{$entidade->name}}</td>
                    <td>{{$entidade->email}}</td>
                    <td>{{$entidade->cpf}}</td>
                    <td>{{$entidade->cnpj}}</td>
                    <td>{{$entidade->fone}}</td>
                    <td>{{$entidade->endereco->rua}}</td>
                    <td>{{$entidade->endereco->numero}}</td>
                    <td>{{$entidade->endereco->complemento}}</td>
                    <td>{{$entidade->endereco->cidade}}</td>
                    <td>{{$entidade->endereco->estado}}</td>
                    <td>{{$entidade->endereco->bairro}}</td>
                    <td>{{$entidade->endereco->cep}}</td>
                    <td>{{$entidade->mensagem}}</td>
                    <td>{{$entidade->descricao_entidade}}</td>
                    <td>
                        <a href="{{route('entidades.edit', $entidade->id)}}"
                           class="btn btn-outline-info btn-sm">Alterar</a> &nbsp;&nbsp;
                        <form style="display: inline-block"
                              method="post"
                              action="{{route('entidades.destroy', $entidade->id)}}"
                              onsubmit="return confirm('Confirma Exclusão?')">
                            {{method_field('delete')}}
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-outline-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
