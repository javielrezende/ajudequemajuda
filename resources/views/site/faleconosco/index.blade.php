@extends('rodapesite')
@extends('basicosite')

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif


    <form class="row" method="post" action="{{route('faleconosco.store')}}">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="nome">Nome <span class="obr">*</span></label>
            <input type="text" class="form-control" id="nome" name="nome" required autofocus>
        </div>

        <div class="form-group">
            <label for="email">E-mail <span class="obr">*</span></label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="cidade">Cidade <span class="obr">*</span></label>
            <input type="text" class="form-control" id="cidade" name="cidade" required>
        </div>

        <div class="form-group">
            <label for="estado">Estado <span class="obr">*</span></label>
            <input type="text" class="form-control" id="estado" name="estado" required>
        </div>

        <div class="form-group">
            <label for="fone">Telefone</label>
            <input type="text" class="form-control" id="fone" name="fone">
        </div>

        <div class="form-group">
            <label for="mensagem">Digite sua mensagem</label>
            <textarea id="mensagem" rows="6" class="form-control" name="mensagem"></textarea>
        </div>

        <div>
            &nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-outline-success btn-sm">Enviar
            </button>
            &nbsp;&nbsp;&nbsp;<button type="reset" class="btn btn-outline-warning btn-sm">Limpar
            </button>
        </div>
    </form>
    </div>
@endsection