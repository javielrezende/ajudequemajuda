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
                    <th>Id</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Fone</th>
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
                        <td class="row">
                            @if($mensagem->status == 0)
                                <div><a href="{{route('faleconoscoadmin.edit', $mensagem->id)}}"
                                        class="btn btn-outline-warning btn-sm m-2">Ver mensagem</a>
                                </div>
                            @else
                                <div><a href="{{route('faleconoscoadmin.edit', $mensagem->id)}}"
                                        class="btn btn-outline-light btn-sm m-2">Ver mensagem</a>
                                </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{--</div>--}}
    </div>
@endsection
