<?php

namespace App\Http\Controllers;

use App\Campanha;
use App\Evento;
use App\User;
use App\UserCampanhaCurtidaInteresse;
use Carbon\Carbon;
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

        $num = 0;

        $campanhasIds = DB::table('user_campanha_interesses')
            ->where('users_id', $usuario->id)
            ->where('interesse', 1)
            ->get()
            ->map(function ($value) {
                return $value->campanhas_id;
            });


        $campanhasInteressadas = Campanha::findMany($campanhasIds);
        if ($campanhasInteressadas) {
            $resultado = DB::table('user_campanha_interesses')
                ->where('users_id', $usuario->id)
                ->where('interesse', 1)
                ->get();
            //dd($resultado[1]->campanhas_id);
            $num = $resultado->count();
            //dd($num);
        }


        return view('site.user.userindex', compact('usuario', 'campanhas', 'eventos', 'resultado', 'num', 'campanhasInteressadas'));
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
        if (!Auth::check()) {
            return redirect('/aqa-login');
        }

        $usuario = User::find($id);
        $imagem = $usuario->imagem;
        //dd($usuario->imagem);
        //dd($imagem);

        //if ($usuario->imagem == null || $usuario->imagem == "") {

            if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {

                $horaAtual = Carbon::parse()->timestamp;
                //dd($horaAtual);
                $nomeImagem = kebab_case($horaAtual) . kebab_case($usuario->endereco->rua);
                //dd($nomeImagem);

                $extensao = $request->imagem->extension();
                $nomeImagemFinal = "{$nomeImagem}.{$extensao}";
                $request->imagem->move(public_path('imagens/users'), $nomeImagemFinal);

                $imagem = "imagens/users/" . $nomeImagemFinal;
            }
         //   $alteracao = $usuario->update(['imagem' => $imagem]);
        //} else {
            $alteracao = $usuario->update(['imagem' => $imagem]);
        //}


        if ($alteracao) {
            return redirect()->route('usuario-site.show', $usuario->id);
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

    public function seguirCampanha($id)
    {
        if (!Auth::check()) {
            return redirect('/aqa-login');
        }

        if (Auth::check() && (Auth::user()->funcao != 0)) {
            dd('Não é possivel seguir uma campanha sem ser um Usuário!');
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

    public function curtirCampanha($id)
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


        $result = DB::table('user_campanha_curtidas')
            ->where('users_id', $usuario)
            ->where('campanhas_id', $campanha->id)
            ->first();

        if (!$result) {
            $campanha->curtir()->attach($usuario, ['curtida' => 1]);

            $resultado = DB::table('user_campanha_curtidas')
                ->where('users_id', $usuario)
                ->where('campanhas_id', $campanha->id)
                ->get();

            /*$resultado2 = DB::table('user_campanha_curtidas')
                ->where('campanhas_id', $campanha->id)
                ->get();
            $num = $resultado2->count();
            dd($num);*/

            //dd('nao tinha cutido ainda');
            $curtida = $resultado[0]->curtida;
            return redirect()->back()->with($curtida);
        }

        $resultado = DB::table('user_campanha_curtidas')
            ->where('users_id', $usuario)
            ->where('campanhas_id', $campanha->id)
            ->get();

        if ($resultado[0]->curtida == 1) {
            $campanha->curtir()->updateExistingPivot($usuario, ['curtida' => 0]);
            $curtida = $resultado[0]->curtida;
            //dd('estou descurtindo');
            return redirect()->back()->with($curtida);
        }
        if ($resultado[0]->curtida == 0) {
            $campanha->curtir()->updateExistingPivot($usuario, ['curtida' => 1]);
            $curtida = $resultado[0]->curtida;
            //dd('voltei a curtir');
            return redirect()->back()->with($curtida);
        }
    }

}
