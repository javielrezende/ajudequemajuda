<?php

namespace App\Http\Controllers;

use App\Campanha;
use App\User;
use App\UserCampanhaCurtidaInteresse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CampanhaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$dataInicial = Campanha::get([
        //            'dataInicio'
        //       ]);
        //dd($dataInicial);
        //if(isset($dataInicial)){
        //  $data_sem_barra = array_reverse(explode('-', $dataInicial));
        // dd($data_sem_barra);
        //};

        //$dataInicialString = (string) $dataInicial;
        //dd(gettype($dataInicialString));
        //dd($dataInicialString);
        //$data = date('d/m/Y', strtotime($dataInicialString));
        //dd($data);
        //$data = date_create_immutable_from_format('Y-m-d', $dataInicial, date_timezone_get(1));
        //   dd($data);

        //Carbon::setLocale('pt_BR');
        //setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        //echo $dt->formatLocalized('%A %d %B %Y');
        //$dataInicial = date('d/m/Y', strtotime(Campanha::where('id', 2)->get([
        //            'dataInicio'
        //        ])));
        //$dataInicial = Campanha::where('id', 2)->get([
        //        'dataInicio'
        //    ]);
        //$dataInicialPhp = date_create($dataInicial);
        //dd($dataInicial);
        //dd($dataInicial);
        //if (isset($dataInicial)){
        //dd($dataInicial);
        //$data->formatLocalized('%d %m %Y');
        //$dataInicial->format("d/m/Y");
        //$dataInicial = date('d/m/Y', strtotime($dataInicial));
        //   $data = $dataInicial->strftime('d/m/Y');
        //   dd($data);
        // }
        //$dataInicialFormatada = Carbon::parse($data)->format('d/m/Y');
        //$dataInicialFormatada = $data->format('d/m/Y');
        //$dataInicialFormatada = $data->formatLocalized('d/m/Y');
        //$dataInicialFormatada = $data->year;
        //dd($dataInicialFormatada);

        $campanhas = Campanha::with('users')
            ->where('status', 1)
            ->orderBy('id')
            ->get([
                'id', 'nome', 'descricao', 'dataInicio', 'dataFim'
            ]);

        //return $campanhas;

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

        $entidades = User::where('entidade', 1)
            ->orderBy('name')->get();
        //dd($entidades);

        return view('campanhas/campanhas_form', compact('acao', 'entidades'));
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
            return redirect('/');
        }

        $usuario = $request['entidade'];
        //
        $dataInicial = $request['dataInicio'];
        $dataFinal = $request['dataFim'];
        //dd($dataInicial);

        if (isset($dataInicial)) {
            $dataInicialFormatada = Carbon::createFromFormat('d/m/Y', $dataInicial)->toDateString();
            //dd($dataInicialFormatada);
            $dataFinalFormatada = Carbon::createFromFormat('d/m/Y', $dataFinal)->toDateString();
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

        $campanha->users()->sync($usuario);


        if ($resultado) {
            return redirect()->route('campanhas.index')
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $registro = Campanha::find($id);

        $entidades = User::where('entidade', 1)
            ->orderBy('name')->get();

        $acao = 2;

        return view('campanhas/campanhas_form', compact('registro', 'entidades', 'acao'));
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
            return redirect('/');
        }

        $dataInicial = $request['dataInicio'];
        $dataFinal = $request['dataFim'];

        //$dataInicialFormatada = null;
        //$dataFinalFormatada = null;

        //dd($dataInicial);
        //$dados = $request->all();
        $nome = $request['nome'];
        $entidade = $request['entidade'];
        $descricao = $request['descricao'];

        $registro = Campanha::find($id);

        $alteracoes = ['nome' => $nome, 'entidade' => $entidade, 'descricao' => $descricao];

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

        if ($alteracao && $alteracao1 && $alteracao2) {
            return redirect()->route('campanhas.index')->with('status', 'Campanha Alterada!');
        }
    }
//        if (!Auth::check()) {
//            return redirect('/');
//        }
//
//        $dados = $request->all();
//        $dados = $request->all();
//
//        $registro = Campanha::find($id);
//
//        $alteracao = $registro->update($dados);
//
//        if ($alteracao) {
//            return redirect()->route('campanhas.index')->with('status', 'Campanha Alterada!');
//        }


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

        $dados = Campanha::find($id);
        $alteracao = $dados->update([
            'status' => 0
        ]);

        if ($alteracao) {
            return redirect()->route('campanhas.index')->with('status', 'Campanha Deletada!');
        }
    }
}
