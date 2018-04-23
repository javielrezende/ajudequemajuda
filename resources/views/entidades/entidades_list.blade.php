@extends('basico')

@section('content')

    <div class='col-sm-8'>
        <h2> Cadastro de Entidades </h2>
    </div>
    <div class='col-sm-4'>
        <a href="{{route('entidades.create')}}" class="btn btn-default">Novo</a>
    </div>

    <div class='col-sm-12'>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class='col-sm-11'>
            <h2> Entidades </h2>
        </div>


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
                <th>CEP</th>
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
                    <td>{{$entidade->endereco->bairro}}</td>
                    <td>{{$entidade->endereco->estado}}</td>
                    <td>{{$entidade->endereco->cep}}</td>
                    <td>
                        <a href="{{route('entidades.edit', $entidade->id)}}"
                           class="btn btn-default">Alterar</a> &nbsp;&nbsp;
                        <form style="display: inline-block"
                              method="post"
                              action="{{route('entidades.destroy', $entidade->id)}}"
                              onsubmit="return confirm('Confirma Exclusão?')">
                            {{method_field('delete')}}
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-default">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection