@extends('basico')

@section('content')
<div class="row">
    <div>
        <h2> Eventos Cadastrados </h2>
    </div>
    <div>
        &nbsp;&nbsp;&nbsp;<a href="{{route('eventos.create')}}" class="btn btn-outline-success btn-sm">Novo</a>
        &nbsp;&nbsp;&nbsp;<a href="{{url('/admin')}}" class="btn btn-outline-primary btn-sm">Voltar</a>
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
                <th>Pertence a campanha</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Data inicial</th>
                <th>Hora inicial</th>
                <th>Data final</th>
                <th>Hora final</th>
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
                    <td>{{$evento->campanhas->nome}}</td>
                    <td>{{$evento->nome}}</td>
                    <td>{{$evento->descricao}}</td>
                    <td>{{$evento->dataHoraInicio}}</td>
                    <td>{{$evento->dataHoraInicio1}}</td>
                    <td>{{$evento->dataHoraFim}}</td>
                    <td>{{$evento->dataHoraFim1}}</td>
                    <td>{{$evento->enderecos->rua}}</td>
                    <td>{{$evento->enderecos->numero}}</td>
                    <td>{{$evento->enderecos->complemento}}</td>
                    <td>{{$evento->enderecos->bairro}}</td>
                    <td>{{$evento->enderecos->cidade}}</td>
                    <td>{{$evento->enderecos->estado}}</td>
                    <td>
                        <a href="{{route('eventos.edit', $evento->id)}}"
                           class="btn btn-outline-info btn-sm">Alterar</a> &nbsp;&nbsp;
                        <form style="display: inline-block"
                              method="post"
                              action="{{route('eventos.destroy', $evento->id)}}"
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
