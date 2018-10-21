@extends('rodapesite')
@extends('basicosite')

@section('content')

    <div class="row criarCampanha">
        <a href="{{url('/entidade-site')}}" class="linkReturn">HOME</a>

        <p class="row col-md-12 titulosPrincipais">Criar Campanha</p>


        <form class="row formcriarCampanha" method="post" action="{{route('minhas-campanhas.store')}}">
            {{ csrf_field() }}

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
                            <input autocomplete="off" type="text" class="form-control" id="dataInicio"
                                   name="dataInicio">
                        </div>
                    </div>

                    <div class="form-group col d">
                        <label for="dataFim">Data final</label>
                        <div class="input-group date">
                            <input autocomplete="off" type="text" class="form-control" id="dataFim"
                                   name="dataFim">
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <label for="item">Novo ítem <span class="obr">*</span></label>
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
                        <label for="quantidade">Quantidade <span class="obr">*</span></label>
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
                        <label for="descricao">Descrição  <span class="obr">*</span></label>
                        <textarea id="descricao" rows="6" class="form-control"
                                  placeholder="O que for digitado neste campo aparecerá como descrição da sua campanha..."
                                  name="descricao"></textarea>
                    </div>
                </div>
            </div>


            <div class="container">
                <div class="row justify-content-end">
                    &nbsp;&nbsp;&nbsp;<button type="submit" class="btn cad">CRIAR CAMPANHA</button>
                </div>
            </div>
        </form>

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
        </div>
    </div>
    <script src="criarCampanha.js"></script>
@endsection