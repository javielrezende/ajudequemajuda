@extends('rodapesite')
@extends('basicosite')

@section('content')

    <div class="row criarEvento">
        <a href="{{url('/entidade-site')}}" class="linkReturn">HOME</a>

        <p class="row col-md-12 titulosPrincipais">Criar Evento</p>


        <form class="row formcriarEvento" method="post" action="{{route('meus-eventos.store')}}">
            {{ csrf_field() }}

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <label for="nome">Nome <span class="obr">*</span></label>
                        <input type="text" class="form-control" id="nome" name="nome"
                               placeholder="ex.: Campanha 1" autofocus required>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col e">
                        <label for="dataInicio">Data inicial</label>
                        <div class="input-group date">
                            <input autocomplete="off" type="text" class="form-control" id="dataInicio"
                                   name="dataInicio">
                        </div>
                    </div>

                    <div class="form-group col d">
                        <label for="dataFim">Data final</label>
                        <div class="input-group date">
                            <input autocomplete="off" type="text" class="form-control" id="dataFim"
                                   name="dataFim">
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        {{--<label for="campanha">Campanha <span class="obr">*</span></label>
                        <select class="form-control" id="campanha" name="campanha" required>
                            @foreach($campanhas as $c)
                                <option value="{{$c->id}}"
                                        @if ((isset($registro) and $registro->campanha_id == $c->id) or
                                             old('campanha_id') == $c->id) selected @endif>
                                    {{$c->nome}}</option>
                            @endforeach
                        </select>--}}
                        <label for="campanha">Campanha <span class="obr">*</span></label>
                        <select class="form-control" id="campanha" name="campanha" required>
                            <option> option 1</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col e">
                        <label for="cep">CEP <span class="obr">*</span></label>
                        <input type="text" class="form-control" id="cep" name="cep"
                               onblur="pesquisacep(this.value);" placeholder="ex.: 96055-510" required>
                    </div>

                    <div class="form-group col d">
                        <label for="rua">Rua <span class="obr">*</span></label>
                        <input type="text" class="form-control" id="rua" name="rua"
                               placeholder="ex.: Av. Duque de Caxias" required>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col e">
                        <label for="numero">Nº <span class="obr">*</span></label>
                        <input type="text" class="form-control" id="numero" name="numero"
                               placeholder="ex.: 650" required>
                    </div>

                    <div class="form-group col d">
                        <label for="complemento">Complemento <span class="obrinv">*</span></label>
                        <input type="text" class="form-control" id="complemento" name="complemento"
                               placeholder="ex.: Apto. 102">
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <label for="bairro">Bairro <span class="obr">*</span></label>
                        <input type="text" class="form-control" id="bairro" name="bairro"
                               placeholder="Insira seu bairro" required>
                    </div>

                    <div class="form-group col m">
                        <label for="estado">Estado <span class="obr">*</span></label>
                        {{--<input type="text" class="form-control" id="estado" name="estado"
                               placeholder="Escolha seu estado" required>--}}
                        <select class="custom-select" name="estado" id="estado">
                            <option value="#" disabled selected>Escolha seu estado</option>
                        </select>
                    </div>

                    <div class="form-group col">
                        <label for="cidade">Cidade <span class="obr">*</span></label>
                        {{--<input type="text" class="form-control" id="cidade" name="cidade"
                               placeholder="Insira sua cidade" required>--}}
                        <select class="custom-select" name="cidade" id="cidade">
                            <option value="#" disabled selected>Insira sua cidade</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <label for="descricao">Descrição <span class="obr">*</span></label>
                        <textarea id="descricao" rows="6" class="form-control"
                                  placeholder="O que for digitado neste campo aparecerá como descrição do seu evento..."
                                  name="descricao"></textarea>
                    </div>
                </div>
            </div>


            <div class="container">
                <div class="row justify-content-end">
                    &nbsp;&nbsp;&nbsp;<button type="submit" class="btn cad">CRIAR EVENTO</button>
                </div>
            </div>
        </form>


    </div>
@endsection