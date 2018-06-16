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
        return view('eventos/eventos_list', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $acao = 1;

        return view('eventos/eventos_form', compact('acao'));
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

        $dataInicial = $request['dataInicio'];
        $dataFinal = $request['dataFim'];
        //dd($dataInicial);
        $dataInicialFormatada = Carbon::createFromFormat('d/m/Y', $dataInicial)->toDateString();
        //dd($dataInicialFormatada);
        $dataFinalFormatada = Carbon::createFromFormat('d/m/Y', $dataFinal)->toDateString();

        $usuario = Auth::user();

        $campanha = $usuario->campanhas()->get()->first();
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

        if ($usuario->entidade == 1) {
            $resultado = Evento::create([
                'descricao' => $request['descricao'],
                'status' => 1,
                'dataInicio' => $dataInicialFormatada,
                'dataFim' => $dataFinalFormatada,
                'enderecos_id' => $endereco->id,
                'campanhas_id' => $campanha->id,
            ]);
            if ($resultado) {
                return redirect()->route('eventos.index')
                    ->with('status', 'Evento Cadastrado!');
            }
        } else {
            return redirect()->route('campanhas.index')
                ->with('status', 'Permissão negada para este Usuário!');
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

        $acao = 2;

        return view('eventos/eventos_form', compact('registro', 'acao'));
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

        $dataInicial = $request['dataInicio'];
        $dataFinal = $request['dataFim'];
        $dataInicialFormatada = Carbon::createFromFormat('d/m/Y', $dataInicial)->toDateString();
        $dataFinalFormatada = Carbon::createFromFormat('d/m/Y', $dataFinal)->toDateString();

        $descricao = $request['descricao'];
        $cep = $request['cep'];
        $rua = $request['rua'];
        $numero = $request['numero'];
        $complemento = $request['complemento'];
        $bairro = $request['bairro'];
        $cidade = $request['cidade'];
        $estado = $request['estado'];

        $registro = Evento::with('enderecos')->find($id);

        $dados = ['descricao' => $descricao, 'dataInicio' => $dataInicialFormatada,
            'dataFim' => $dataFinalFormatada];
        $dados1 = ['cep' => $cep,
            'rua' => $rua, 'numero' => $numero, 'complemento' => $complemento,
            'bairro' => $bairro, 'cidade' => $cidade, 'estado' => $estado];

        $alteracao = $registro->update($dados);
        $alteracao1 = $registro->enderecos->update($dados1);

        if ($alteracao && $alteracao1) {
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
