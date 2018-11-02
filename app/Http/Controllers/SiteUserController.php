<?php

namespace App\Http\Controllers;

use App\Campanha;
use App\Evento;
use App\User;
use App\UserCampanhaCurtidaInteresse;
use Illuminate\Http\Request;

class SiteUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * Mostra todas as ENTIDADES cadastradas e ATIVAS no site
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entidades = User::where('funcao', 1)
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->get();

        return view('site.entidade.entidades', compact('entidades'));
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
        $registro = User::with(['campanhas', 'campanhas.eventos'])
            ->find($id);

        //$registroCampanhas = UserCampanhaCurtidaInteresse::where('users_id', $registro->campanhas[0]->id)
        //->get();

        $registroCampanhas = $registro->campanhas;
        //dd($registroCampanhas);
        //dd($registro->campanhas[0]->id);
//        $registroCampanhas = $registro->campanhas;
        //dd($registroCampanhas);

        /*$count = 0;
        while ($registroCampanhas) {
            $count++;
            if ($count == 10) {
                dd($count);
            }
        }*/
        //dd($registro->campanhas[0]->id);
        //dd($registro->campanhas[1]->id);
        //dd($registroCampanhas);

        //$registroEventos = Evento::where('')

        //$registroCampanhas = Campanha::where('status', 1)
        //->where
        //dd($registro->endereco);
        return view('site.entidade.entidade', compact('registro', 'registroCampanhas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
    {
        $registro = User::find($id);

        $acao = 2;

        return view('admin/users/users_form', compact('registro', 'acao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, $id)
    {
        $dados = $request->all();

        $registro = User::with('endereco')->find($id);
        //$registro = User::with(Endereco::class)->find($id);

        $alteracao = $registro->update($dados);
        $alteracao1 = $registro->endereco->update($dados);

        if ($alteracao && $alteracao1) {
            return redirect()->route('users.index')->with('status', 'Cadastro Alterado!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        //
    }
}