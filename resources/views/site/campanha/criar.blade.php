@extends('rodapesite')
@extends('basicosite')

@section('content')
    <div class="row criarCampanha">

        <a href="{{url('/entidade-site')}}" class="linkReturn">HOME</a>

        <p class="row col-md-12 titulosPrincipais">Criar Campanha</p>

        <div class="alinhamentoCampanha">
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
                            <input type="text" class="form-control" id="item" name="item"
                                   placeholder="O que deseja receber na campanha..." required>
                        </div>

                        <div class="form-group col m">
                            <input style="height: 20px; width: 20px; margin-right: 8px; background-color: white"
                                   id="urgente" type="checkbox" class="form-control"
                                   name="urgente"
                                   value={{1}}>
                            <label for="urgente">Urgente</label>
                        </div>

                        <div class="form-group col">
                            <label for="quantidade">Quantidade <span class="obr">*</span></label>
                            <input type="number" class="form-control" id="quantidade" name="quantidade"
                                   placeholder="Ex.: 999" required>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="form-group col">
                            <button type="button" class="btn cad">Adicionar</button>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="form-group col">
                            <label for="descricao">Descrição <span
                                        class="obrinv">*</span></label>
                            <textarea id="descricao" rows="6" class="form-control"
                                      placeholder="O que for digitado neste campo aparecerá como descrição da sua campanha..."
                                      name="descricao"></textarea>
                        </div>
                    </div>
                </div>


                <div class="container">
                    <div class="row justify-content-end">
                        &nbsp;&nbsp;&nbsp;<button type="submit" class="btn cad">CADASTRAR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection