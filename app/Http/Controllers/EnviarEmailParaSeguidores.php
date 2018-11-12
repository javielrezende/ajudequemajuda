<?php

namespace App\Http\Controllers;

use App\Mail\EmailParaSeguidores;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class EnviarEmailParaSeguidores extends Controller
{
    public function enviarEmail(Request $request)
    {
//        Mail::to('javielrezende@gmail.com')->send(new EmailParaSeguidores());
//        return 'OK';

        $entidade = Auth::user();
        $entidadeNome = Auth::user()->name;

        $mensagemEmail = $request['mensagemEmail'];
        $nomeCampanha = $request['nomeCampanha'];
        $idCampanha = $request['idCampanha'];

        $usuariosId = DB::table('user_campanha_interesses')
            ->where('campanhas_id', $idCampanha)
            ->where('interesse', 1)
            ->get()
            ->map(function ($value) {
                return $value->users_id;
            });

        //dd($usuariosId);

        $ids = User::findMany($usuariosId);
        //dd($ids);

        if ($ids) {
            $emails = $ids
                ->map(function ($value) {
                    return $value->email;
                });
                //dd($emails->toArray());
            Mail::send('site.email.corpoEmail', ['mensagemEmail' => $mensagemEmail, 'nomeCampanha' => $nomeCampanha],
             function ($message) use ($mensagemEmail, $nomeCampanha, $emails) {
                $message->from('ajudequemajuda.sistema@gmail.com', 'Sistema Ajude Quem Ajuda');
                $message->to(['ajudequemajuda.sistema@gmail.com']);
                $message->bcc($emails->toArray());
                $message->subject('Sistema Ajude Quem Ajuda');
            });
        }
        //dd($emails);

        //dd($idCampanha);
        //dd($nomeCampanha);
        //dd($mensagemEmail);

        // Parametros:
        // Template do email, dados que vai enviar e a funcao em si
        


    }
}
