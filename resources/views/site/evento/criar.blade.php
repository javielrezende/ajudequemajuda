@extends('rodapesite')
@extends('basicosite')

@section('content')

    <div class="row criarEvento">
        <a href="{{url('/entidade-site')}}" class="linkReturn">HOME</a>

        <p class="row col-md-12 titulosPrincipais">Criar Evento</p>


        <form class="row formcriarEvento" method="post" action="{{route('meus-eventos.store')}}">
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
                        <label for="dataHoraInicio">Data inicial</label>
                        <div class="input-group date">
                            <input autocomplete="off" type="text" class="form-control" id="dataHoraInicio"
                                   name="dataHoraInicio">
                        </div>
                    </div>

                    <div class="form-group col d">
                        <label for="dataHoraFim">Data final</label>
                        <div class="input-group date">
                            <input autocomplete="off" type="text" class="form-control" id="dataHoraFim"
                                   name="dataHoraFim">
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col e">
                        <label for="dataHoraInicio1">Hora inicial</label>
                        <div class="input-group date">
                            <input autocomplete="off" type="text" class="form-control datetimepicker-input"
                                   data-toggle="datetimepicker" data-target="#dataHoraInicio1" id="dataHoraInicio1"
                                   name="dataHoraInicio1">
                        </div>
                    </div>

                    <div class="form-group col d">
                        <label for="dataHoraFim1">Hora final</label>
                        <div class="input-group date">
                            <input autocomplete="off" type="text" class="form-control datetimepicker-input"
                                   data-toggle="datetimepicker" data-target="#dataHoraFim1" id="dataHoraFim1"
                                   name="dataHoraFim1">
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        {{--<label for="campanha">Campanha <span class="obr">*</span></label>
                        <select class="form-control" id="campanha" name="campanha" required>
                            @foreach($campanhas as $c)
                                <option value="{{$c->id}}"
                                        @if ((isset($registro) and $registro->campanha_id == $c->id) or
                                             old('campanha_id') == $c->id) selected @endif>
                                    {{$c->nome}}</option>
                            @endforeach
                        </select>--}}
                        <label for="campanha">Campanha <span class="obr">*</span></label>
                        <select class="form-control" id="campanha" name="campanha" required>
                            <option> option 1</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col e">
                        <label for="cep">CEP <span class="obr">*</span></label>
                        <input type="text" class="form-control" id="cep" name="cep"
                               onblur="pesquisacep(this.value);" placeholder="ex.: 96055-510" required>
                    </div>

                    <div class="form-group col d">
                        <label for="rua">Rua <span class="obr">*</span></label>
                        <input type="text" class="form-control" id="rua" name="rua"
                               placeholder="ex.: Av. Duque de Caxias" required>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col e">
                        <label for="numero">Nº <span class="obr">*</span></label>
                        <input type="text" class="form-control" id="numero" name="numero"
                               placeholder="ex.: 650" required>
                    </div>

                    <div class="form-group col d">
                        <label for="complemento">Complemento <span class="obrinv">*</span></label>
                        <input type="text" class="form-control" id="complemento" name="complemento"
                               placeholder="ex.: Apto. 102">
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <label for="bairro">Bairro <span class="obr">*</span></label>
                        <input type="text" class="form-control" id="bairro" name="bairro"
                               placeholder="Insira seu bairro" required>
                    </div>

                    <div class="form-group col m">
                        <label for="estado">Estado <span class="obr">*</span></label>
                        {{--<input type="text" class="form-control" id="estado" name="estado"
                               placeholder="Escolha seu estado" required>--}}
                        <select class="custom-select" name="estado" id="estado">
                            <option value="#" disabled selected>Escolha seu estado</option>
                        </select>
                    </div>

                    <div class="form-group col">
                        <label for="cidade">Cidade <span class="obr">*</span></label>
                        {{--<input type="text" class="form-control" id="cidade" name="cidade"
                               placeholder="Insira sua cidade" required>--}}
                        <select class="custom-select" name="cidade" id="cidade">
                            <option value="#" disabled selected>Insira sua cidade</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <label for="descricao">Descrição <span class="obr">*</span></label>
                        <textarea id="descricao" rows="6" class="form-control"
                                  placeholder="O que for digitado neste campo aparecerá como descrição do seu evento..."
                                  name="descricao"></textarea>
                    </div>
                </div>
            </div>


            <div class="container">
                <div class="row justify-content-end">
                    &nbsp;&nbsp;&nbsp;<button type="submit" class="btn cad">CRIAR EVENTO</button>
                </div>
            </div>
        </form>


    </div>


    <!-- Adicionando Javascript -->
    <script type="text/javascript">

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