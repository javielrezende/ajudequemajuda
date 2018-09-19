@extends('rodapesite')
@extends('basicosite')

@section('content')
    <div class="row cadastrodoador">

        <a href="{{url('/aqa')}}" class="linkReturn">HOME</a>

        <p class="row col-md-12 titulosPrincipais">Cadastro de Doador</p>

        <p class="row col-md-12 justify-content-center explicacao">Precisamos saber um pouco mais sobre você para
            nossa base de dados. Fique tranquilo, <br/>seus dados estão protegidos ;)</p>


        <form class="row formcadastro" method="post" action="{{route('aqa.store')}}">
            {{ csrf_field() }}

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <label for="name">Nome <span class="obr">*</span></label>
                        <input type="text" class="form-control" id="name" name="name"
                               placeholder="Insira seu nome completo" autofocus required>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <label for="email">E-mail <span class="obr">*</span></label>
                        <input type="email" class="form-control" id="email" name="email"
                               placeholder="email@provedor.com" required>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <label for="cpf">CPF <span class="obr">*</span></label>
                        <input type="text" class="form-control" id="cpf" name="cpf"
                               placeholder="000.000.000-00" required>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <label for="fone">Fone <span class="obrinv">*</span></label>
                        <input type="tel" class="form-control" id="fone" name="fone"
                               placeholder="(DDD) 00000-0000">
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
                        <label for="cidade">Cidade <span class="obr">*</span></label>
                        <input type="text" class="form-control" id="cidade" name="cidade"
                               placeholder="Insira sua cidade" required>
                    </div>

                    <div class="form-group col">
                        <label for="estado">Estado <span class="obr">*</span></label>
                        <input type="text" class="form-control" id="estado" name="estado"
                               placeholder="Escolha seu estado" required>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <label for="password">Senha <span class="minsenha">(Mínimo 6 caracteres)</span><span
                                    class="obr">*</span></label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <label for="password-confirm">Confirmar senha <span
                                    class="obr">*</span></label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               required>
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