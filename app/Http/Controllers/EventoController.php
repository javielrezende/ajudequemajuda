<?php

namespace App\Http\Controllers;

use App\Campanha;
use App\Endereco;
use App\Evento;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = Evento::with('campanhas')
            ->where('status', 1)
            ->orderBy('campanhas_id')
            ->get();
        return view('admin/eventos/eventos_list', compact('eventos'));
        //return $eventos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $acao = 1;

        $campanhas = Campanha::where('status', 1)
            ->orderBy('nome')->get();

        //dd($campanhas);
        return view('admin/eventos/eventos_form', compact('acao', 'campanhas'));
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
            return redirect('/');
        }

        $dataHoraInicial = $request['dataHoraInicio'];
        $dataHoraFinal = $request['dataHoraFim'];
        //dd($dataInicial);

        if (isset($dataHoraInicial)) {
            $dataInicialFormatada = Carbon::createFromFormat('d/m/Y H:i', $dataHoraInicial)->toDateTimeString();
            dd($dataInicialFormatada);
            $dataFinalFormatada = Carbon::createFromFormat('d/m/Y', $dataHoraFinal)->toDateString();
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
                'enderecos_id' => $endereco->id,
                'campanhas_id' => $campanha,
            ]);
            if ($resultado) {
                return redirect()->route('eventos.index')
                    ->with('status', 'Evento Cadastrado!');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registro = Evento::find($id);

        $campanhas = Campanha::where('status', 1)
            ->orderBy('nome')->get();

        $acao = 2;

        return view('admin/eventos/eventos_form', compact('registro', 'campanhas', 'acao'));
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
        if (!Auth::check()) {
            return redirect('/');
        }

        $dataHoraInicial = $request['dataHoraInicio'];
        $dataHoraFinal = $request['dataHoraFim'];

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


        $registro = Evento::with('enderecos')->find($id);

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


        $dados = ['nome' => $nome, 'descricao' => $descricao, '$campanha' => $campanha];
        $dados1 = ['cep' => $cep,
            'rua' => $rua, 'numero' => $numero, 'complemento' => $complemento,
            'bairro' => $bairro, 'cidade' => $cidade, 'estado' => $estado];


        $alteracao = $registro->update($dados);
        $alteracao1 = $registro->enderecos->update($dados1);
        $alteracao3 = $registro->update($alteracoes1);
        $alteracoes4 = $registro->update($alteracoes2);

        if ($alteracao && $alteracao1 && $alteracao3 && $alteracoes4) {
            return redirect()->route('eventos.index')->with('status', 'Evento Alterado!');
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
        $dados = Evento::find($id);
        $alteracao = $dados->update([
            'status' => 0
        ]);

        if ($alteracao) {
            return redirect()->route('eventos.index')->with('status', 'Evento Deletado!');
        }
    }
}
