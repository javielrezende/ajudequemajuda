<?php

namespace App\Http\Controllers;

use App\Endereco;
use App\Evento;
use App\Imagem;
use App\User;
use Carbon\Carbon;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MeusEventosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/aqa-login');
        }

        $entidadeLogada = Auth::user();

        $campanhas = $entidadeLogada->campanhas()->orderBy('id', 'desc')->get();

        return view('site.evento.meusEventos', compact('entidadeLogada', 'campanhas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::check()) {
            return redirect('/aqa-login');
        }

        $acao = 1;

        $entidadeLogada = Auth::user();

        $campanhas = $entidadeLogada->campanhas;

        return view('site.evento.criar', compact('acao', 'campanhas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/aqa-login');
        }

        $dataHoraInicial = $request['dataHoraInicio'];
        $dataHoraFinal = $request['dataHoraFim'];
        //dd($dataInicial);

        $dataHoraInicial1 = $request['dataHoraInicio1'];
        //dd($dataHoraInicial1);
        $dataHoraFinal1 = $request['dataHoraFim1'];
        //dd($dataHoraFinal1);

        if (isset($dataHoraInicial)) {
            $dataInicialFormatada = Carbon::createFromFormat('d/m/Y', $dataHoraInicial)->toDateString();
            //dd($dataInicialFormatada);
            $dataFinalFormatada = Carbon::createFromFormat('d/m/Y', $dataHoraFinal)->toDateString();
            //dd($dataInicialFormatada);
            //dd($dataFinalFormatada);
        } else {
            $dataInicialFormatada = null;
            $dataFinalFormatada = null;
        }

        //$usuario = Auth::user();
        //$campanha = $usuario->campanhas()->get()->first();
        $campanha = $request['campanha'];
        //dd($campanha->id);

        $endereco = Endereco::create([
            'rua' => $request['rua'],
            'numero' => $request['numero'],
            'complemento' => $request['complemento'],
            'bairro' => $request['bairro'],
            'cidade' => $request['cidade'],
            'estado' => $request['estado'],
            'cep' => $request['cep'],
        ]);

        $resultado = Evento::create([
            'nome' => $request['nome'],
            'descricao' => $request['descricao'],
            'status' => 1,
            'dataHoraInicio' => $dataInicialFormatada,
            'dataHoraFim' => $dataFinalFormatada,
            'dataHoraInicio1' => $dataHoraInicial1,
            'dataHoraFim1' => $dataHoraFinal1,
            'enderecos_id' => $endereco->id,
            'campanhas_id' => $campanha,
        ]);

        $usuario = Auth::user();

        $imagem = null;

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {

            $imagem = Storage::disk('s3')->putFile('eventos', $request->imagem, 'public');

            $imagem = Storage::disk('s3')->url($imagem);


            $imagemCreate = new Imagem;
            $imagemCreate->caminho = $imagem;
            $imagemCreate->campanhas_id = null;
            $imagemCreate->eventos_id = $resultado->id;

            $resultado2 = $imagemCreate->save();

        }

        //dd($resultado);
        if ($resultado) {
            return redirect()->route('meus-eventos.index')
                ->with('status', 'Evento Cadastrado com sucesso!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Auth::check()) {
            return redirect()->to(url('/aqa-login'));
        }

        $entidade = Auth::user();

        $campanhas = $entidade->campanhas;

        $evento = Evento::with('campanhas')
            ->where('status', 1)
            ->find($id);

        //dd($evento);


        if ($evento == null) {
            //dd('este evento nao existe');
            return redirect()->back()->with('Esta campanha não existe!');
        }

        //dd($evento->campanhas_id);

        $verificarEvento = DB::table('user_campanhas')
            ->where('users_id', $entidade->id)
            ->where('campanhas_id', $evento->campanhas_id)
            ->first();

        if ($verificarEvento == null) {
            //dd('voce nao tem estar permissao');
            return redirect()->back()->with('Você não tem esta permissão!');
        }


        //dd($evento->enderecos->cep);
        //dd($evento->campanhas->nome);

        return view('site.evento.cadastroEventos', compact('evento', 'entidade', 'campanhas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());

        if (!Auth::check()) {
            return redirect('/aqa-login');
        }

        $registro = Evento::with('enderecos', 'imagens')->find($id);
        $entidade = Auth::user();

        //dd($registro);


        if ($registro == null) {
            //dd('este evento nao existe');
            return redirect()->back()->with('Esta campanha não existe!');
        }

        //dd($evento->campanhas_id);

        $verificarEvento = DB::table('user_campanhas')
            ->where('users_id', $entidade->id)
            ->where('campanhas_id', $registro->campanhas_id)
            ->first();

        if ($verificarEvento == null) {
            //dd('voce nao tem estar permissao');
            return redirect()->back()->with('Você não tem esta permissão!');
        }


        $dataHoraInicial = $request['dataHoraInicio'];
        $dataHoraFinal = $request['dataHoraFim'];

        $dataHoraInicial1 = $request['dataHoraInicio1'];
        $dataHoraFinal1 = $request['dataHoraFim1'];

        $nome = $request['nome'];
        $descricao = $request['descricao'];
        $cep = $request['cep'];
        $rua = $request['rua'];
        $numero = $request['numero'];
        $complemento = $request['complemento'];
        $bairro = $request['bairro'];
        $cidade = $request['cidade'];
        $estado = $request['estado'];
        $campanha = $request['campanha'];

        //dd($cidade);
        //dd($estado);


        if ($dataHoraInicial != "Sem data determinada" && $dataHoraInicial != null) {
            $dataInicialFormatada = Carbon::createFromFormat('d/m/Y', $dataHoraInicial)->toDateString();
            $alteracoes1 = ['dataHoraInicio' => $dataInicialFormatada];
        } else {
            $alteracoes1 = ['dataHoraInicio' => null];
        }

        if ($dataHoraFinal != "Sem data determinada" && $dataHoraFinal != null) {
            $dataFinalFormatada = Carbon::createFromFormat('d/m/Y', $dataHoraFinal)->toDateString();
            $alteracoes2 = ['dataHoraFim' => $dataFinalFormatada];
        } else {
            $alteracoes2 = ['dataHoraFim' => null];
        }




        if ($dataHoraInicial1 != null) {
            $alteracoes3 = ['dataHoraInicio1' => $dataHoraInicial1];
        } else {
            $alteracoes3 = ['dataHoraInicio1' => null];
        }

        if ($dataHoraFinal1 != null) {
            $alteracoes4 = ['dataHoraFim1' => $dataHoraFinal1];
        } else {
            $alteracoes4 = ['dataHoraFim1' => null];
        }



        $dados = ['nome' => $nome, 'descricao' => $descricao, 'campanhas_id' => $campanha];
        //dd($campanha, $dados);
        $dados1 = ['cep' => $cep,
            'rua' => $rua, 'numero' => $numero, 'complemento' => $complemento,
            'bairro' => $bairro, 'cidade' => $cidade, 'estado' => $estado];


        $alteracao = $registro->update($dados);
        $alteracao1 = $registro->enderecos->update($dados1);
        $alteracao3 = $registro->update($alteracoes1);
        $alteracao4 = $registro->update($alteracoes2);
        $alteracao5 = $registro->update($alteracoes3);
        $alteracao6 = $registro->update($alteracoes4);


        /*if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {

            try {


            $imagem = Storage::disk('s3')->putFile('eventos', $request->imagem, 'public');

            $imagem = Storage::disk('s3')->url($imagem);

            $result = $registro->imagens->caminho = $imagem;
            $registro->imagens->save();

            }catch(Exception $e) {
                return redirect()->back()->with('status', 'Problemas para carregar a imagem');
            }

        }*/


        if ($alteracao && $alteracao1 && $alteracao3 && $alteracao4 && $alteracao5 && $alteracao6) {
            return redirect()->route('meus-eventos.index')->with('status', 'Evento alterado com sucesso!');
        } else {
            return redirect()->route('meus-eventos.index')->with('status', 'Aconteceu algum problema, tente novamente!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (!Auth::check()) {
            return redirect('/aqa-login');
        }

        $registro = Evento::with('enderecos')->find($id);
        $entidadeLogada = Auth::user();
        $campanhas = $entidadeLogada->campanhas()->orderBy('id', 'desc')->get();

        if ($registro == null) {
            //dd('este evento nao existe');
            return redirect()->back()->with('status', 'Esta campanha não existe!');
        }

        //dd($evento->campanhas_id);

        $verificarEvento = DB::table('user_campanhas')
            ->where('users_id', $entidadeLogada->id)
            ->where('campanhas_id', $registro->campanhas_id)
            ->first();

        if ($verificarEvento == null) {
            //dd('voce nao tem estar permissao');
            return redirect()->back()->with('status', 'Você não tem esta permissão!');
        }

        $alteracao = $registro->update([
            'status' => 0
        ]);

        //dd('alterado', $registro);

        return view('site.evento.meusEventos', compact('entidadeLogada', 'campanhas'))->with('status', 'Evento apagado com sucesso!');

    }
}
