<?php

namespace App\Http\Controllers;

use App\Campanha;
use App\Endereco;
use App\User;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Auth::user());
        if (Auth::check() && Auth::user()->funcao == 1) {
            return redirect()->to(url('/entidade-site'));
        }

        if (Auth::check() && Auth::user()->funcao == 0) {
            return redirect()->to(url('/usuario-site'));
        }

        $campanhas = Campanha::with('users')
            ->where('destaque', 1)
            ->where('status', 1)
            ->orderBy('id', 'desc')
//            ->get();
            ->paginate(4);
       // dd($campanhas[0]->users);

        return view('welcomesite', compact('campanhas'));
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
     * Cadastra usuario doador
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'file' => 'max:5120', //5MB
        ]);

        $endereco = Endereco::create([
            'rua' => $request['rua'],
            'numero' => $request['numero'],
            'complemento' => $request['complemento'],
            'cidade' => $request['cidade'],
            'bairro' => $request['bairro'],
            'cep' => $request['cep'],
            'estado' => $request['estado'],
        ]);

        $imagem = null;

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {

            $horaAtual = Carbon::parse()->timestamp;
            //dd($horaAtual);
            $nomeImagem = kebab_case($horaAtual) . kebab_case($endereco->rua);
            //dd($nomeImagem);

            $extensao = $request->imagem->extension();
            $nomeImagemFinal = "{$nomeImagem}.{$extensao}";
            $request->imagem->move(public_path('imagens/users'), $nomeImagemFinal);

            $imagem = "imagens/users/" . $nomeImagemFinal;

            //dd($imagem);

            //$upload = $request->imagem->storeAs('imagem', $nomeImagemFinal);
            //dd($nomeImagem, $extensao, $nomeImagemFinal);
        }

        $resultado = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'cpf' => $request['cpf'],
            'cnpj' => null,
            'funcao' => User::USUARIO,
            'fone' => $request['fone'],
            'imagem' => $imagem,
            'status' => 1,
            'enderecos_id' => $endereco->id,
        ]);

        if ($resultado) {
            return redirect()->route('aqa.index');
            //->with('status', 'Usuário Cadastrado!');
        }
    }

    /*
     * Cadastra entidades pela rota do site
     */
    public function storeentidade(Request $request)
    {
        $validator = $request->validate([
            'file' => 'max:5120', //5MB
        ]);

        $endereco = Endereco::create([
            'rua' => $request['rua'],
            'numero' => $request['numero'],
            'complemento' => $request['complemento'],
            'cidade' => $request['cidade'],
            'bairro' => $request['bairro'],
            'cep' => $request['cep'],
            'estado' => $request['estado'],
        ]);

        $imagem = null;

        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {

            $horaAtual = Carbon::parse()->timestamp;
            //dd($horaAtual);
            $nomeImagem = kebab_case($horaAtual) . kebab_case($endereco->rua);
            //dd($nomeImagem);

            $extensao = $request->imagem->extension();
            $nomeImagemFinal = "{$nomeImagem}.{$extensao}";
            $request->imagem->move(public_path('imagens/users'), $nomeImagemFinal);

            $imagem = "imagens/users/" . $nomeImagemFinal;

            //dd($imagem);

            //$upload = $request->imagem->storeAs('imagem', $nomeImagemFinal);
            //dd($nomeImagem, $extensao, $nomeImagemFinal);
        }

        $resultado = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'cpf' => $request['cpf'],
            'cnpj' => $request['cnpj'],
            'funcao' => User::ENTIDADE,
            'status' => 0,
            'fone' => $request['fone'],
            'imagem' => $imagem,
            'mensagem' => $request['mensagem'],
            'descricao_entidade' => $request['descricao_entidade'],
            'enderecos_id' => $endereco->id,
        ]);


        if ($resultado) {
            return redirect()->route('aqa.index');
            //->with('status', 'Entidade Cadastrada!');
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
        //
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
