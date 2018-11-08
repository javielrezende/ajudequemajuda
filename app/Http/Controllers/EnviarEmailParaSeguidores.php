<?php

namespace App\Http\Controllers;

use App\Mail\EmailParaSeguidores;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EnviarEmailParaSeguidores extends Controller
{
    public function enviarEmail(Request $request){
//        Mail::to('javielrezende@gmail.com')->send(new EmailParaSeguidores());
//        return 'OK';

        $entidade = Auth::user();
        $entidadeNome = Auth::user()->name;

        $mensagemEmail = $request['mensagemEmail'];
        dd($mensagemEmail);

        // Parametros:
        // Template do email, dados que vai enviar e a funcao em si
        Mail::send('site.email.corpoEmail', [], function ($message){
            $message->to(['javielrezende@gmail.com', 'ajudequemajuda.sistema@gmail.com']);
            $message->subject('ESCREVER AQUI O ASSUNTO DA MENSAGEM');
        });


    }
}
