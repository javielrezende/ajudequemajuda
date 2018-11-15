<?php

namespace App\Http\Controllers;

use App\Doacao;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if (!Auth::check()) {
            return redirect('/aqa-login');
        }
        //dd($request->all());
        $usuario = Auth::user()->id;
        //dd($usuario);
        $campanha = $request['campId'];
        //dd($campanha);
        //dd($request->all(), $usuario, $campanha);

        $doacao = new Doacao;
        $doacao->users_id = $usuario;
        $doacao->campanhas_id = $campanha;
        $doacao->confirmacao = 1;
        $resultado = $doacao->save();
        //dd($resultado);

        for ($i = 0; $i < count($request->descricaoItem); $i++) {
            $item = new Item;
            $item->descricaoItem = $request->descricaoItem[$i];
            $item->quantidade = $request->quantidade[$i];
            $item->save();
            $item->doacao()->attach($doacao);
        }
        //dd('yes');
        if ($resultado) {
            return redirect()->route('campanha.index')
                ->with('status', 'Obrigado pela Doação! Vá ao local para entregar o seu ato de caridade! (:');
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
    public
    function edit($id)
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
    public
    function update(Request $request, $id)
    {
        //
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
