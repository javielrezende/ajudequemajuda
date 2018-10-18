<?php

namespace App\Http\Controllers;

use App\Mail\EmailParaSeguidores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EnviarEmailParaSeguidores extends Controller
{
    public function enviarEmail(){
        Mail::to('celinahernande@gmail.com')->send(new EmailParaSeguidores());
        return 'OK';
    }
}
