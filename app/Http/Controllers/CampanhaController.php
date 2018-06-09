<?php

namespace App\Http\Controllers;

use App\Campanha;
use App\User;
use App\UserCampanhaCurtidaInteresse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CampanhaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataInicial = Campanha::where('id', 2)->get([
                'dataInicio'
            ]);
        //dd($dataInicial);
        if (isset($dataInicial)){
            //dd($dataInicial);
        $data = Carbon::createFromFormat("Y-m-d", $dataInicial);
        dd($data);
        }
        //$dataInicialFormatada = Carbon::parse($data)->format('d/m/Y');
        //$dataInicialFormatada = $data->format('d/m/Y');
        //$dataInicialFormatada = $data->formatLocalized('d/m/Y');
        //$dataInicialFormatada = $data->year;
        //dd($dataInicialFormatada);

        $campanhas = Campanha::where('status', 1)
                             ->orderBy('id')
                            ->get([
                                'id', 'nome', 'descricao', 'dataInicio', 'dataFim'
                            ]);
        //$entidades = User::all();
        return view('campanhas/campanhas_list', compact('campanhas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $acao = 1;

        return view('campanhas/campanhas_form', compact('acao'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        $usuario = Auth::user();
        $usuarioId = $usuario->id;

        $dataInicial = $request['dataInicio'];
        $dataFinal = $request['dataFim'];
        //dd($dataInicial);
        $dataInicialFormatada = Carbon::createFromFormat('d/m/Y', $dataInicial)->toDateString();
        //dd($dataInicialFormatada);
        $dataFinalFormatada = Carbon::createFromFormat('d/m/Y', $dataFinal)->toDateString();

        if($usuario->entidade == 1){
            $campanha = new Campanha;
            $campanha->nome = $request->nome;
            $campanha->descricao = $request->descricao;
            $campanha->status = 1;
            $campanha->dataInicio = $dataInicialFormatada;
            $campanha->dataFim = $dataFinalFormatada;
            $resultado = $campanha->save();

            $campanha->users()->sync($usuarioId);


            if ($resultado) {
                return redirect()->route('campanhas.index')
                    ->with('status', 'Campanha Cadastrada!');
            }
        } else{
            return redirect()->route('campanhas.index')
                ->with('status', 'Permissão negada para este Usuário!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registro = Campanha::find($id);

        $acao = 2;

        return view('campanhas/campanhas_form', compact('registro', 'acao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        $dados = $request->all();

        $registro = Campanha::find($id);

        $alteracao = $registro->update($dados);

        if ($alteracao) {
            return redirect()->route('campanhas.index')->with('status', 'Campanha Alterada!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        $dados = Campanha::find($id);
        $alteracao = $dados->update([
            'status' => 0
        ]);

        if ($alteracao) {
            return redirect()->route('campanhas.index')->with('status', 'Campanha Deletada!');
        }
    }
}
