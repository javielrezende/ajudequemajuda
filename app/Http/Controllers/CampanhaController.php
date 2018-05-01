<?php

namespace App\Http\Controllers;

use App\Campanha;
use Illuminate\Http\Request;

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
            'fone' => $request['fone'],
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
