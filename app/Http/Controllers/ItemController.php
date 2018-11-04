<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itens = Item::orderBy('descricaoItem')->get();

        return view('admin/itens/itens_list', compact('itens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $acao = 1;

        $itens = Item::orderBy('descricaoItem')->get();

        return view('admin/itens/itens_form', compact('acao', 'itens'));
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

        $resultado = Item::create([
            'descricao' => $request['descricaoItem'],
            'quantidade' => 0,
            ]);

        if ($resultado) {
            return redirect()->route('itens.create')
                ->with('status', 'Ítem Cadastrado!');
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
        $registro = Item::find($id);

        $itens = Item::orderBy('descricaoItem')->get();

        $acao = 2;

        return view('admin/itens/itens_form', compact('registro', 'itens', 'acao'));
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

        $descricao = $request['descricaoItem'];
        $quantidade = 0;

        $registro = Item::find($id);

        $dados = ['descricaoItem' => $descricao, 'quantidade' => $quantidade];

        $alteracao = $registro->update($dados);

        if ($alteracao) {
            return redirect()->route('itens.index')->with('status', 'Ítem Alterado!');
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
        $dados = Item::find($id);
        $alteracao = $dados->delete();

        if ($alteracao) {
            return redirect()->route('itens.index')->with('status', 'Ítem Deletado!');
        }
    }
}
