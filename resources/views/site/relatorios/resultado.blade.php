@extends('rodapesite')
@extends('basicosite')

@section('content')

    <div class="row criarRelatorio">
        <a href="{{url('/entidade-site')}}" class="linkReturn">HOME</a>

        <p class="row col-md-12 titulosPrincipais">Relatórios</p>


        <div class="row formcriarRelatorio">

            <p class="row col-md-12 titulosPrincipais">Campanha 1</p>

            <table class="table table-striped t1">
                <thead>
                <tr>
                    <th scope="col">Ítens</th>
                    <th scope="col" class="ur">Quantidade</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Arroz</td>
                    <td class="ch">12</td>
                </tr>
                <tr>
                    <td>Feijao</td>
                    <td class="ch">22</td>
                </tr>
                <tr>
                    <td>Massa</td>
                    <td class="ch">08</td>
                </tr>
                </tbody>
            </table>

            <div class="container resul">
                <div class="form-group col esquerda">
                    <p class="nums">127</p>
                </div>


                <div class="form-group col meio">
                    <p class="nums">76</p>
                </div>


                <div class="form-group col direita">
                    <p class="nums">43</p>
                </div>

            </div>

            <div class="resultNome">
                <p class="nomesRelaEsquerda">Curtdas</p>
                <p class="nomesRelaMeio">Usuários Interessados</p>
                <p class="nomesRelaDireita">Comentários</p>
            </div>

            <div class="container">
                <div class="row justify-content-center">
                    <button type="submit" class="btn cad">GERAR RELATÓRIO PDF</button>
                </div>
            </div>
        </div>


    </div>
@endsection