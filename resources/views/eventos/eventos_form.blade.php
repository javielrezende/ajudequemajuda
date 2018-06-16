@extends('basico')

@section('content')

    <div class='col-sm-11'>
        @if ($acao == 1)
            <h2> Cadastro de Eventos </h2>
        @else
            <h2> Alteração de dados cadastrados </h2>
        @endif
    </div>
    <div class='col-sm-1'>
        <a href="{{route('eventos.index')}}" class="btn btn-default">Voltar</a>
    </div>


    @if ($acao == 1)
        <form method="post" action="{{route('eventos.store')}}">
            @else
                <form method="post" action="{{route('eventos.update', $registro->id)}}">
                    {!! method_field('put') !!}
                    @endif
                    {{ csrf_field() }}

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <input type="text" class="form-control" id="descricao" name="descricao"
                                   value="{{$registro->descricao or old('descricao')}}">
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="dataInicio">Data inicial</label>
                            <div class="input-group date">
                                <input autocomplete="off" type="text" class="form-control" id="dataInicio" name="dataInicio"
                                       value="{{$registro->dataInicio or old('dataInicio')}}"></div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="dataFim">Data final</label>
                            <div class="input-group date">
                                <input autocomplete="off" type="text" class="form-control" id="dataFim" name="dataFim"
                                       value="{{$registro->dataFim or old('dataFim')}}"></div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="cep">CEP</label>
                            <input type="text" class="form-control" id="cep" name="cep"
                                   value="{{$registro->enderecos->cep or old('cep')}}">
                        </div>
                    </div>

                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="rua">Rua</label>
                            <input type="text" class="form-control" id="rua" name="rua"
                                   value="{{$registro->enderecos->rua or old('rua')}}">
                        </div>
                    </div>

                    <div class="col-sm-1">
                        <div class="form-group">
                            <label for="numero">Nº</label>
                            <input type="text" class="form-control" id="numero" name="numero"
                                   value="{{$registro->enderecos->numero or old('numero')}}">
                        </div>
                    </div>

                    <div class="col-sm-1">
                        <div class="form-group">
                            <label for="complemento">Complemento</label>
                            <input type="text" class="form-control" id="complemento" name="complemento"
                                   value="{{$registro->enderecos->complemento or old('complemento')}}">
                        </div>
                    </div>

                    <div class="col-sm-5">
                        <div class="form-group">
                            <label for="bairro">Bairro:</label>
                            <input type="text" class="form-control" id="bairro" name="bairro"
                                   value="{{$registro->enderecos->bairro or old('bairro')}}">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="cidade">Cidade:</label>
                            <input type="text" class="form-control" id="cidade" name="cidade"
                                   value="{{$registro->enderecos->cidade or old('cidade')}}">
                        </div>
                    </div>

                    <div class="col-sm-1">
                        <div class="form-group">
                            <label for="estado">Estado:</label>
                            <input type="text" class="form-control" id="estado" name="estado"
                                   value="{{$registro->enderecos->estado or old('estado')}}">
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-default">Enviar</button>
                        <button type="reset" class="btn btn-default">Limpar</button>
                    </div>

                </form>





@endsection