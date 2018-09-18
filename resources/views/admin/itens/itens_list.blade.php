@extends('basico')

@section('content')
    <div class="row">
        <div>
            <h2> Ítens Cadastrados </h2>
        </div>
        <div>
            &nbsp;&nbsp;&nbsp;<a href="{{route('itens.create')}}" class="btn btn-outline-success btn-sm">Novo</a>
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
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($itens as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->descricao}}</td>
                        <td>
                            <a href="{{route('itens.edit', $item->id)}}"
                               class="btn btn-outline-info btn-sm">Alterar</a> &nbsp;&nbsp;
                            <form style="display: inline-block"
                                  method="post"
                                  action="{{route('itens.destroy', $item->id)}}"
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
