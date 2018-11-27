@extends('basico')

@section('content')
    <div class="width">
        <div class="row">
            <div>
                <h2> Entidades para liberar </h2>
            </div>
            <div>
                &nbsp;&nbsp;&nbsp;<a href="{{url('/admin')}}" class="btn btn-outline-primary btn-sm">Voltar</a>
            </div>

            <div class='row'>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Número de Cadastro</th>
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
                        <th>Liberar</th>
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
                            <td class="row">
                                <div><a href="{{route('liberar', $entidade->id)}}"
                                        class="btn btn-outline-info btn-sm">Liberar</a></div> &nbsp;&nbsp;

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
