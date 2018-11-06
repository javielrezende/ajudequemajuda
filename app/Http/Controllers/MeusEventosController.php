<?php

namespace App\Http\Controllers;

use App\Endereco;
use App\Evento;
use App\Imagem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MeusEventosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entidadeLogada = Auth::user();

        $campanhas = $entidadeLogada->campanhas()->orderBy('id', 'desc')->get();

        return view('site.evento.meusEventos', compact('entidadeLogada', 'campanhas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::check()) {
            return redirect('/aqa-login');
        }

        $acao = 1;

        $entidadeLogada = Auth::user();

        $campanhas = $entidadeLogada->campanhas;

        return view('site.evento.criar', compact('acao', 'campanhas'));
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
            return redirect('/aqa-login');
        }

        $dataHoraInicial = $request['dataHoraInicio'];
        $dataHoraFinal = $request['dataHoraFim'];
        //dd($dataInicial);

        $dataHoraInicial1 = $request['dataHoraInicio1'];
        //dd($dataHoraInicial1);
        $dataHoraFinal1 = $request['dataHoraFim1'];
        //dd($dataHoraFinal1);

        if (isset($dataHoraInicial)) {
            $dataInicialFormatada = Carbon::createFromFormat('d/m/Y', $dataHoraInicial)->toDateString();
            //dd($dataInicialFormatada);
            $dataFinalFormatada = Carbon::createFromFormat('d/m/Y', $dataHoraFinal)->toDateString();
            //dd($dataInicialFormatada);
            //dd($dataFinalFormatada);
        } else {
            $dataInicialFormatada = null;
            $dataFinalFormatada = null;
        }

        //$usuario = Auth::user();
        //$campanha = $usuario->campanhas()->get()->first();
        $campanha = $request['campanha'];
        //dd($campanha->id);

        $endereco = Endereco::create([
            'rua' => $request['rua'],
            'numero' => $request['numero'],
            'complemento' => $request['complemento'],
            'bairro' => $request['bairro'],
            'cidade' => $request['cidade'],
            'estado' => $request['estado'],
            'cep' => $request['cep'],
        ]);

        $resultado = Evento::create([
            'nome' => $request['nome'],
            'descricao' => $request['descricao'],
            'status' => 1,
            'dataHoraInicio' => $dataInicialFormatada,
            'dataHoraFim' => $dataFinalFormatada,
            'dataHoraInicio1' => $dataHoraInicial1,
            'dataHoraFim1' => $dataHoraFinal1,
            'enderecos_id' => $endereco->id,
            'campanhas_id' => $campanha,
        ]);

        $usuario = Auth::user();

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
            dd($resultado2);


            /*$imagemCreate = Imagem::create([
                'caminho' => $imagem,
                'campanhas_id' => $campanha
            ]);*/
            dd($imagemCreate);
        }

        //dd($resultado);
        if ($resultado) {
            return redirect()->route('meus-eventos.index')
                ->with('status', 'Evento Cadastrado!');
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
        if(!Auth::check()){
            return redirect()->to(url('/aqa-login'));
        }

        $entidade = Auth::user();

        $evento = Evento::with('campanhas')
            ->find($id);

        //dd($evento->enderecos->cep);
        //dd($evento->campanhas->nome);

        return view('site.evento.cadastroEventos', compact('evento', 'entidade'));
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
