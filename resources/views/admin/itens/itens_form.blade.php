@extends('basico')

@section('content')
    <div>
        <div class='col-sm-11'>
            @if ($acao == 1)
                <h2> Cadastro de Ítens </h2>
            @else
                <h2> Alteração de Ítens </h2>
            @endif
        </div>
        <div class='col-sm-1'>
            <a href="{{route('itens.index')}}" class="btn btn-outline-primary btn-sm">Voltar</a>
        </div>


        @if ($acao == 1)
            <form class="row" method="post" action="{{route('itens.store')}}">
                @else
                    <form class="row" method="post" action="{{route('itens.update', $registro->id)}}">
                        {!! method_field('put') !!}
                        @endif
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="descricao">Descrição <span class="obr">*</span></label>
                            <input type="text" class="form-control" id="descricao" name="descricaoItem"
                                   value="{{$registro->descricaoItem or old('descricaoItem')}}" required autofocus>
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