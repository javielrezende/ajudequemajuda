@extends('rodapesite')
@extends('basicosite')

@section('content')

    <div class="row cadastrousuario">

        <a href="{{url('/aqa')}}" class="linkReturn">HOME</a>

        <p class="row col-md-12 titulosPrincipais">Meu cadastro</p>

        <div class="geraleditor">
            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <div class="row">
                            <label for="name" class="editarCampo">Nome</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        <p class="resultado">{{$usuario->name}}</p>
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
                        <p class="resultado">{{$usuario->email}}</p>
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
                        <p class="resultado" id="cpf">{{$usuario->cpf}}</p>
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
                        <p class="resultado">{{$usuario->fone}}</p>
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
                        <p class="resultado" id="cep">{{$usuario->endereco->cep}}</p>
                    </div>

                    <div class="form-group col d">
                        <div class="row">
                            <label for="rua" class="editarCampo">Rua</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        <p class="resultado">{{$usuario->endereco->rua}}</p>
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
                        <p class="resultado">{{$usuario->endereco->numero}}</p>
                    </div>

                    <div class="form-group col d">
                        <div class="row">
                            <label for="complemento" class="editarCampo">Complemento</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        <p class="resultado">{{$usuario->endereco->complemento}}</p>
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
                        <p class="resultado">{{$usuario->endereco->bairro}}</p>
                    </div>

                    <div class="form-group col m">
                        <div class="row">
                            <label for="estado" class="editarCampo">Estado</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        <p class="resultado">{{$usuario->endereco->estado}}</p>
                    </div>

                    <div class="form-group col">
                        <div class="row">
                            <label for="cidade" class="editarCampo">Cidade</label>
                            <p class="editar">[EDITAR]</p>
                        </div>
                        <p class="resultado">{{$usuario->endereco->cidade}}</p>
                    </div>
                </div>
            </div>
            <div style="margin-bottom: 35px" class="container">
                <div class="row justify-content-end">
                    &nbsp;&nbsp;&nbsp;<button type="submit" class="btn env">Enviar</button>
                </div>
            </div>

        </div>
    </div>
@endsection