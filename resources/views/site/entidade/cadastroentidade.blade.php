@extends('rodapesite')
@extends('basicosite')

@section('content')

    <div class="row cadastrousuario">

        <a href="{{url('/entidade-site')}}" class="linkReturn">HOME</a>

        <p class="row col-md-12 titulosPrincipais">Meu cadastro</p>

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
                        <p class="resultado">{{$entidade->name}}</p>
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
                        <p class="resultado">{{$entidade->email}}</p>
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
                        <p class="resultado" id="cnpj">{{$entidade->cnpj}}</p>
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
                        <p class="resultado">{{$entidade->fone}}</p>
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
                        <p class="resultado" id="cep">{{$entidade->endereco->cep}}</p>
                    </div>

                    <div class="form-group col d">
                        <div class="row">
                            <label for="rua" class="editarCampo">Rua</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        <p class="resultado">{{$entidade->endereco->rua}}</p>
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
                        <p class="resultado">{{$entidade->endereco->numero}}</p>
                    </div>

                    <div class="form-group col d">
                        <div class="row">
                            <label for="complemento" class="editarCampo">Complemento</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        <p class="resultado">{{$entidade->endereco->complemento}}</p>
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
                        <p class="resultado">{{$entidade->endereco->bairro}}</p>
                    </div>

                    <div class="form-group col m">
                        <div class="row">
                            <label for="estado" class="editarCampo">Estado</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        <p class="resultado">{{$entidade->endereco->estado}}</p>
                    </div>

                    <div class="form-group col">
                        <div class="row">
                            <label for="cidade" class="editarCampo">Cidade</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        <p class="resultado">{{$entidade->endereco->cidade}}</p>
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