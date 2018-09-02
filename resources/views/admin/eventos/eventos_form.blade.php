@extends('basico')

@section('content')
    <div class="row cadastro">
        <div class='col-sm-11'>
            @if ($acao == 1)
                <h2> Cadastro de Eventos </h2>
            @else
                <h2> Alteração de dados cadastrados </h2>
            @endif
        </div>
        <div class='col-sm-1'>
            <a href="{{route('eventos.index')}}" class="btn btn-outline-primary btn-sm">Voltar</a>
        </div>


        @if ($acao == 1)
            <form class="row" method="post" action="{{route('eventos.store')}}">
                @else
                    <form class="row" method="post" action="{{route('eventos.update', $registro->id)}}">
                        {!! method_field('put') !!}
                        @endif
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="descricao">Nome <span class="obr">*</span></label>
                            <input type="text" class="form-control" id="nome" name="nome"
                                   value="{{$registro->nome or old('nome')}}" required autofocus>
                        </div>

                        <div class="form-group">
                            <label for="descricao">Descrição <span class="obr">*</span></label>
                            <input type="text" class="form-control" id="descricao" name="descricao"
                                   value="{{$registro->descricao or old('descricao')}}" required autofocus>
                        </div>

                        <div class="form-group col-2">
                            <label for="campanha">Campanha <span class="obr">*</span></label>
                            <select class="form-control" id="campanha" name="campanha" required>
                                @foreach($campanhas as $c)
                                    <option value="{{$c->id}}"
                                            @if ((isset($registro) and $registro->campanha_id == $c->id) or
                                                 old('campanha_id') == $c->id) selected @endif>
                                        {{$c->nome}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-2">
                            <label for="dataHoraInicio">Data inicial</label>
                            <div class="input-group date">
                                <input autocomplete="off" type="text" class="form-control datetimepicker-input"
                                       data-toggle="datetimepicker" data-target="#dataHoraInicio" id="dataHoraInicio"
                                       name="dataHoraInicio"
                                       value="{{$registro->dataHoraInicio or old('dataHoraInicio')}}"></div>
                        </div>

                        <div class="form-group col-2">
                            <label for="dataHoraInicio1">Hora inicial</label>
                            <div class="input-group date">
                                <input autocomplete="off" type="text" class="form-control datetimepicker-input"
                                       data-toggle="datetimepicker" data-target="#dataHoraInicio1" id="dataHoraInicio1"
                                       name="dataHoraInicio1"
                                       value="{{$registro->dataHoraInicio1 or old('dataHoraInicio1')}}"></div>
                        </div>

                        <div class="form-group col-2">
                            <label for="dataHoraFim">Data final</label>
                            <div class="input-group date">
                                <input autocomplete="off" type="text" class="form-control datetimepicker-input"
                                       data-toggle="datetimepicker" data-target="#dataHoraFim" id="dataHoraFim"
                                       name="dataHoraFim"
                                       value="{{$registro->dataHoraFim or old('dataHoraFim')}}">
                            </div>
                        </div>

                        <div class="form-group col-2">
                            <label for="dataHoraFim1">Hora final</label>
                            <div class="input-group date">
                                <input autocomplete="off" type="text" class="form-control datetimepicker-input"
                                       data-toggle="datetimepicker" data-target="#dataHoraFim1" id="dataHoraFim1"
                                       name="dataHoraFim1"
                                       value="{{$registro->dataHoraFim1 or old('dataHoraFim1')}}">
                            </div>
                        </div>

                        <div class="form-group col-2">
                            <label for="cep">CEP <span class="obr">*</span></label>
                            <input type="text" class="form-control" id="cep" name="cep"
                                   value="{{$registro->enderecos->cep or old('cep')}}" required>
                        </div>

                        <div class="form-group">
                            <label for="rua">Rua <span class="obr">*</span></label>
                            <input type="text" class="form-control" id="rua" name="rua"
                                   value="{{$registro->enderecos->rua or old('rua')}}" required>
                        </div>

                        <div class="form-group col-1">
                            <label for="numero">Nº <span class="obr">*</span></label>
                            <input type="text" class="form-control" id="numero" name="numero"
                                   value="{{$registro->enderecos->numero or old('numero')}}" required>
                        </div>

                        <div class="form-group">
                            <label for="complemento">Complemento</label>
                            <input type="text" class="form-control" id="complemento" name="complemento"
                                   value="{{$registro->enderecos->complemento or old('complemento')}}">
                        </div>

                        <div class="form-group col-2">
                            <label for="bairro">Bairro <span class="obr">*</span></label>
                            <input type="text" class="form-control" id="bairro" name="bairro"
                                   value="{{$registro->enderecos->bairro or old('bairro')}}" required>
                        </div>

                        <div class="form-group col-2">
                            <label for="cidade">Cidade <span class="obr">*</span></label>
                            <input type="text" class="form-control" id="cidade" name="cidade"
                                   value="{{$registro->enderecos->cidade or old('cidade')}}" required>
                        </div>

                        <div class="form-group">
                            <label for="estado">Estado <span class="obr">*</span></label>
                            <input type="text" class="form-control" id="estado" name="estado"
                                   value="{{$registro->enderecos->estado or old('estado')}}" required>
                        </div>

                        <div>
                            &nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-outline-success btn-sm">Enviar
                            </button>
                            &nbsp;&nbsp;&nbsp;<button type="reset" class="btn btn-outline-warning btn-sm">Limpar
                            </button>
                        </div>
                    </form>
            </form>
    </div>
@endsection