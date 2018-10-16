@extends('rodapesite')
@extends('basicosite')

@section('content')

    <div class="row doacaoConfirmar">
        <a href="{{url('/entidade-site')}}" class="linkReturn">HOME</a>

        <p class="row col-md-12 titulosPrincipais">Doações para confirmar</p>


        <form class="row formdoacoesConfirmar" method="post" action="{{route('doacao-confirmar.store')}}">
            {{ csrf_field() }}

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Ítens</th>
                                <th scope="col" class="ur">Campanha</th>
                                <th scope="col" class="ur">Usuário</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Arroz</td>
                                <td class="ch">Campanha Tecon</td>
                                <td class="ch">Róger Rezende</td>
                                <td><i class="far fa-check-circle verde"></i></td>
                                <td><i class="far fa-times-circle vermelho"></i></td>
                            </tr>
                            <tr>
                                <td>Feijao</td>
                                <td class="ch">Campanha Tecon</td>
                                <td class="ch">Róger Rezende</td>
                                <td><i class="far fa-check-circle verde"></i></td>
                                <td><i class="far fa-times-circle vermelho"></i></td>
                            </tr>
                            <tr>
                                <td>Massa</td>
                                <td class="ch">Campanha Tecon</td>
                                <td class="ch">Róger Rezende</td>
                                <td><i class="far fa-check-circle verde"></i></td>
                                <td><i class="far fa-times-circle vermelho"></i></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </form>


    </div>
@endsection