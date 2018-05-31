@extends('basico')

@section('content')

    <div class='col-sm-11'>
        @if ($acao == 1)
            <h2> Cadastro de Campanhas </h2>
        @else
            <h2> Editar Campanha </h2>
        @endif
    </div>
    <div class='col-sm-1'>
        <a href="{{route('campanhas.index')}}" class="btn btn-default">Voltar</a>
    </div>


    @if ($acao == 1)
        <form method="post" action="{{route('campanhas.store')}}">
            @else
                <form method="post" action="{{route('campanhas.update', $registro->id)}}">
                    {!! method_field('put') !!}
                    @endif
                    {{ csrf_field() }}

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome"
                                   value="{{$registro->nome or old('nome')}}">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <label for="descricao" class="col-md-4 control-label">Descrição</label>
                        <div class="col-md-6">
                            <textarea id="descricao" class="form-control" name="descricao"
                            >{{$registro->descricao or old('descricao')}}</textarea>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="dataInicio">Data inicial</label>
                            <input type="date" class="form-control" id="dataInicio" name="dataInicio"
                                   value="{{$registro->dataInicio or old('dataInicio')}}">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="dataFim">Data final</label>
                            <input type="date" class="form-control" id="dataFim" name="dataFim"
                                   value="{{$registro->dataFim or old('dataFim')}}">
                        </div>
                    </div>


                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-default">Enviar</button>
                        <button type="reset" class="btn btn-default">Limpar</button>
                    </div>

                </form>

@endsection