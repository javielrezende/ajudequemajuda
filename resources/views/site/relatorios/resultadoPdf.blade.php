<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Ajude quem Ajuda</title>
</head>
<body>

<h4>Relatórios</h4>


<h3>{{$nomeCampanha}} - Mês ({{$mes}})</h3>

<table class="table table-striped t1">
    <thead>
    <tr>
        <th scope="col">Ítens</th>
        <th scope="col">Quantidade</th>
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

<div class="resultNome">
    <p class="nomesRelaEsquerda">Curtidas - {{$numCurtidas}}</p>
    <p class="nomesRelaMeio">Usuários Interessados - {{$numInteressados}}</p>
</div>

</body>
</html>















