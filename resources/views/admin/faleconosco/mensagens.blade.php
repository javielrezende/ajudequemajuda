@extends('basico')

@section('content')
    <div class="width">
        {{--<div class="row">--}}
            <div>
                <h2> Mensagens do Fale Conosco </h2>
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
                        <th>Nº da mensagem</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>Fone</th>
                        <th>Mensagem</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($mensagens as $mensagem)
                        <tr>
                            <td>{{$mensagem->id}}</td>
                            <td>{{$mensagem->nome}}</td>
                            <td>{{$mensagem->email}}</td>
                            <td>{{$mensagem->cidade}}</td>
                            <td>{{$mensagem->estado}}</td>
                            <td>{{$mensagem->fone}}</td>
                            <td>{{$mensagem->mensagem}}</td>
                            <td class="row">
                                <div><a href="{{route('faleconosco.edit', $mensagem->id)}}"
                                        class="btn btn-outline-info btn-sm">Marcar como lida</a></div> &nbsp;&nbsp;
                                <div>
                                    <form method="post"
                                          action="{{route('faleconosco.destroy', $mensagem->id)}}"
                                          onsubmit="return confirm('Confirma Exclusão?')">
                                        {{method_field('delete')}}
                                        {{csrf_field()}}
                                        <button type="submit" class="btn btn-outline-danger btn-sm">Excluir</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        {{--</div>--}}
    </div>
@endsection
