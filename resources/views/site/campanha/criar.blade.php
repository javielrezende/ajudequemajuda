@extends('rodapesite')
@extends('basicosite')

@section('content')

    <div class="row criarCampanha">
        <a href="{{url('/entidade-site')}}" class="linkReturn">HOME</a>

        <p class="row col-md-12 titulosPrincipais">Criar Campanha</p>


        <form class="row" method="post" enctype="multipart/form-data" action="{{route('minhas-campanhas.store')}}">
            {{ csrf_field() }}

            <div class="formcriarCampanha">
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
                                <input autocomplete="off" type="text"
                                       data-toggle="popover"
                                       data-trigger="hover"
                                       title="Sua campanha pode ser permanente!"
                                       data-content="Se você não escolher esta opção sua campanha será permanente, sem data final! :)"
                                       class="form-control"
                                       id="dataInicio"
                                       name="dataInicio"
                                        {{--onblur="liberar()"--}}>
                            </div>
                        </div>

                        <div class="form-group col d">
                            <label for="dataFim">Data final</label>
                            <div class="input-group date">
                                <input autocomplete="off" type="text" class="form-control" id="dataFim"
                                       name="dataFim"
                                        {{--disabled="disabled"--}}>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="form-group col">
                            <label for="item">Novo ítem <span class="obr">*</span></label>
                            <input type="text" class="form-control" id="inItem"
                                   placeholder="O que deseja receber na campanha..." required>
                        </div>

                        <div class="form-group col m">
                            <input style="height: 20px; width: 20px; margin-right: 8px; background-color: white"
                                   id="inUrgente" type="checkbox" class="form-control"
                                   value={{1}}>
                            <label for="urgente">Urgente</label>
                        </div>

                        <div class="form-group col">
                            <label for="quantidade">Quantidade <span class="obr">*</span></label>
                            <input type="number" class="form-control" id="inQuantidade"
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
                            <label for="descricao">Descrição <span class="obr">*</span></label>
                            <textarea id="descricao" rows="6" class="form-control"
                                      placeholder="O que for digitado neste campo aparecerá como descrição da sua campanha..."
                                      name="descricao"></textarea>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="form-group col">
                            <label class="add" for="imagem">Inserir imagem da campanha</label>
                            <input type="file" id="imagem" name="imagem"
                                   onchange="previewFile()">

                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    {!!"<img src='../imagens/perfil.png' id='imagem_preview' height='150px' width='150px' alt='Foto do perfil' class='rounded-circle'>"!!}
                </div>


                <div class="container">
                    <div class="row justify-content-end">
                        &nbsp;&nbsp;&nbsp;<button type="submit" class="btn cad">CRIAR CAMPANHA</button>
                    </div>
                </div>
            </div>

            <div class="alinhamentoItens">
                <table class="table table-striped" id="alinhamentoItens">
                    <thead>
                    <tr>
                        <th scope="col">Ítens</th>
                        <th scope="col" class="ur">Urgência</th>
                        <th scope="col" class="qua">Quantidade</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
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