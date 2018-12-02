<?php

namespace App\Http\Controllers;

use App\Campanha;
use App\Doacao;
use App\Evento;
use App\User;
use App\UserUserCurtida;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

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
        $mes = $request['mes'];
        //dd($mes);

        $entidade = Auth::user();
        $campanhaId = $request['campanha'];

//            dd($request->all());
        $itens = Doacao::select('id')
            ->with(['itens:descricaoItem'])
            ->where('campanhas_id', $campanhaId)
            ->whereMonth('created_at', $mes)
            ->get()
            ->map(function ($doacao) {
                return $doacao->itens;
            })->map(function ($item) {
                return $item->toArray();
            })->flatten(1)
            ->groupBy('descricaoItem')
            ->map(function ($item) {
                return $item->count();
            });

        //dd($itens);


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
            ->where('curtida', 1)
            ->get()->count();

        $numInteressados = DB::table('user_campanha_interesses')
            ->where('campanhas_id', $campanhaId)
            ->where('interesse', 1)
            ->get()->count();


        return view('site.relatorios.resultado', compact('numCurtidas', 'numInteressados', 'nomeCampanha', 'itens','campanhaId', 'mes'));

    }

    public function pdf(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/aqa-login');
        }

        $campanhaId = $request->query('campanha');
        $mes = $request->query('mes');
        //dd($campanhaId, $mes);


        $itens = Doacao::select('id')
            ->with(['itens:descricaoItem'])
            ->where('campanhas_id', $campanhaId)
            ->whereMonth('created_at', $mes)
            ->get()
            ->map(function ($doacao) {
                return $doacao->itens;
            })->map(function ($item) {
                return $item->toArray();
            })->flatten(1)
            ->groupBy('descricaoItem')
            ->map(function ($item) {
                return $item->count();
            });

        //dd($itens);


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
            ->where('curtida', 1)
            ->get()->count();

        $numInteressados = DB::table('user_campanha_interesses')
            ->where('campanhas_id', $campanhaId)
            ->where('interesse', 1)
            ->get()->count();



        $pdf = App::make('dompdf.wrapper');
        $view = View::make('site.relatorios.resultadoPdf', compact('numCurtidas', 'numInteressados', 'nomeCampanha', 'itens', 'mes'))->render();
        $pdf->loadHTML($view);
        return $pdf->stream();
    }


    //-------------------relatorios para admin
    public function data(Request $request)
    {

        if (!Auth::check()) {
            return redirect('/aqa-login');
        }


        return view('admin.relatorios.principalAdmin');
    }

    public function resultadoAdmin(Request $request)
    {

        if (!Auth::check()) {
            return redirect('/aqa-login');
        }
        $mes = $request['mes'];
        //dd($mes);

        $numEnt = User::where('funcao', 1)
            ->whereMonth('created_at', $mes)
            ->get()
            ->count();

        $numUsu = User::where('funcao', 0)
            ->whereMonth('created_at', $mes)
            ->get()
            ->count();

        $numCam = Campanha::whereMonth('created_at', $mes)
            ->get()
            ->count();

        $numEve = Evento::whereMonth('created_at', $mes)
            ->get()
            ->count();


        return view('admin.relatorios.resultadoAdmin', compact('numEnt', 'numCam', 'numEve', 'numUsu', 'mes'));
    }


}
