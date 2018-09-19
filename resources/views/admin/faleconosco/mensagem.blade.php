@extends('basico')

@section('content')
    <div class="width">
        <div class="row justify-content-center">
            <h2> Mensagens do Fale Conosco </h2>
        </div>
        <div>
            &nbsp;&nbsp;&nbsp;<a href="{{url('/admin/faleconoscoadmin')}}"
                                 class="btn btn-outline-primary btn-sm">Voltar</a>
        </div>

        <div class="container faleconosco">

            <div class="row justify-content-center">
                <div class=""></div>
                <h5>{{$mensagem->mensagem}}</h5>
            </div>
        </div>

        <div class="row justify-content-center">
            <form method="post"
                  action="{{route('faleconoscoadmin.update', $mensagem->id)}}">
                {!! method_field('put') !!}
                {{csrf_field()}}
                @if($mensagem->status == 0)
                    <button type="submit" class="btn btn-outline-info btn-sm m-2 ">Marcar como lida</button>
                @else
                    <button type="submit" role="button"
                            class="btn btn-outline-light btn-sm m-2 disabled">
                        Marcar como lida
                    </button>
                @endif
            </form>&nbsp;&nbsp;

            <div>
                <form method="post"
                      action="{{route('faleconoscoadmin.destroy', $mensagem->id)}}"
                      onsubmit="return confirm('Confirma Exclusão?')">
                    {{method_field('delete')}}
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-outline-danger btn-sm m-2">Excluir</button>
                </form>
            </div>
        </div>
    </div>
@endsection
