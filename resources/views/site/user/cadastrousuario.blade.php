@extends('rodapesite')
@extends('basicosite')

@section('content')

    <div class="row cadastrousuario">

        <a href="{{url('/aqa')}}" class="linkReturn">HOME</a>

        <p class="row col-md-12 titulosPrincipais">Meu cadastro</p>

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

        <form class="row geraleditor" method="post" enctype="multipart/form-data"
              action="{{route('usuario-site.update', $usuario->id)}}">
            {!! method_field('put') !!}
            {{ csrf_field() }}

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <div class="row">
                            <label for="name" class="editarCampo">Nome</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        {{--<p class="resultado">{{$usuario->name}}</p>--}}
                        <input type="text" class="form-control" id="name" name="name"
                               placeholder="Insira seu nome completo"
                               value="{{$usuario->name or old('name')}}">
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
{{--                        <p class="resultado">{{$usuario->email}}</p>--}}
                        <input type="email" class="form-control" id="email" name="email"
                               placeholder="email@provedor.com"
                               value="{{$usuario->email or old('email')}}">
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <div class="row">
                            <label for="cpf" class="editarCampo">CPF</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
{{--                        <p class="resultado" id="cpf">{{$usuario->cpf}}</p>--}}
                        <input type="text" class="form-control" id="cpf" name="cpf"
                               placeholder="000.000.000-00"
                               value="{{$usuario->cpf or old('cpf')}}">
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
                       {{-- <p class="resultado">{{$usuario->fone}}</p>--}}
                        <input type="tel" class="form-control" id="fone" name="fone"
                               placeholder="(DDD) 00000-0000"
                               value="{{$usuario->fone or old('fone')}}">
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
                        {{--<p class="resultado" id="cep">{{$usuario->endereco->cep}}</p>--}}
                        <input type="text" class="form-control" id="cep" name="cep"
                               onblur="pesquisacep(this.value);" placeholder="ex.: 96055-510"
                               value="{{$usuario->endereco->cep or old('cep')}}">
                    </div>

                    <div class="form-group col d">
                        <div class="row">
                            <label for="rua" class="editarCampo">Rua</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        {{--<p class="resultado">{{$usuario->endereco->rua}}</p>--}}
                        <input type="text" class="form-control" id="rua" name="rua"
                               placeholder="ex.: Av. Duque de Caxias"
                               value="{{$usuario->endereco->rua or old('rua')}}">
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
                        {{--<p class="resultado">{{$usuario->endereco->numero}}</p>--}}
                        <input type="text" class="form-control" id="numero" name="numero"
                               placeholder="ex.: 650"
                               value="{{$usuario->endereco->numero or old('numero')}}">
                    </div>

                    <div class="form-group col d">
                        <div class="row">
                            <label for="complemento" class="editarCampo">Complemento</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        {{--<p class="resultado">{{$usuario->endereco->complemento}}</p>--}}
                        <input type="text" class="form-control" id="complemento" name="complemento"
                               placeholder="ex.: Apto. 102"
                               value="{{$usuario->endereco->complemento or old('complemento')}}">
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
                        {{--<p class="resultado">{{$usuario->endereco->bairro}}</p>--}}
                        <input type="text" class="form-control" id="bairro" name="bairro"
                               placeholder="Insira seu bairro"
                               value="{{$usuario->endereco->bairro or old('bairro')}}">
                    </div>

                    <div class="form-group col m">
                        <div class="row">
                            <label for="estado" class="editarCampo">Estado</label>
                            <p class="editar">[EDITAR]</p>
                        </div>

                        <select class="custom-select" name="estado" id="estado">
                            <option disabled hidden selected
                                    value="{{$usuario->endereco->estado or old('estado')}}">{{$usuario->endereco->estado or old('estado')}}</option>
                            <option value="{{$usuario->endereco->estado or old('estado')}}">Escolha seu Estado</option>

                        </select>
                    </div>

                    <div class="form-group col">
                        <div class="row">
                            <label for="cidade" class="editarCampo">Cidade</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        {{--<p class="resultado">{{$usuario->endereco->cidade}}</p>--}}
                        <select class="custom-select" name="cidade" id="cidade">
                            <option disabled hidden selected
                                    value="{{$usuario->endereco->cidade or old('cidade')}}">{{$usuario->endereco->cidade or old('cidade')}}</option>
                            <option value="{{$usuario->endereco->cidade or old('cidade')}}">Insira sua cidade</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <label class="add" for="imagem">Alterar imagem de perfil</label>
                        <input type="file" id="imagem" name="imagem"
                               onchange="previewFile()">

                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                @if($usuario->imagem == null || $usuario->imagem == "")
                    <img src='https://s3-sa-east-1.amazonaws.com/ajudequemajuda/geral/avatar1.jpg' id='imagem_preview' height='150px' width='150px'
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