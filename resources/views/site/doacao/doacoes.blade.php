@extends('rodapesite')
@extends('basicosite')

@section('content')

    <div class="row doacaoConfirmar">
        <a href="{{url('/entidade-site')}}" class="linkReturn">HOME</a>

        <p class="row col-md-12 titulosPrincipais">Doações para confirmar</p>

        <div class="col-md-12">
            @if (count($errors) > 0)
                <div class="alert alert-info">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>


        <div class="row formdoacoesConfirmar">

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col" class="ur">Campanha</th>
                                <th scope="col" class="ur">Usuário</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($doacoesRecebidas as $d)
                                {{--                                {{dd($d->user->name)}}--}}
                                <tr>
                                    <td class="ch">{{$d->campanha->nome}}</td>
                                    <td class="ch">{{$d->user->name}}</td>

                                    <td>
                                        <form method="post"
                                              action="{{route('doacao-confirmar.update', $d->id)}}">
                                            {!! method_field('put') !!}
                                            {{ csrf_field() }}
                                            <button type="submit" class="far fa-check-circle verde"></button>
                                        </form>
                                    </td>


                                    {{--<td><a href="{{route('doacao-confirmar.edit', $d->id)}}">
                                            <i class="far fa-check-circle verde"></i>
                                        </a></td>--}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>


    </div>
@endsection