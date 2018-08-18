<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Endereco;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            //'cpf' => 'required|numeric|min:11|max:11',
            //'fone' => 'numeric|min:11|max:11',
            //'rua' => 'required|string|max:100',
            //'numero' => 'required|numeric|max:6',
            //'complemento' => 'string|max:100',
            //'cidade' => 'required|string|max:100',
            //'cep' => 'required|numeric|min:8|max:8',
            //'estado' => 'required|string|max:50',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $confirmacaoEntidade = 0;
        $descricaoEntidade = null;
        if(isset($data['solicitacao_entidade'])){
            $confirmacaoEntidade = 1;
            $descricaoEntidade = $data['descricao_entidade'];
        };

        $endereco = Endereco::create([
            'rua' => $data['rua'],
            'numero' => $data['numero'],
            'complemento' => $data['complemento'],
            'cidade' => $data['cidade'],
            'bairro' => $data['bairro'],
            'cep' => $data['cep'],
            'estado' => $data['estado'],
        ]);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'cpf' => $data['cpf'],
            'cnpj' => $data['cnpj'],
            'entidade' => $confirmacaoEntidade,
            'fone' => $data['fone'],
            'status' => 1,
            'mensagem' => $data['mensagem'],
            'descricao_entidade' => $descricaoEntidade,
            'enderecos_id' => $endereco->id,
        ]);
    }
}
