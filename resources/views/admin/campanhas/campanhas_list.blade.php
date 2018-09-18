@extends('basico')

@section('content')
<div class="row">
    <div>
        <h2> Campanhas Cadastradas </h2>
    </div>
    <div>
        &nbsp;&nbsp;&nbsp;<a href="{{route('campanhas.create')}}" class="btn btn-outline-success btn-sm">Novo</a>
        &nbsp;&nbsp;&nbsp;<a href="{{url('/admin')}}" class="btn btn-outline-primary btn-sm">Voltar</a>
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
                <th>Nome da Entidade</th>
                <th>Nome da Campanha</th>
                <th>Descrição</th>
                <th>Data inicial</th>
                <th>Data final</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($campanhas as $campanha)
                <tr>
                    <td>{{$campanha->id}}</td>
                    <td>{{$campanha->users[0]->name}}</td>
                    <td>{{$campanha->nome}}</td>
                    <td>{{$campanha->descricao}}</td>
                    <td>{{$campanha->dataInicio}}</td>
                    <td>{{$campanha->dataFim}}</td>
                    <td>
                        <a href="{{route('campanhas.edit', $campanha->id)}}"
                           class="btn btn-outline-info btn-sm">Alterar</a> &nbsp;&nbsp;
                        <form style="display: inline-block"
                              method="post"
                              action="{{route('campanhas.destroy', $campanha->id)}}"
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
