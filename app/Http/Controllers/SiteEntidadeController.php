<?php

namespace App\Http\Controllers;

use App\Campanha;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteEntidadeController extends Controller
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

        $entidadeLogada = Auth::user();

        $c = $entidadeLogada->campanhas()->orderBy('id', 'desc')->count();
        //dd($c);
        $campanhas = $entidadeLogada->campanhas()->orderBy('id', 'desc')->paginate(4);

        return view('site.entidade.entidadeindex', compact('entidadeLogada', 'campanhas', 'c'));
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
        if (!Auth::check()) {
            return redirect()->to(url('/aqa-login'));
        }

        $entidade = Auth::user();

        //dd($entidade);
        return view('site.entidade.cadastroentidade', compact('entidade'));
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
        if (!Auth::check()) {
            return redirect('/aqa-login');
        }

        $entidade = User::find($id);
        $imagem = $entidade->imagem;
        //dd($usuario->imagem);
        //dd($imagem);

        //if ($usuario->imagem == null || $usuario->imagem == "") {

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {

            $horaAtual = Carbon::parse()->timestamp;
            //dd($horaAtual);
            $nomeImagem = kebab_case($horaAtual) . kebab_case($entidade->endereco->rua);
            //dd($nomeImagem);

            $extensao = $request->imagem->extension();
            $nomeImagemFinal = "{$nomeImagem}.{$extensao}";
            $request->imagem->move(public_path('imagens/users'), $nomeImagemFinal);

            $imagem = "imagens/users/" . $nomeImagemFinal;
        }
        //   $alteracao = $usuario->update(['imagem' => $imagem]);
        //} else {
        $alteracao = $entidade->update(['imagem' => $imagem]);
        //}


        if ($alteracao) {
            return redirect()->route('entidade-site.show', $entidade->id);
        }
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

}
