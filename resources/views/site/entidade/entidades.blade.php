@extends('rodapesite')
@extends('basicosite')

@section('content')

    <div class="row siteentidades">
        <a href="{{url('/aqa')}}" class="linkReturn">HOME</a>
        <p class="row col-md-12 titulosPrincipais">Entidades</p>

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


        <div class="row imgentidades">

            @foreach($entidades as $entidade)
            <div class="row diventidades">
                @if($entidade->imagem)
                    <img class="row imagemcampanhas" src="/{{$entidade->imagem}}"
                         alt="Foto de perfil">
                @else
                    <img class="row imagemcampanhas" src="{{ asset('https://s3-sa-east-1.amazonaws.com/ajudequemajuda/geral/entidades1.jpg') }}"
                         alt="Imagem destaque">
                @endif
                <div class="col-6 row observacoesentidades">
                    <h4 class="nomeentidades">{{$entidade->name}}</h4>
                    <p class="descricaoentidades">{{$entidade->descricao_entidade}}</p>
                    <div class="row like">
                        {{--<i class="far fa-thumbs-up"></i>
                        <p class="numlike">999</p>
                        <i class="far fa-thumbs-down"></i>
                        <p class="numlike">999</p>--}}
                        <a href="{{route('entidades.entidades.show', $entidade->id)}}" class="saibamaisentidades">Saiba mais</a>
                    </div>
                </div>
            </div>
            @endforeach


            {{--<div class="row diventidades">
                <img class="row imagementidades" src="{{ asset('imagens/campanhadestaque.png') }}"
                     alt="Imagem destaque">
                <div class="col-6 row observacoesentidades">
                    <h4 class="nomeentidades">Entidade 1</h4>
                    <p class="descricaoentidades">Lorem ipsum dolor sit amet, con...</p>
                    <div class="row like">
                        <i class="far fa-thumbs-up"></i>
                        <p class="numlike">999</p>
                        <i class="far fa-thumbs-down"></i>
                        <p class="numlike">999</p>
                        <a href="{{ url('site/entidade') }}" class="saibamaisentidades">Saiba mais</a>
                    </div>
                </div>
            </div>

            <div class="row diventidades">
                <img class="row imagementidades" src="{{ asset('imagens/campanhadestaque.png') }}"
                     alt="Imagem destaque">
                <div class="col-6 row observacoesentidades">
                    <h4 class="nomeentidades">Entidade 1</h4>
                    <p class="descricaoentidades">LOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORELOREM LORE</p>
                    <div class="row like">
                        <i class="far fa-thumbs-up"></i>
                        <p class="numlike">999</p>
                        <i class="far fa-thumbs-down"></i>
                        <p class="numlike">999</p>
                        <a href="{{ url('site/entidade') }}" class="saibamaisentidades">Saiba mais</a>
                    </div>
                </div>
            </div>--}}

        </div>

    </div>






@endsection
