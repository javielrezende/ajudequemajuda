<?php

namespace App\Http\Controllers;

use App\FaleConosco;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FaleConoscoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mensagens = DB::table('fale_conoscos')
        ->orderBy('status')
        ->get();
        //dd($mensagens);
        //$entidades = User::all();
        return view('admin.faleconosco.mensagens', compact('mensagens'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $resultado = FaleConosco::create([
            'nome' => $request['nome'],
            'email' => $request['email'],
            'cidade' => $request['cidade'],
            'estado' => $request['estado'],
            'fone' => $request['fone'],
            'mensagem' => $request['mensagem'],
            'status' => 0,
        ]);
        //dd($resultado);
        if ($resultado) {
            return redirect()->route('faleconosco.index')
                ->with('status', 'Obrigado por entrar em contato conosco. Sua mensagem foi enviada!');
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
        $mensagem = FaleConosco::find($id);

        return view('admin.faleconosco.mensagem', compact('mensagem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //dd('oi');
        $registro = FaleConosco::find($id);

        $alteracao = $registro->update([
            'status' => 1
        ]);

        if ($alteracao) {
            return redirect()->route('faleconoscoadmin.index')
                ->with('status', 'Mensagem marcada como lida!');
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
        $mensagem = FaleConosco::find($id);
        if ($mensagem->delete()) {
            return redirect()->route('faleconoscoadmin.index')
                ->with('status', 'Mensagem excluída!');
        }
    }
}
