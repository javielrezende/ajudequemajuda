<?php

namespace App\Http\Controllers;

use App\Campanha;
use App\User;
use App\UserUserComentario;
use App\UserUserCurtida;
use Carbon\Carbon;
use function foo\func;
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
        $campanhas = $entidadeLogada->campanhas()->with('imagens')
            ->where('status', 1)
            ->orderBy('id', 'desc')->paginate(4);

        $campanhasEventos = $entidadeLogada->campanhas()->with('imagens', 'eventos')
            ->orderBy('id', 'desc')->paginate(4);

        //dd($campanhasEventos);



        $comentarios = UserUserComentario::with('users')->orderBy('id', 'desc')
            ->where('users_id', $entidadeLogada->id)
            ->get();
        //dd($comentarios);

        $numCom = UserUserComentario::orderBy('id', 'desc')
            ->where('users_id', $entidadeLogada->id)
            ->get()
            ->count();

        $nomeComentariosId = UserUserComentario::orderBy('id', 'desc')
            ->get()
            ->map(function ($value) {
                return $value->users_id1;
            });
        $dataComentarios = UserUserComentario::get()
            ->map(function ($value) {
                return $value->created_at->format('d/m/Y');
            });
        //dd($dataComentarios);

        $nomes = User::findMany($nomeComentariosId);

        $numCur = UserUserCurtida::where('users_id', $entidadeLogada->id)
            ->get()
            ->count();

        $idImgCur = UserUserCurtida::where('users_id', $entidadeLogada->id)
            ->get()
            ->map(function ($value) {
                return $value->users_id1;
            });

        $userCur = User::findMany($idImgCur);

        //dd($userCur);
        //dd($idImgCur);


        return view('site.entidade.entidadeindex', compact('entidadeLogada', 'campanhas', 'campanhasEventos', 'c', 'comentarios', 'dataComentarios', 'nomes', 'numCom', 'numCur', 'userCur'));
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

        $dados = $request->all();

        $registro = User::with('endereco')->find($id);
        //$registro = User::with(Endereco::class)->find($id);

        $alteracao = $registro->update($dados);
        $alteracao1 = $registro->endereco->update($dados);

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
        $alteracao2 = $entidade->update(['imagem' => $imagem]);
        //}


        if ($alteracao && $alteracao1 && $alteracao2) {
            return redirect()->route('entidade-site.show', $entidade->id)->with('status', 'Cadastro alterado com sucesso!');
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
