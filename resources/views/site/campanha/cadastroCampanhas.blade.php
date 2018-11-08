@extends('rodapesite')
@extends('basicosite')

@section('content')

    <div class="row editarCampanha">
        <a href="{{url('/entidade-site')}}" class="linkReturn">HOME</a>

        <p class="row col-md-12 titulosPrincipais">{{ $campanha->nome }}</p>

        <div class="geraleditor">


            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <div class="row">
                            <label for="name" class="editarCampo">Nome</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        <p class="resultado">{{$entidade->name}}</p>
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
                        <p class="resultado">{{$campanha->dataInicio}}</p>
                    </div>

                    <div class="form-group col d">
                        <div class="row">
                            <label for="dataFim" class="editarCampo">Data final</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        <p class="resultado">{{$campanha->dataFim}}</p>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <label for="item">Novo ítem</label>
                        <input type="text" class="form-control" id="inItem" name="item"
                               placeholder="O que deseja receber na campanha..." required>
                    </div>

                    <div class="form-group col m">
                        <input style="height: 20px; width: 20px; margin-right: 8px; background-color: white"
                               id="inUrgente" type="checkbox" class="form-control"
                               name="urgente"
                               value={{1}}>
                        <label for="urgente">Urgente</label>
                    </div>

                    <div class="form-group col">
                        <label for="quantidade">Quantidade</label>
                        <input type="number" class="form-control" id="inQuantidade" name="quantidade"
                               placeholder="Ex.: 999" required>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <button type="button" id="btAdicionar" class="btn add">Adicionar</button>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <div class="row">
                            <label for="descricao" class="editarCampo">Desscrição</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        <p class="resultado">{{$campanha->descricao}}</p>
                    </div>
                </div>
            </div>


            <div class="container">
                <div class="row justify-content-end">
                    &nbsp;&nbsp;&nbsp;<button type="submit" class="btn cad">ATUALIZAR CAMPANHA</button>
                </div>
            </div>
        </div>


        <div class="alinhamentoItens">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Ítens</th>
                    <th scope="col" class="ur">Urgência</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Arroz</td>
                    <td class="ch"><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-pen"></i></td>
                    <td><i class="fas fa-trash-alt"></i></td>
                </tr>
                <tr>
                    <td>Feijao</td>
                    <td class="ch"><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-pen"></i></td>
                    <td><i class="fas fa-trash-alt"></i></td>
                </tr>
                <tr>
                    <td>Massa</td>
                    <td class="ch"><i class="fas fa-check"></i></td>
                    <td><i class="fas fa-pen"></i></td>
                    <td><i class="fas fa-trash-alt"></i></td>
                </tr>
                </tbody>
            </table>
            <div class="container">
                <div class="row justify-content-end">
                    <button type="button" class="btn addB" data-toggle="modal" data-target="#modalEmailCenter">Enviar
                        e-mail para seguidores
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="modalEmailCenter" tabindex="-1" role="dialog"
                         aria-labelledby="modalEmailCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form class="" method="post" action="{{route('enviar-email')}}">
                                    {{ csrf_field() }}
                                    <div class="modal-header">
                                        <h6 class="modal-title" id="modalEmailCenterTitle">Mensagem</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <textarea id="mensagemEmail" rows="6" class="form-control"
                                              placeholder="Escreva o que os seguidores irão receber no corpo do e-mail..."
                                              name="mensagemEmail"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn addS" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn addB">Enviar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



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


@endsection