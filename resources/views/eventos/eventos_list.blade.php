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
                <th>Pertence a campanha</th>
                <th>Descrição</th>
                <th>Data inicial</th>
                <th>Data final</th>
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
                    <td>{{'--'}}</td>
                    <td>{{$evento->descricao}}</td>
                    <td>{{$evento->dataInicio}}</td>
                    <td>{{$evento->dataFim}}</td>
                    <td>{{$evento->enderecos->rua}}</td>
                    <td>{{$evento->enderecos->numero}}</td>
                    <td>{{$evento->enderecos->complemento}}</td>
                    <td>{{$evento->enderecos->bairro}}</td>
                    <td>{{$evento->enderecos->cidade}}</td>
                    <td>{{$evento->enderecos->estado}}</td>
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
