@extends('basico')

@section('content')
    <div class="row">
        <div>
            <h2> Relatórios do mês </h2>
        </div>
        <div>
            &nbsp;&nbsp;&nbsp;<a href="{{url('/admin')}}" class="btn btn-outline-primary btn-sm">Voltar</a>
        </div>

        <div class="col-md-12">
            <div class='row'>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class='col-sm-1'>


                </div>


                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Cadastros</th>
                        <th>Quantidade</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td>Entidades</td>
                        <td>{{$numEnt}}</td>
                    </tr>

                    <tr>
                        <td>Usuários</td>
                        <td>{{$numUsu}}</td>
                    </tr>

                    <tr>
                        <td>Campanhas</td>
                        <td>{{$numCam}}</td>
                    </tr>

                    <tr>
                        <td>Eventos</td>
                        <td>{{$numEve}}</td>
                    </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
