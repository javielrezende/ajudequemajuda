@extends('basico')

@section('content')

    <div class='col-sm-8'>
        <h2> Eventos Cadastrados </h2>
    </div>
    <div class='col-sm-4'>
        <a href="{{route('eventos.create')}}" class="btn btn-default">Novo</a>
        <a href="{{url('/')}}" class="btn btn-default">Voltar</a>
    </div>

    <div class='col-sm-12'>

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
                <th>Descrição</th>
                <th>Rua</th>
                <th>Número</th>
                <th>Complemento</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($eventos as $evento)
                <tr>
                    <td>{{$evento->id}}</td>
                    <td>{{$evento->descricao}}</td>
                    <td>{{$entidade->endereco->rua}}</td>
                    <td>{{$entidade->endereco->numero}}</td>
                    <td>{{$entidade->endereco->complemento}}</td>
                    <td>{{$entidade->endereco->bairro}}</td>
                    <td>{{$entidade->endereco->cidade}}</td>
                    <td>{{$entidade->endereco->estado}}</td>
                    <td>
                        <a href="{{route('eventos.edit', $evento->id)}}"
                           class="btn btn-default">Alterar</a> &nbsp;&nbsp;
                        <form style="display: inline-block"
                              method="post"
                              action="{{route('eventos.destroy', $evento->id)}}"
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
