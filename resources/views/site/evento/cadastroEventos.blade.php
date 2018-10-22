@extends('rodapesite')
@extends('basicosite')

@section('content')

    <div class="row editarEvento">
        <a href="{{url('/entidade-site')}}" class="linkReturn">HOME</a>

        <p class="row col-md-12 titulosPrincipais">{{ $evento->nome }}</p>


        <div class="geralEditor">

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <div class="row">
                            <label for="nome" class="editarCampo">Nome</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        <p class="resultado">{{$evento->nome}}</p>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col e">
                        <div class="row">
                            <label for="dataHoraInicio" class="editarCampo">Data inicial</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        <p class="resultado">{{$entidade->dataHoraInicio}}</p>
                    </div>

                    <div class="form-group col d">
                        <div class="row">
                            <label for="dataHoraFim" class="editarCampo">Data final</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        <p class="resultado">{{$entidade->dataHoraFim}}</p>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col e">
                        <div class="row">
                            <label for="dataHoraInicio1" class="editarCampo">Hora inicial</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        <p class="resultado">{{$entidade->dataHoraInicio1}}</p>
                    </div>

                    <div class="form-group col d">
                        <div class="row">
                            <label for="dataHoraFim1" class="editarCampo">Hora final</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        <p class="resultado">{{$entidade->dataHoraFim1}}</p>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <div class="row">
                            {{--<label for="campanha">Campanha <span class="obr">*</span></label>
                            <select class="form-control" id="campanha" name="campanha" required>
                                @foreach($campanhas as $c)
                                    <option value="{{$c->id}}"
                                            @if ((isset($registro) and $registro->campanha_id == $c->id) or
                                                 old('campanha_id') == $c->id) selected @endif>
                                        {{$c->nome}}</option>
                                @endforeach
                            </select>--}}
                            <label for="campanha" class="editarCampo">Campanha</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        <p class="resultado">{{$evento->campanhas->nome}}</p>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col e">
                        <div class="row">
                            <label for="cep" class="editarCampo">CEP</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        <p class="resultado">{{$evento->enderecos->cep}}</p>
                    </div>

                    <div class="form-group col d">
                        <div class="row">
                            <label for="rua" class="editarCampo">Rua</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        <p class="resultado">{{$evento->enderecos->rua}}</p>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col e">
                        <div class="row">
                            <label for="numero" class="editarCampo">Nº</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        <p class="resultado">{{$evento->enderecos->numero}}</p>
                    </div>

                    <div class="form-group col d">
                        <div class="row">
                            <label for="complemento" class="editarCampo">Complemento</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        <p class="resultado">{{$evento->enderecos->complemento}}</p>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <div class="row">
                            <label for="bairro" class="editarCampo">Bairro</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        <p class="resultado">{{$evento->enderecos->bairro}}</p>
                    </div>

                    <div class="form-group col m">
                        <div class="row">
                            <label for="estado" class="editarCampo">Estado</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        {{--<input type="text" class="form-control" id="estado" name="estado"
                               placeholder="Escolha seu estado" required>--}}
                        <p class="resultado">{{$evento->enderecos->estado}}</p>
                    </div>

                    <div class="form-group col">
                        <div class="row">
                            <label for="cidade" class="editarCampo">Cidade</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        {{--<input type="text" class="form-control" id="cidade" name="cidade"
                               placeholder="Insira sua cidade" required>--}}
                        <p class="resultado">{{$evento->enderecos->cidade}}</p>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <div class="row">
                            <label for="descricao" class="editarCampo">Descrição</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        <p class="resultado">{{$evento->descricao}}</p>
                    </div>
                </div>
            </div>


            <div class="container">
                <div class="row justify-content-end">
                    &nbsp;&nbsp;&nbsp;<button type="submit" class="btn cad">ATUALIZAR EVENTO</button>
                </div>
            </div>
        </div>
    </div>

@endsection