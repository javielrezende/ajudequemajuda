<?php

namespace App\Http\Controllers;

use App\Campanha;
use App\Doacao;
use App\UserUserCurtida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RelatorioController extends Controller
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

        $campanhas = $entidadeLogada->campanhas;

        return view('site.relatorios.principal', compact('campanhas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function resultado(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/aqa-login');
        }

        $entidade = Auth::user();

        //dd($request->all());

        $campanhaId = $request['campanha'];

        // --------------------- NÚMERO DE DOACOES
        $numeroDoacoes = Doacao::where('campanhas_id', $campanhaId)
            ->get()
            ->count();
        //dd($numeroDoacoes);

        $idCampanha = Campanha::find($campanhaId);
        $nomeCampanha = $idCampanha->nome;
        //dd($nomeCampanha);

        $numCurtidas = DB::table('user_campanha_curtidas')
            ->where('campanhas_id', $campanhaId)
            ->where('curtida',1)
            ->get()->count();

        $numInteressados = DB::table('user_campanha_interesses')
            ->where('campanhas_id', $campanhaId)
            ->where('interesse',1)
            ->get()->count();

        return view('site.relatorios.resultado', compact('numCurtidas', 'numInteressados', 'nomeCampanha'));


    }
}
