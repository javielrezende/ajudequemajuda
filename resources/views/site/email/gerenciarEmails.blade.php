@extends('rodapesite')
@extends('basicosite')

@section('content')

    <div class="row gerenciarEmail">
        <a href="{{url('/entidade-site')}}" class="linkReturn">HOME</a>

        <p class="row col-md-12 titulosPrincipais">Gerenciar recebimento de e-mails</p>

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


        {{--<form class="formgerenciarEmail" action="#">--}}
        <div class="formgerenciarEmail">

            <div class="container">
                <div class="row">
                    <div class="form-group col">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Campanha</th>
                                <th scope="col">Ação</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($campanhas as $c)
                                {{--@if($c->emails[0]->pivot->users_id == $id)--}}
                                    <tr>
                                        <td>{{$c->nome}}</td>
                                        {{--{{dd($c->emails[0]->pivot->users_id)}}--}}
                                        {{--{{dd($c)}}--}}
                                        @if($c->emails[0]->pivot->email == 1)
                                            <td><a href="{{route('gerenciar-email', $c->id)}}"
                                                   class="far fa-times-circle vermelho" style="font-size: 16px;"
                                                ></a></td>
                                        @else
                                            <td><a href="{{route('gerenciar-email', $c->id)}}"
                                                   class="far fa-check-circle verde" style="font-size: 16px;"
                                                ></a></td>
                                        @endif
                                    </tr>
                                {{--@endif--}}
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection