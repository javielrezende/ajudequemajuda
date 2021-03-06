@extends('basico')

@section('content')
    <div class="row">
        <div>
            <h2> Usuários Cadastrados </h2>
        </div>
        <div>
            &nbsp;&nbsp;&nbsp;<a href="{{route('users.create')}}" class="btn btn-outline-success btn-sm">Novo</a>
            &nbsp;&nbsp;&nbsp;<a href="{{url('/')}}" class="btn btn-outline-primary btn-sm">Voltar</a>
        </div>

        <div class='row centerentidade'>

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
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>CPF</th>
                    <th>Fone</th>
                    <th>Rua</th>
                    <th>Número</th>
                    <th>Complemento</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Bairro</th>
                    <th>CEP</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->cpf}}</td>
                        <td>{{$user->fone}}</td>
                        <td>{{$user->endereco->rua}}</td>
                        <td>{{$user->endereco->numero}}</td>
                        <td>{{$user->endereco->complemento}}</td>
                        <td>{{$user->endereco->cidade}}</td>
                        <td>{{$user->endereco->estado}}</td>
                        <td>{{$user->endereco->bairro}}</td>
                        <td>{{$user->endereco->cep}}</td>
                        <td>
                            <a href="{{route('users.edit', $user->id)}}"
                               class="btn btn-outline-info btn-sm">Alterar</a> &nbsp;&nbsp;
                            <form style="display: inline-block"
                                  method="post"
                                  action="{{route('users.destroy', $user->id)}}"
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
