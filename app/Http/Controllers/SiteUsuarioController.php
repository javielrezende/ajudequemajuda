<?php

namespace App\Http\Controllers;

use App\Campanha;
use App\User;
use App\UserCampanhaCurtidaInteresse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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

        if(Auth::user()->funcao != 2){

        }

        $usuario = Auth::user()->id;
        //$usuarioteste = Auth::user()->funcao;
        //dd($usuarioteste);
        $campanhaId = Campanha::find($id);
        $campanha = $campanhaId->id;
        //dd($campanha->id);
        //dd($campanha);

        $seguir = UserCampanhaCurtidaInteresse::create(
            ['users_id' => $usuario,
                'campanhas_id' => $campanha,
                'interesse' => 1]
        );

        dd($usuario, $campanha, $seguir);
    }

}
