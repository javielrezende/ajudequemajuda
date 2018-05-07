<?php

namespace App\Http\Controllers;

use App\Campanha;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CampanhaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campanhas = Campanha::where('status', 1)
                             ->orderBy('id')
                            ->get();
        //$entidades = User::all();
        return view('campanhas/campanhas_list', compact('campanhas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $acao = 1;

        return view('campanhas/campanhas_form', compact('acao'));
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

        $usuario = Auth::user();
        $usuarioId = $usuario->id;

        if($usuario->entidade == 1){
            $resultado = Campanha::create([
                'nome' => $request['nome'],
                'descricao' => $request['descricao'],
                'status' => 1,
                'dataInicio' => null,
                'dataFim' => null,
                'user_id' => $usuarioId
            ]);
            if ($resultado) {
                return redirect()->route('campanhas.index')
                    ->with('status', 'Campanha Cadastrada!');
            }
        } else{
            return redirect()->route('campanhas.index')
                ->with('status', 'Permissão negada para este Usuário!');
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
        $registro = Campanha::find($id);

        $acao = 2;

        return view('campanhas/campanhas_form', compact('registro', 'acao'));
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
        $dados = $request->all();

        $registro = Campanha::find($id);

        $alteracao = $registro->update($dados);

        if ($alteracao) {
            return redirect()->route('campanhas.index')->with('status', 'Campanha Alterada!');
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
        $dados = Campanha::find($id);
        $alteracao = $dados->update([
            'status' => 0
        ]);

        if ($alteracao) {
            return redirect()->route('campanhas.index')->with('status', 'Campanha Deletada!');
        }
    }
}
