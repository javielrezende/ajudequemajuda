@extends('rodapesite')
@extends('basicosite')

@section('content')

    <div class="row criarRelatorio">
        <a href="{{url('/entidade-site')}}" class="linkReturn">HOME</a>

        <p class="row col-md-12 titulosPrincipais">Relatórios</p>


        <div class="row formcriarRelatorio">

            <p class="row col-md-12 titulosPrincipais">{{$nomeCampanha}} - Fevereiro - 2018</p>

            <table class="table table-striped t1">
                <thead>
                <tr>
                    <th scope="col">Ítens</th>
                    <th scope="col" class="ur">Quantidade</th>
                </tr>
                </thead>
                <tbody>
                @forelse($itens as $item => $quantidade)
                    <tr>
                        <td>{{$item}}</td>
                        <td class="ch">{{$quantidade}}</td>
                    </tr>
                @empty
                    <tr>
                        <td>Não há ítens</td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            <div class="container resul">
                <div class="form-group col esquerda">
                    <p class="nums">{{$numCurtidas}}</p>
                </div>


                <div class="form-group col meio">
                    <p class="nums">{{$numInteressados}}</p>
                </div>


                {{--<div class="form-group col direita">
                    <p class="nums">43</p>
                </div>--}}

            </div>

            <div class="resultNome">
                <p class="nomesRelaEsquerda">Curtdas</p>
                <p class="nomesRelaMeio">Usuários Interessados</p>
                {{--<p class="nomesRelaDireita">Comentários</p>--}}
            </div>

            <div class="container">
                <div class="row justify-content-center">
                    <a href="/pdf?campanha={{$campanhaId}}&mes={{$mes}}">
                        <button type="submit" class="btn cad">GERAR RELATÓRIO PDF</button>
                    </a>
                </div>
            </div>
        </div>


    </div>
@endsection