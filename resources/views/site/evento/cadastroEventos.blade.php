@extends('rodapesite')
@extends('basicosite')

@section('content')

    <div class="row editarEvento">
        <a href="{{url('/entidade-site')}}" class="linkReturn">HOME</a>

        <p class="row col-md-12 titulosPrincipais">Evento - {{ $evento->nome }}</p>

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
                               name="dataHoraInicio" value="{{$entidade->dataHoraInicio or old('dataHoraInicio')}}">
                    </div>

                    <div class="form-group col d">
                        <div class="row">
                            <label for="dataHoraFim" class="editarCampo">Data final</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        {{--<p class="resultado">{{$entidade->dataHoraFim}}</p>--}}
                        <input autocomplete="off" type="text" class="form-control" id="dataHoraFim"
                               name="dataHoraFim" value="{{$entidade->dataHoraFim or old('dataHoraFim')}}">
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
                        {{--<p class="resultado">{{$entidade->dataHoraInicio1}}</p>--}}
                        <input autocomplete="off" type="text" class="form-control datetimepicker-input"
                               data-toggle="datetimepicker" data-target="#dataHoraInicio1" id="dataHoraInicio1"
                               name="dataHoraInicio1" value="{{$entidade->dataHoraInicio1 or old('dataHoraInicio1')}}">
                    </div>

                    <div class="form-group col d">
                        <div class="row">
                            <label for="dataHoraFim1" class="editarCampo">Hora final</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        {{--                        <p class="resultado">{{$entidade->dataHoraFim1}}</p>--}}
                        <input autocomplete="off" type="text" class="form-control datetimepicker-input"
                               data-toggle="datetimepicker" data-target="#dataHoraFim1" id="dataHoraFim1"
                               name="dataHoraFim1" value="{{$entidade->dataHoraFim1 or old('dataHoraFim1')}}">
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
                        {{--<p class="resultado">{{$evento->campanhas->nome}}</p>--}}
                        <select class="form-control" id="campanha" name="campanha" required>
                            {{--<option value=”” disabled selected>Escolha a campanha relacionada ao Evento...</option>--}}
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
                        {{--<input type="text" class="form-control" id="estado" name="estado"
                               placeholder="Escolha seu estado" required>--}}
                        {{--                        <p class="resultado">{{$evento->enderecos->estado}}</p>--}}
                        <select class="custom-select" name="estado" id="estado">
                            <option value="{{$evento->enderecos->estado or old('estado')}}">Escolha seu estado</option>
                        </select>
                    </div>

                    <div class="form-group col">
                        <div class="row">
                            <label for="cidade" class="editarCampo">Cidade</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        {{--<input type="text" class="form-control" id="cidade" name="cidade"
                               placeholder="Insira sua cidade" required>--}}
                        {{--<p class="resultadoultado">{{$evento->enderecos->cidade}}</p>--}}
                        <select class="custom-select" name="cidade" id="cidade">
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
                        <label class="add" for="imagem">Alterar imagem da campanha</label>
                        <input type="file" id="imagem" name="imagem"
                               onchange="previewFile()">

                    </div>
                </div>
            </div>

            {{--{{dd($campanha->imagens[0]->caminho)}}--}}

            <div class="col-sm-6">
                @if(!empty($evento->imagens->count() > 0))
                    <img src='/{{$evento->imagens[0]->caminho}}' id='imagem_preview' height='150px' width='150px'
                         alt='Foto do perfil' class='rounded-circle'>
                @else
                    <img src='../imagens/perfil.png' id='imagem_preview' height='150px' width='150px'
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

        /*---------------------------------------------------------------------*/

        function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value = ("");
            document.getElementById('bairro').value = ("");
            document.getElementById('cidade').value = ("");
            document.getElementById('estado').value = ("");
            //document.getElementById('ibge').value=("");
        }

        function meu_callback(conteudo) {
            if (!("erro" in conteudo)) {
                //Atualiza os campos com os valores.
                document.getElementById('rua').value = (conteudo.logradouro);
                document.getElementById('bairro').value = (conteudo.bairro);
                document.getElementById('cidade').value = (conteudo.localidade);
                document.getElementById('estado').value = (conteudo.uf);
                //document.getElementById('ibge').value=(conteudo.ibge);
            } //end if.
            else {
                //CEP não Encontrado.
                limpa_formulário_cep();
                alert("CEP não encontrado.");
            }
        }

        function pesquisacep(valor) {

            //Nova variável "cep" somente com dígitos.
            var cep = valor.replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    document.getElementById('rua').value = "...";
                    document.getElementById('bairro').value = "...";
                    document.getElementById('cidade').value = "...";
                    document.getElementById('estado').value = "...";
                    //document.getElementById('ibge').value="...";

                    //Cria um elemento javascript.
                    var script = document.createElement('script');

                    //Sincroniza com o callback.
                    script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';

                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);

                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        };

    </script>

@endsection