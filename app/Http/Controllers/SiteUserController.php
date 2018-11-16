<?php

namespace App\Http\Controllers;

use App\Campanha;
use App\Evento;
use App\User;
use App\UserCampanhaCurtidaInteresse;
use App\UserUserComentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $comentarios = UserUserComentario::orderBy('id', 'desc')
            ->get();

        $nomeComentariosId = UserUserComentario::orderBy('id', 'desc')
            ->get()
            ->map(function ($value) {
                return $value->users_id1;
            });
        //dd($nomeComentariosId);

        $nomes = User::findMany($nomeComentariosId);
        //dd($nomes);

        if (!Auth::check()) {
            $registro = User::with(['campanhas', 'campanhas.eventos'])
                ->find($id);
            $registroCampanhas = $registro->campanhas;

            $primeiraLetraNome = "A";
            return view('site.entidade.entidade', compact('registro', 'registroCampanhas', 'comentarios','primeiraLetraNome', 'nomes'));
        } else {
            $registro = User::with(['campanhas', 'campanhas.eventos'])
                ->find($id);
            $registroCampanhas = $registro->campanhas;

            $usuarioLogado = Auth::user();
            $primeiraLetraNome = Auth::user()->name[0];
            //dd($primeiraLetraNome);


            return view('site.entidade.entidade', compact('registro', 'registroCampanhas', 'primeiraLetraNome', 'comentarios', 'nomes'));
        }
        //dd('oi');


        /*$usuario = Auth::user()->id;
        $usuario1 = User::find($id);*/
        /*$result = DB::table('user_user_curtidas')
            ->where('users_id', $usuario)
            ->where('users_id1', $usuario1->id)
            ->first();
        if ($result) {
            $tr = 1;
        } else {
            $tr = 0;
        }
        //return redirect()->back()->with($tr);*/


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
