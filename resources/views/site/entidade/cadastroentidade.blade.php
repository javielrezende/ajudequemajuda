@extends('rodapesite')
@extends('basicosite')

@section('content')

    <div class="row cadastrousuario">

        <a href="{{url('/entidade-site')}}" class="linkReturn">HOME</a>

        <p class="row col-md-12 titulosPrincipais">Meu cadastro</p>

        {{---------------------------------------------------------------------------------------}}
        {{-----------SOLICITAR ENCERRAMENTO DE CONTA DE ENTIDADE---------------------------------}}
        <div class="container">
            <div class="row justify-content-center">
                <button type="submit" class="btn addC" data-toggle="modal" data-target="#modalEmail">
                    Solicitar encerramento de cadastro
                </button>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="modalEmail" tabindex="-1" role="dialog"
             aria-labelledby="modalEmailTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h6>Olá! Envie um email para <b>ajudequemajuda.sistema@gmail.com</b>. Explique o motivo de sua saída do sistema!</h6>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn addS" data-dismiss="modal">Ok
                            </button>
                        </div>

                </div>
            </div>
        </div>
        {{--Fim Modal--}}


        {{---------------------------------------------------------------------------------------}}
        {{-----------SOLICITAR ENCERRAMENTO DE CONTA DE ENTIDADE---------------------------------}}


        <form class="row geraleditor" method="post" enctype="multipart/form-data"
              action="{{route('entidade-site.update', $entidade->id)}}">
            {!! method_field('put') !!}
            {{ csrf_field() }}

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <div class="row">
                            <label for="name" class="editarCampo">Nome</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        {{--<p class="resultado">{{$entidade->name}}</p>--}}
                        <input type="text" class="form-control" id="name" name="name"
                               placeholder="Insira seu nome completo"
                               value="{{$entidade->name or old('name')}}">
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <div class="row">
                            <label for="email" class="editarCampo">E-mail</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        {{--<p class="resultado">{{$entidade->email}}</p>--}}
                        <input type="email" class="form-control" id="email" name="email"
                               placeholder="email@provedor.com"
                               value="{{$entidade->email or old('email')}}">
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <div class="row">
                            <label for="cnpj" class="editarCampo">CNPJ</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        {{--<p class="resultado" id="cnpj">{{$entidade->cnpj}}</p>--}}
                        <input type="text" class="form-control" id="cnpj" name="cnpj"
                               placeholder="00.000.000/0000-00"
                               value="{{$entidade->cnpj or old('cnpj')}}">
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <div class="row">
                            <label for="fone" class="editarCampo">Fone</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        {{--<p class="resultado">{{$entidade->fone}}</p>--}}
                        <input type="tel" class="form-control" id="fone" name="fone"
                               placeholder="(DDD) 00000-0000"
                               value="{{$entidade->fone or old('fone')}}">
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
                        {{--<p class="resultado" id="cep">{{$entidade->endereco->cep}}</p>--}}
                        <input type="text" class="form-control" id="cep" name="cep"
                               onblur="pesquisacep(this.value);" placeholder="ex.: 96055-510"
                               value="{{$entidade->endereco->cep or old('cep')}}">
                    </div>

                    <div class="form-group col d">
                        <div class="row">
                            <label for="rua" class="editarCampo">Rua</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        {{--<p class="resultado">{{$entidade->endereco->rua}}</p>--}}
                        <input type="text" class="form-control" id="rua" name="rua"
                               placeholder="ex.: Av. Duque de Caxias"
                               value="{{$entidade->endereco->rua or old('rua')}}">
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col e">
                        <div class="row">
                            <label for="numero" class="editarCampo">Número</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        {{--<p class="resultado">{{$entidade->endereco->numero}}</p>--}}
                        <input type="text" class="form-control" id="numero" name="numero"
                               placeholder="ex.: 650"
                               value="{{$entidade->endereco->numero or old('numero')}}">
                    </div>

                    <div class="form-group col d">
                        <div class="row">
                            <label for="complemento" class="editarCampo">Complemento</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        {{--<p class="resultado">{{$entidade->endereco->complemento}}</p>--}}
                        <input type="text" class="form-control" id="complemento" name="complemento"
                               placeholder="ex.: Apto. 102"
                               value="{{$entidade->endereco->complemento or old('complemento')}}">
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
                        {{--<p class="resultado">{{$entidade->endereco->bairro}}</p>--}}
                        <input type="text" class="form-control" id="bairro" name="bairro"
                               placeholder="Insira seu bairro"
                               value="{{$entidade->endereco->bairro or old('bairro')}}">
                    </div>

                    <div class="form-group col m">
                        <div class="row">
                            <label for="estado" class="editarCampo">Estado</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        {{--<p class="resultado">{{$entidade->endereco->estado}}</p>--}}
                        <select class="custom-select" name="estado" id="estado">
                            <option value="{{$entidade->endereco->estado or old('estado')}}">Escolha seu estado</option>
                        </select>
                    </div>

                    <div class="form-group col">
                        <div class="row">
                            <label for="cidade" class="editarCampo">Cidade</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        {{--<p class="resultado">{{$entidade->endereco->cidade}}</p>--}}
                        <select class="custom-select" name="cidade" id="cidade">
                            <option value="{{$entidade->endereco->cidade or old('cidade')}}">Insira sua cidade</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <label class="add" for="imagem">Inserir imagem de perfil</label>
                        <input type="file" id="imagem" name="imagem"
                               onchange="previewFile()">

                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                @if($entidade->imagem == null || $entidade->imagem == "")
                    <img src='../imagens/perfil.png' id='imagem_preview' height='150px' width='150px'
                         alt='Foto do perfil' class='rounded-circle'>
                @else
                    <img src="{{ asset(Auth::user()->imagem) }}" id='imagem_preview' height='150px' width='150px'
                         alt='Foto do perfil' class='rounded-circle'>
                @endif
            </div>

            <div style="margin-bottom: 35px" class="container">
                <div class="row justify-content-end">
                    &nbsp;&nbsp;&nbsp;<button type="submit" class="btn env">Enviar</button>
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
    </script>
@endsection