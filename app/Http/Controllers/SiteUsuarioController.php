<?php

namespace App\Http\Controllers;

use App\Campanha;
use App\Evento;
use App\User;
use App\UserCampanhaCurtidaInteresse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SiteUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->to(url('/aqa-login'));
        }

        $usuario = Auth::user();

        $campanhas = Campanha::where('status', 1)
            ->get();

        $eventos = Evento::where('status', 1)
            ->get();

        return view('site.user.userindex', compact('usuario', 'campanhas', 'eventos'));
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
        $usuario = Auth::user();

        //dd($usuario);
        return view('site.user.cadastrousuario', compact('usuario'));
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

    public function seguirCampanha($id)
    {
        if (!Auth::check()) {
            return redirect('/aqa-login');
        }

        if (Auth::check() && (Auth::user()->funcao != 0)) {
            dd('Não é possivel curtir sem ser um Usuário!');
            return redirect()->back();
        }

        $usuario = Auth::user()->id;
        $campanha = Campanha::find($id);


        $result = DB::table('user_campanha_interesses')
            ->where('users_id', $usuario)
            ->where('campanhas_id', $campanha->id)
            ->first();

        if (!$result) {
            $campanha->seguir()->attach($usuario, ['interesse' => 1]);

            $resultado = DB::table('user_campanha_interesses')
                ->where('users_id', $usuario)
                ->where('campanhas_id', $campanha->id)
                ->get();

            $seguindo = $resultado[0]->interesse;
            return redirect()->back()->with($seguindo);
            //dd('nao seguia, vai seguir agora', $seguindo);
        }

        $resultado = DB::table('user_campanha_interesses')
            ->where('users_id', $usuario)
            ->where('campanhas_id', $campanha->id)
            ->get();

        /*$seguindo = $resultado[0]->interesse;
        return redirect()->back()->with($seguindo);
        dd('nao seguia, vai seguir agora', $seguindo);*/

        if ($resultado[0]->interesse == 1) {
            $campanha->seguir()->updateExistingPivot($usuario, ['interesse' => 0]);
            $seguindo = $resultado[0]->interesse;
            return redirect()->back()->with($seguindo);
        }
        if ($resultado[0]->interesse == 0) {
            $campanha->seguir()->updateExistingPivot($usuario, ['interesse' => 1]);
            $seguindo = $resultado[0]->interesse;
            //dd('Ja seguia e parou, vai voltar a seguir agora', $seguindo);
            return redirect()->back()->with($seguindo);
        }
    }

}
