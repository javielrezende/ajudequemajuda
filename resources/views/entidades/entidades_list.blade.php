@extends('layouts.app')

@section('content')

    <div class='col-sm-11'>
        <h2> Entidades </h2>
    </div>



    <div class='col-sm-1'>


    </div>






    <table class="table table-hover">
        <thead>
        <tr>
            <th>Nº de Cadastro</th>
            <th>Nome da Entidade</th>
            <th>E-mail</th>
            <th>CPF</th>
            <th>CNPJ</th>
            <th>Fone</th>
            <th>Rua</th>
            <th>Número</th>
            <th>Complemento</th>
            <th>Cidade</th>
            <th>Estado</th>
            <th>CEP</th>
        </tr>
        </thead>
        <tbody>
        @foreach($entidades as $entidade)
            <tr>
                <td style="text-align: center">{{$entidade->id}}</td>
                <td>{{$carro->name}}</td>
                <td>{{$carro->email}}</td>
                <td>{{$carro->cpf}}</td>
                <td>{{$carro->cnpj}}</td>
                <td>{{$carro->fone}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection

