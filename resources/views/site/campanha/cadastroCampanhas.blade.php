@extends('rodapesite')
@extends('basicosite')

@section('content')

    <div class="row editarCampanha">
        <a href="{{url('/entidade-site')}}" class="linkReturn">HOME</a>

        <p class="row col-md-12 titulosPrincipais">{{ $campanha->nome }}</p>

        <form class="row" enctype="multipart/form-data" method="post"
              action="{{route('minhas-campanhas.update', $campanha->id)}}">
            {!! method_field('put') !!}
            {{ csrf_field() }}
            <div class="geraleditor">

                <div class="container">
                    <div class="row">
                        <div class="form-group col">
                            <div class="row">
                                <label for="name" class="editarCampo">Nome</label>
                                <p class="editar">[EDITAR]</p>
                            </div>
                            <input type="text" class="form-control" value="{{$campanha->nome or old('nome')}}"
                                   name="nome" id="nome">
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="form-group col e">
                            <div class="row">
                                <label for="dataInicio" class="editarCampo">Data inicial</label>
                                <p class="editar">[EDITAR]</p>
                            </div>
                            <input autocomplete="off" type="text" data-toggle="popover" data-trigger="hover" title=""
                                   data-content="Se você não escolher esta opção sua campanha será permanente, sem data final! :)"
                                   class="form-control" id="dataInicio" name="dataInicio"
                                   value="{{$campanha->dataInicio or old('dataInicio')}}"
                                   data-original-title="Sua campanha pode ser permanente!">
                        </div>

                        <div class="form-group col d">
                            <div class="row">
                                <label for="dataFim" class="editarCampo">Data final</label>
                                <p class="editar">[EDITAR]</p>
                            </div>
                            {{--<p class="resultado">{{$campanha->dataFim}}</p>--}}
                            <input autocomplete="off" type="text" value="{{$campanha->dataFim or old('dataFim')}}"
                                   class="form-control"
                                   id="dataFim" name="dataFim">
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="form-group col">
                            <label for="item">Novo ítem</label>
                            <input type="text" class="form-control" id="inItem"
                                   placeholder="O que deseja receber na campanha...">
                        </div>

                        <div class="form-group col m">
                            <input style="height: 20px; width: 20px; margin-right: 8px; background-color: white"
                                   id="inUrgente" type="checkbox" class="form-control"
                                   value={{1}}>
                            <label for="urgente">Urgente</label>
                        </div>

                        <div class="form-group col">
                            <label for="quantidade">Quantidade</label>
                            <input type="number" class="form-control" id="inQuantidade"
                                   placeholder="Ex.: 999">
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="form-group col">
                            <button type="button" id="btAdicionar" data-editar="true" class="btn add">Adicionar</button>
                            <button type="button" id="btAtualizar" hidden class="btn add">Atualizar</button>
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
                            <textarea id="descricao" rows="6" class="form-control"
                                      placeholder="O que for digitado neste campo aparecerá como descrição da sua campanha..."
                                      name="descricao">{{$campanha->descricao  or old('descricao')}}</textarea>
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
                    <img src='/{{$campanha->imagens[0]->caminho}}' id='imagem_preview' height='150px' width='150px' alt='Foto do perfil' class='rounded-circle'>
                </div>


                <div class="container">
                    <div class="row justify-content-end">
                        &nbsp;&nbsp;&nbsp;<button type="submit" class="btn cad">ATUALIZAR CAMPANHA</button>
                    </div>
                </div>
            </div>


            <div class="alinhamentoItens" id="alinhamentoItens">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Ítens</th>
                        <th scope="col" class="ur">Urgência</th>
                    </tr>
                    </thead>
                    <tbody>
                    {{--<tr>
                        <td id="name">{{name}}</td>
                        <td id="checked" class="ch">${inUrgente.checked ? '<i class="fas fa-check"></i>' : ''}</td>
                        <td id="qtd" class="ch">${inQuantidade.value}</td>
                        <td><i class="fas fa-p en"></i></td>

                        <td>
                            <i class="fas fa-pen" onclick="editarItem(this)">
                        </td>
                        <td>
                            <input type="hidden" name="descricaoItem[]" value="${inItem.value}"/>
                            <input type="hidden" name="quantidade[]" value="${inQuantidade.value}"/>
                            <input type="hidden" name="urgencia[]" value="${inUrgente.checked}"/>
                            <i class="fas fa-trash-alt" onclick="this.parentElement.parentElement.remove()"></i>
                        </td>
                    </tr>--}}
                    </tbody>
                </table>
                <div class="container">
                    <div class="row justify-content-end">
                        <button type="button" class="btn addB" data-toggle="modal" data-target="#modalEmailCenter">
                            Enviar
                            e-mail para seguidores
                        </button>


                    </div>
                </div>
            </div>
        </form>

        <!-- Modal -->
        <div class="modal fade" id="modalEmailCenter" tabindex="-1" role="dialog"
             aria-labelledby="modalEmailCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form name="formEmail" class="" method="post" action="{{route('enviar-email')}}">
                        {{ csrf_field() }}
                        <div class="modal-header">
                            <h6 class="modal-title" id="modalEmailCenterTitle">Mensagem</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="text" style="display: none" name="nomeCampanha"
                                   id="nomeCampanha"
                                   value="{{$campanha->nome}}">
                            <input type="text" style="display: none" name="idCampanha" id="idCampanha"
                                   value="{{$campanha->id}}">
                            <textarea id="mensagemEmail" rows="6" class="form-control"
                                      placeholder="Escreva o que os seguidores irão receber no corpo do e-mail..."
                                      name="mensagemEmail" autofocus></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn addS" data-dismiss="modal">Cancelar
                            </button>
                            <button type="submit" class="btn addB">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{--Fim Modal--}}


        <div class="row final">
            <div class="finalCurtidas">
                <p class="row col-md-12 titulosPrincipais">Curtidas <span id="qnt"
                                                                          style="font-size: 18px; font-weight: lighter; margin-left: 7px; margin-top: 7px">(55)</span>
                </p>
                <div class="imgcurtidas">
                    <img class="imgperfilref" src="{{ asset('imagens/perfil.png') }}"
                         alt="Foto de perfil"></a>
                    <img class="imgperfilref" src="{{ asset('imagens/perfil.png') }}"
                         alt="Foto de perfil"></a>
                    <img class="imgperfilref" src="{{ asset('imagens/perfil.png') }}"
                         alt="Foto de perfil"></a>
                    <img class="imgperfilref" src="{{ asset('imagens/perfil.png') }}"
                         alt="Foto de perfil"></a>
                    <img class="imgperfilref" src="{{ asset('imagens/perfil.png') }}"
                         alt="Foto de perfil"></a>
                    <img class="imgperfilref" src="{{ asset('imagens/perfil.png') }}"
                         alt="Foto de perfil"></a>
                    <img class="imgperfilref" src="{{ asset('imagens/perfil.png') }}"
                         alt="Foto de perfil"></a>
                    <img class="imgperfilref" src="{{ asset('imagens/perfil.png') }}"
                         alt="Foto de perfil"></a>

                </div>
                <div class="container b">
                    <div class="row justify-content-end">
                        <button type="button" id="btAdicionar" class="btn addB">Ver mais</button>
                    </div>
                </div>
            </div>

            <div class="finalComentarios">
                <p class="row col-md-12 titulosPrincipais">Usuários interessados <span id="qnt"
                                                                                       style="font-size: 18px; font-weight: lighter; margin-left: 7px; margin-top: 7px">(55)</span>
                </p>

                <div class="imgcurtidas">
                    <img class="imgperfilref" src="{{ asset('imagens/perfil.png') }}"
                         alt="Foto de perfil"></a>
                    <img class="imgperfilref" src="{{ asset('imagens/perfil.png') }}"
                         alt="Foto de perfil"></a>
                    <img class="imgperfilref" src="{{ asset('imagens/perfil.png') }}"
                         alt="Foto de perfil"></a>
                    <img class="imgperfilref" src="{{ asset('imagens/perfil.png') }}"
                         alt="Foto de perfil"></a>
                    <img class="imgperfilref" src="{{ asset('imagens/perfil.png') }}"
                         alt="Foto de perfil"></a>
                    <img class="imgperfilref" src="{{ asset('imagens/perfil.png') }}"
                         alt="Foto de perfil"></a>
                    <img class="imgperfilref" src="{{ asset('imagens/perfil.png') }}"
                         alt="Foto de perfil"></a>
                    <img class="imgperfilref" src="{{ asset('imagens/perfil.png') }}"
                         alt="Foto de perfil"></a>

                </div>
                <div class="container b">
                    <div class="row justify-content-end">
                        <button type="button" id="btAdicionar" class="btn addB">Ver mais</button>
                    </div>
                </div>
            </div>
        </div>
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
    </script>


@endsection