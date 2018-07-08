@extends('basico')

@section('content')
    <div class="row cadastro">
        <div class='col-sm-11'>
            @if ($acao == 1)
                <h2> Cadastro de Campanhas </h2>
            @else
                <h2> Editar Campanha </h2>
            @endif
        </div>
        <div class='col-sm-1'>
            <a href="{{route('campanhas.index')}}" class="btn btn-outline-primary btn-sm">Voltar</a>
        </div>


        @if ($acao == 1)
            <form class="row" method="post" action="{{route('campanhas.store')}}">
                @else
                    <form class="row" method="post" action="{{route('campanhas.update', $registro->id)}}">
                        {!! method_field('put') !!}
                        @endif
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="nome">Nome <span class="obr">*</span></label>
                            <input type="text" class="form-control" id="nome" name="nome"
                                   value="{{$registro->nome or old('nome')}}" required autofocus>
                        </div>

                        <div class="form-group col-2">
                            <label for="entidade">Entidade <span class="obr">*</span></label>
                            <select class="form-control" id="entidade" name="entidade" required>
                                @foreach($entidades as $e)
                                    <option value="{{$e->id}}"
                                            @if ((isset($registro) and $registro->user_id == $e->id) or
                                                 old('user_id') == $e->id) selected @endif>
                                        {{$e->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group col-2">
                            <label for="dataInicio">Data inicial</label>
                            <div class="input-group date">
                                <input autocomplete="off" type="text" class="form-control" id="dataInicio"
                                       name="dataInicio"
                                       value="{{$registro->dataInicio or old('dataInicio')}}"></div>
                        </div>

                        <div class="form-group col-2">
                            <label for="dataFim">Data final</label>
                            <div class="input-group date">
                                <input autocomplete="off" type="text" class="form-control" id="dataFim"
                                       name="dataFim"
                                       value="{{$registro->dataFim or old('dataFim')}}"></div>
                        </div>

                        <div class="form-group">
                            <label for="descricao">Descrição <span class="obr">*</span></label>
                            <textarea id="descricao" rows="5" class="form-control" name="descricao" required
                            >{{$registro->descricao or old('descricao')}}</textarea>
                        </div>

                        <div>
                            &nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-outline-success btn-sm">Enviar</button>
                            &nbsp;&nbsp;&nbsp;<button type="reset" class="btn btn-outline-warning btn-sm">Limpar</button>
                        </div>

                    </form>
            </form>
    </div>
@endsection