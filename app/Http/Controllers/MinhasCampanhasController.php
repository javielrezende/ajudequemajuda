<?php

namespace App\Http\Controllers;

use App\Campanha;
use App\Imagem;
use App\Item;
use App\User;
use App\UserUserCurtida;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MinhasCampanhasController extends Controller
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

        $campanhas = $entidadeLogada->campanhas()
            ->where('status', 1)
            ->orderBy('id', 'desc')->get();



        return view('site.campanha.minhasCampanhas', compact('entidadeLogada', 'campanhas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $acao = 1;

        return view('site.campanha.criar', compact('acao'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        if (!Auth::check()) {
            return redirect('/aqa-login');
        }

        $usuario = Auth::user();
        //
        $dataInicial = $request['dataInicio'];
        $dataFinal = $request['dataFim'];
        //dd($dataInicial);

        if (isset($dataInicial)) {
            $dataInicialFormatada = Carbon::createFromFormat('d/m/Y', $dataInicial)->toDateString();
            $dataFinalFormatada = Carbon::createFromFormat('d/m/Y', $dataFinal)->toDateString();
            //dd($dataFinalFormatada);
        } else {
            $dataInicialFormatada = null;
            $dataFinalFormatada = null;
        }

        $campanha = new Campanha;
        $campanha->nome = $request->nome;
        $campanha->descricao = $request->descricao;
        $campanha->status = 1;
        $campanha->dataInicio = $dataInicialFormatada;
        $campanha->dataFim = $dataFinalFormatada;
        $resultado = $campanha->save();
        //dd($campanha);


        $campanha->users()->sync($usuario);
        //dd('sim');

        $imagem = null;

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {

            $horaAtual = Carbon::parse()->timestamp;
            //dd($horaAtual);
            $nomeImagem = kebab_case($horaAtual) . kebab_case($usuario->endereco->rua);
            //dd($nomeImagem);

            $extensao = $request->imagem->extension();
            $nomeImagemFinal = "{$nomeImagem}.{$extensao}";
            $request->imagem->move(public_path('imagens/users'), $nomeImagemFinal);

            $imagem = "imagens/users/" . $nomeImagemFinal;


            //$upload = $request->imagem->storeAs('imagem', $nomeImagemFinal);
            $imagemCreate = new Imagem;
            $imagemCreate->caminho = $imagem;
            $imagemCreate->campanhas_id = $campanha->id;
            $imagemCreate->eventos_id = null;
            //dd($imagemCreate);
            $resultado2 = $imagemCreate->save();
            //dd($resultado2);


            /*$imagemCreate = Imagem::create([
                'caminho' => $imagem,
                'campanhas_id' => $campanha
            ]);*/
            //dd($imagemCreate);
        }


        for ($i = 0; $i < count($request->descricaoItem); $i++) {
            $item = new Item;
            $item->descricaoItem = $request->descricaoItem[$i];
            $item->quantidade = $request->quantidade[$i];
            $ur = $request->urgencia[$i];
            if ($ur) {
                //dd('sim');
                //dd($ur);
                $item->save();
                $item->campanha()->attach($campanha, ['urgencia' => 1]);
            } else {
                dd($item);
                $item->campanha()->attach($campanha, ['urgencia' => 0]);
                $item->save();
            }
        }


        if ($resultado) {
            return redirect()->route('minhas-campanhas.index')
                ->with('status', 'Campanha Cadastrada!');
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
        if (!Auth::check()) {
            return redirect()->to(url('/aqa-login'));
        }


        $entidade = Auth::user();

        $campanha = Campanha::with('users', 'imagens')
            ->find($id);




        $numCur = DB::table('user_campanha_curtidas')
            ->where('campanhas_id', $campanha->id)
            ->where('curtida', 1)
            ->get()
            ->count();

        $idImgCur = DB::table('user_campanha_curtidas')
            ->where('campanhas_id', $campanha->id)
            ->where('curtida', 1)
            ->get()
            ->map(function ($value) {
                return $value->users_id;
            });

        $numSeg = DB::table('user_campanha_interesses')
            ->where('campanhas_id', $campanha->id)
            ->where('interesse', 1)
            ->get()
            ->count();

        $idImgSeg = DB::table('user_campanha_interesses')
            ->where('campanhas_id', $campanha->id)
            ->where('interesse', 1)
            ->get()
            ->map(function ($value) {
                return $value->users_id;
            });

        //dd($idImgCur);

        $userCur = User::findMany($idImgCur);

        $userSeg = User::findMany($idImgSeg);



        if ($campanha == null) {
            return redirect()->back()->with('Esta campanha não existe!');
        }

        $verificarCampanha = DB::table('user_campanhas')
            ->where('users_id', $entidade->id)
            ->where('campanhas_id', $campanha->id)
            ->first();

        if ($verificarCampanha == null) {
            return redirect()->back()->with('Você não tem esta permissão!');
        }

        return view('site.campanha.cadastroCampanhas', compact('entidade', 'campanha', 'numCur', 'idImgCur', 'userCur', 'numSeg', 'idImgSeg', 'userSeg'));
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
        //dd($request->all());
        if (!Auth::check()) {
            return redirect('/aqa-login');
        }

        $entidade = Auth::user()->id;
        $entidadeId = $entidade;

        $registro = Campanha::find($id);
        //dd($registro);

        if ($registro == null) {
            return redirect()->back()->with('Esta campanha não existe!');
        }

        $verificarCampanha = DB::table('user_campanhas')
            ->where('users_id', $entidadeId)
            ->where('campanhas_id', $registro->id)
            ->first();

        if ($verificarCampanha == null) {
            return redirect()->back()->with('Você não tem esta permissão!');
        }


        $dataInicial = $request['dataInicio'];
        $dataFinal = $request['dataFim'];

        //$dataInicialFormatada = null;
        //$dataFinalFormatada = null;

        //$dados = $request->all();
        $nome = $request['nome'];
        $descricao = $request['descricao'];
        //dd($dataInicial, $dataFinal, $entidade, $descricao);


        $alteracoes = ['nome' => $nome, 'descricao' => $descricao];

        if ($dataInicial != "Sem data determinada" && $dataInicial != null) {
            $dataInicialFormatada = Carbon::createFromFormat('d/m/Y', $dataInicial)->toDateString();
            $alteracoes1 = ['dataInicio' => $dataInicialFormatada];
        } else {
            $alteracoes1 = ['dataInicio' => null];
        }

        if ($dataFinal != "Sem data determinada" && $dataFinal != null) {
            $dataFinalFormatada = Carbon::createFromFormat('d/m/Y', $dataFinal)->toDateString();
            $alteracoes2 = ['dataFim' => $dataFinalFormatada];
        } else {
            $alteracoes2 = ['dataFim' => null];
        }

        $alteracao = $registro->update($alteracoes);
        $alteracao1 = $registro->update($alteracoes1);
        $alteracao2 = $registro->update($alteracoes2);
        //dd($alteracoes);
        //dd($registro);

        $ent = User::find($entidade);
        $registro->users()->sync($ent);


        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {

            //SE EXISTIR ALGUMA IMAGEM CADASTRADA
            if (count($registro->imagens) > 0) {

                $imagemAntiga = $registro->imagens[0]->caminho;
                $img = Imagem::where('caminho', $imagemAntiga)
                    ->get()
                    ->map(function ($value) {
                        return $value->id;
                    })->toArray();

                /*$n = $img->map(function ($value){
                    return $value->id;
                });
                dd($n->toArray());*/
                $imagemAlterada = Imagem::find($img);
                $imagemAlteradaId = $imagemAlterada[0];
                //$imagemAlteradaId = $imagemAlterada[0]->id;
                //$i = $imagemAlterada->toArray();
                //dd($i);
                //dd($imagemAlterada->toArray());
                //dd($imagemAlterada[0]);
                //dd($imagemAlteradaId);
                //dd($imagemAlterada);


                $horaAtual = Carbon::parse()->timestamp;
                //dd($horaAtual);
                $nomeImagem = kebab_case($horaAtual) . kebab_case($ent->endereco->rua);
                //dd($nomeImagem);

                $extensao = $request->imagem->extension();
                $nomeImagemFinal = "{$nomeImagem}.{$extensao}";
                $request->imagem->move(public_path('imagens/users'), $nomeImagemFinal);

                $imagem = "imagens/users/" . $nomeImagemFinal;


                $sim = $imagemAlteradaId->update(['caminho' => $imagem]);
            }

            //SE NÃO EXISTIR ALGUMA IMAGEM CADASTRADA

            $horaAtual = Carbon::parse()->timestamp;
            //dd($horaAtual);
            $nomeImagem = kebab_case($horaAtual) . kebab_case($ent->endereco->rua);
            //dd($nomeImagem);

            $extensao = $request->imagem->extension();
            $nomeImagemFinal = "{$nomeImagem}.{$extensao}";
            $request->imagem->move(public_path('imagens/users'), $nomeImagemFinal);

            $imagem = "imagens/users/" . $nomeImagemFinal;


            //$upload = $request->imagem->storeAs('imagem', $nomeImagemFinal);
            $imagemCreate = new Imagem;
            $imagemCreate->caminho = $imagem;
            $imagemCreate->campanhas_id = $registro->id;
            $imagemCreate->eventos_id = null;

        }


        if ($alteracao && $alteracao1 && $alteracao2) {
            return redirect()->route('minhas-campanhas.index')->with('status', 'Campanha Alterada!');
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
        if (!Auth::check()) {
            return redirect('/');
        }
        $entidadeLogada = Auth::user();
        $campanha = Campanha::find($id);

        $campanhas = $entidadeLogada->campanhas()
            ->where('status', 1)
            ->orderBy('id', 'desc')->get();


        if ($campanha == null) {
            return redirect()->back()->with('Esta campanha não existe!');
        }
        //dd($entidadeLogada);
        $verificarCampanha = DB::table('user_campanhas')
            ->where('users_id', $entidadeLogada->id)
            ->where('campanhas_id', $campanha->id)
            ->first();
        if ($verificarCampanha == null) {
            return redirect()->back()->with('Você não tem esta permissão!');
        }

        $alteracao = $campanha->update([
            'status' => 0
        ]);

        return view('site.campanha.minhasCampanhas', compact('entidadeLogada', 'campanhas'));

    }
}
