<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Endereco;
use Illuminate\View\View;


class EntidadeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entidades = User::where('entidade', 1)
                          -> where('status', 1)
                          ->orderBy('name')
                          ->get();
        //$entidades = User::all();
        return view('admin/entidades/entidades_list', compact('entidades'));
    }

    public function indexJson()
    {
        $entidades = User::with('endereco')
            ->where('entidade', 1)
            -> where('status', 1)
            ->orderBy('name')
            ->get();
        //$entidades = User::all();
        return response($entidades, 200);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $acao = 1;

        return view('admin/entidades/entidades_form', compact('acao'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $endereco = Endereco::create([
            'rua' => $request['rua'],
            'numero' => $request['numero'],
            'complemento' => $request['complemento'],
            'cidade' => $request['cidade'],
            'bairro' => $request['bairro'],
            'cep' => $request['cep'],
            'estado' => $request['estado'],
        ]);
        $resultado = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'cpf' => $request['cpf'],
            'cnpj' => $request['cnpj'],
            'entidade' => 1,
            'status' => 1,
            'fone' => $request['fone'],
            'mensagem' => null,
            'descricao_entidade' => $request['descricao_entidade'],
            'enderecos_id' => $endereco->id,
        ]);

        if ($resultado) {
            return redirect()->route('entidades.index')
                ->with('status', 'Entidade Cadastrada!');
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
        $registro = User::find($id);

        $acao = 2;

        return view('admin/entidades/entidades_form', compact('registro', 'acao'));

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

        $registro = User::with('endereco')->find($id);
        //$registro = User::with(Endereco::class)->find($id);

        $alteracao = $registro->update($dados);
        $alteracao1 = $registro->endereco->update($dados);

        if ($alteracao && $alteracao1) {
            return redirect()->route('entidades.index')->with('status', 'Entidade Alterada!');
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

        $dados = User::find($id);
        $alteracao = $dados->update([
            'status' => 0
        ]);

        if ($alteracao) {
            return redirect()->route('entidades.index')->with('status', 'Entidade Deletada!');
        }
    }
}
