@extends('rodapesite')
@extends('basicosite')

@section('content')

    <div class="row editarEvento">
        <a href="{{url('/entidade-site')}}" class="linkReturn">HOME</a>

        <p class="row col-md-12 titulosPrincipais">Evento - {{ $evento->nome }}</p>

        <div class="col-md-12">
            @if (count($errors) > 0)
                <div class="alert alert-info">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>


        <div class="container">
            <div class="row justify-content-center">

                <form style="display: inline-block"
                      method="post"
                      action="{{route('minhas-campanhas.destroy', $evento->id)}}"
                      onsubmit="return confirm('Confirma Exclusão?')">
                    {{method_field('delete')}}
                    {{csrf_field()}}
                    <button type="submit" class="btn addC">
                        Apagar evento
                    </button>
                </form>

            </div>
        </div>

        <form class="row geralEditor" enctype="multipart/form-data" method="post"
              action="{{route('meus-eventos.update', $evento->id)}}">
            {!! method_field('put') !!}
            {{ csrf_field() }}

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <div class="row">
                            <label for="nome" class="editarCampo">Nome</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        {{--<p class="resultado">{{$evento->nome}}</p>--}}
                        <input type="text" class="form-control" value="{{$evento->nome or old('nome')}}"
                               name="nome" id="nome">
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
                        {{--<p class="resultado">{{$entidade->dataHoraInicio}}</p>--}}
                        <input autocomplete="off" type="text" class="form-control" id="dataHoraInicio"
                               name="dataHoraInicio" value="{{$evento->dataHoraInicio or old('dataHoraInicio')}}">
                    </div>

                    <div class="form-group col d">
                        <div class="row">
                            <label for="dataHoraFim" class="editarCampo">Data final</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        {{--<p class="resultado">{{$evento->dataHoraFim}}</p>--}}
                        <input autocomplete="off" type="text" class="form-control" id="dataHoraFim"
                               name="dataHoraFim" value="{{$evento->dataHoraFim or old('dataHoraFim')}}">
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
                        {{--<p class="resultado">{{$evento->dataHoraInicio1}}</p>--}}
                        <input autocomplete="off" type="text" class="form-control datetimepicker-input"
                               data-toggle="datetimepicker" data-target="#dataHoraInicio1" id="dataHoraInicio1"
                               name="dataHoraInicio1" value="{{$evento->dataHoraInicio1 or old('dataHoraInicio1')}}">
                    </div>

                    <div class="form-group col d">
                        <div class="row">
                            <label for="dataHoraFim1" class="editarCampo">Hora final</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        {{--                        <p class="resultado">{{$evento->dataHoraFim1}}</p>--}}
                        <input autocomplete="off" type="text" class="form-control datetimepicker-input"
                               data-toggle="datetimepicker" data-target="#dataHoraFim1" id="dataHoraFim1"
                               name="dataHoraFim1" value="{{$evento->dataHoraFim1 or old('dataHoraFim1')}}">
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <div class="row">
                            <label for="campanha" class="editarCampo">Campanha</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        <select class="form-control" id="campanha" name="campanha" required>
                           {{-- <option value=”{{$evento->campanhas->id}}” disabled hidden
                                    selected>{{$evento->campanhas->nome}}</option>--}}
                            @foreach($campanhas as $c)
                                <option value="{{$c->id}}"
                                @if ((isset($registro) and $registro->campanha_id == $c->id) or
                                     old('campanha_id') == $c->id)  @endif>
                                    {{$c->nome}}</option>
                            @endforeach
                        </select>
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
                        {{--<p class="resultado">{{$evento->enderecos->cep}}</p>--}}
                        <input type="text" class="form-control" id="cep" name="cep"
                               onblur="pesquisacep(this.value);" placeholder="ex.: 96055-510"
                               value="{{$evento->enderecos->cep or old('cep')}}">
                    </div>

                    <div class="form-group col d">
                        <div class="row">
                            <label for="rua" class="editarCampo">Rua</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        {{--                        <p class="resultado">{{$evento->enderecos->rua}}</p>--}}
                        <input type="text" class="form-control" id="rua" name="rua"
                               placeholder="ex.: Av. Duque de Caxias"
                               value="{{$evento->enderecos->rua or old('rua')}}">
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
                        {{--<p class="resultado">{{$evento->enderecos->numero}}</p>--}}
                        <input type="text" class="form-control" id="numero" name="numero"
                               placeholder="ex.: 650"
                               value="{{$evento->enderecos->numero or old('numero')}}">
                    </div>

                    <div class="form-group col d">
                        <div class="row">
                            <label for="complemento" class="editarCampo">Complemento</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        {{--<p class="resultado">{{$evento->enderecos->complemento}}</p>--}}
                        <input type="text" class="form-control" id="complemento" name="complemento"
                               placeholder="ex.: Apto. 102"
                               value="{{$evento->enderecos->complemento or old('complemento')}}">
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
                        {{--                        <p class="resultado">{{$evento->enderecos->bairro}}</p>--}}
                        <input type="text" class="form-control" id="bairro" name="bairro"
                               placeholder="Insira seu bairro"
                               value="{{$evento->enderecos->bairro or old('bairro')}}">
                    </div>

                    <div class="form-group col m">
                        <div class="row">
                            <label for="estado" class="editarCampo">Estado</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        <select class="custom-select" name="estado" id="estado" required>
                            <option value="{{$evento->enderecos->estado or old('estado')}}">Escolha seu estado</option>
                        </select>
                    </div>

                    <div class="form-group col">
                        <div class="row">
                            <label for="cidade" class="editarCampo">Cidade</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        <select class="custom-select" name="cidade" id="cidade" required>
                            {{--<option disabled hidden selected--}}
                                    {{--value="{{$evento->enderecos->cidade or old('cidade')}}">{{$evento->enderecos->cidade or old('cidade')}}</option>--}}
                            <option value="{{$evento->enderecos->cidade or old('cidade')}}">Insira sua cidade</option>
                        </select>
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
                        {{--<p class="resultadoultadoultado">{{$evento->descricao}}</p>--}}
                        <textarea id="descricao" rows="6" class="form-control"
                                  placeholder="O que for digitado neste campo aparecerá como descrição do seu evento..."
                                  name="descricao">{{$evento->descricao or old('descricao')}}</textarea>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <label class="add" for="imagem">Alterar imagem do evento</label>
                        <input type="file" id="imagem" name="imagem"
                               onchange="previewFile()">

                    </div>
                </div>
            </div>

            {{--{{dd($campanha->imagens[0]->caminho)}}--}}

            <div class="col-sm-6">
                @if(!empty($evento->imagens))
                    <img src='{{$evento->imagens->caminho}}' id='imagem_preview' height='150px' width='150px'
                         alt='Foto do perfil' class='rounded-circle'>
                @else
                    <img src='https://s3-sa-east-1.amazonaws.com/ajudequemajuda/geral/eventos1.jpg' id='imagem_preview'
                         height='150px' width='150px'
                         alt='Foto do perfil' class='rounded-circle'>

                @endif
            </div>


            <div class="container">
                <div class="row justify-content-end">
                    &nbsp;&nbsp;&nbsp;<button type="submit" class="btn cad">ATUALIZAR EVENTO</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Adicionando Javascript -->
    <script type="text/javascript">

        /*---------------------------------------------------------------------*/
        /*Adiciona preview de imagem*/
        function previewFile() {
            let preview = document.getElementById('imagem_preview');
            let file = document.getElementById('imagem').files[0];
            let reader = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
            };

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
            }
        }

    </script>

@endsection