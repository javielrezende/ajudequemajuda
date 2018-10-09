<?php

namespace App\Http\Controllers;

use App\Campanha;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteEntidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*if(Auth::user()->funcao != 1){
            return redirect('/aqa');
        }*/
        $entidadeLogada = Auth::user();

        $campanhas = $entidadeLogada->campanhas;

        return view('site.entidade.entidadeindex', compact('entidadeLogada', 'campanhas'));
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
        $entidade = Auth::user();

        //dd($entidade);
        return view('site.entidade.cadastroentidade', compact('entidade'));
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

    /*public function minhasCampanhas()
    {
        $entidadeLogada = Auth::user();

        $campanhas = $entidadeLogada->campanhas;

        return view('site.campanha.minhasCampanhas', compact('entidadeLogada', 'campanhas'));
    }*/
}
