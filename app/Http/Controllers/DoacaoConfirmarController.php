<?php

namespace App\Http\Controllers;

use App\Campanha;
use App\Doacao;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoacaoConfirmarController extends Controller
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

        $entidade = Auth::user();

        $minhasCampanhas0 = User::with('campanhas')
            ->where('id', $entidade->id)
            ->get();

        $minhasCampanhas = $minhasCampanhas0[0]->campanhas;
        $idCampanhas = $minhasCampanhas->map(function ($value){
            return $value->id;
        });
//        dd($idCampanhas);

        $doacoesRecebidas = Doacao::whereIn('campanhas_id', $idCampanhas)
            ->where('confirmacao', 0)
        ->get();
        //dd($doacoesRecebidas);



//        dd($minhasCampanhas);
        return view('site.doacao.doacoes', compact('doacoesRecebidas'));
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
    public function edit(Request $request, $id)
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

        $confirmar = Doacao::find($id);
        //dd($confirmar);

        $alteracao = $confirmar->update([
            'confirmacao' => 1
        ]);

        //dd($alteracao);
        return redirect()->route('doacao-confirmar.index');
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
}
