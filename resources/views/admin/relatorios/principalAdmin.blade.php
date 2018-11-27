@extends('basico')

@section('content')

    <div class="row criarRelatorio">
        <a href="{{url('/entidade-site')}}" class="linkReturn">HOME</a>

        <p class="row col-md-12 titulosPrincipais">Relatórios</p>


        <form class="row formcriarRelatorio" method="get" action="{{route('resultado-admin')}}">


            <div class="container">
                <div class="row">

                    <div class="form-group col m">
                        <label for="campanha">Período</label>
                        <select class="form-control" id="mes" name="mes" required>
                            <option value="" disabled selected>Escolha o mês...</option>
                            <option value="1">Janeiro</option>
                            <option value="2">Fevereiro</option>
                            <option value="3">Março</option>
                            <option value="4">Abril</option>
                            <option value="5">Maio</option>
                            <option value="6">Junho</option>
                            <option value="7">Julho</option>
                            <option value="8">Agosto</option>
                            <option value="9">Setembro</option>
                            <option value="10">Outubro</option>
                            <option value="11">Novembro</option>
                            <option value="12">Dezembro</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <button type="submit" id="btAdicionar" class="btn add">Verificar</button>
                    </div>
                </div>
            </div>

        </form>


    </div>
@endsection