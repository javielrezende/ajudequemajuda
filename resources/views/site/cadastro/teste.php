<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class
BuscaAjaxController extends Controller
{

    public function paginaBuscaLigas()
    {
        return view('lista.ligas');
    }

    public function buscaLigasAjax(Request $request)
    {
        if ($request->ajax()) {
            $saida = "";
            $ligas = DB::table('ligas')->where('nome_liga', 'LIKE', '%' . $request->buscaLigasAjax . "%")->get();
            if ($ligas) {
                foreach ($ligas as $key => $liga) {
                    if (file_exists(public_path('imagens_ligas/' . $liga->id . '.png'))) {
                        $imagem_liga = '../imagens_ligas/' . $liga->id . '.png';
                    } else {
                        $imagem_liga = '../imagens_ligas/sem_foto.png';
                    }
                    $saida .= '<tr>' .
                        '<td style="text-align: center">' . $liga->nome_liga . '</td>' .
                        '<td style="text-align: center"> 
    <a href=' . $imagem_liga . ' data-lightbox="roadtrip" data-lightbox-gallery="gallery1" data-lightbox-hidpi=' . $imagem_liga . '>
    <img src=' . $imagem_liga . ' id="imagem" class="img-circle" width="50" height="50" alt="Imagem da Liga" data-zoom-image=' . $imagem_liga . '> </a> </td>' .
                        '<td style="text-align: center"> <img title="Editar Liga" src="icones/editar.png" width="30px" height="30px" data-toggle="modal" data-target="#modalEditarLiga' . $liga->id . '">' . '<form method="post" action="{{route("deletar.liga,' . $liga->id . ')}}">           <input title="Deletar Liga" type="image" src="icones/deletar.png" width="30px" height="30px" >                                                                ' . ' </form> </td>' .
                        '</tr>';
                }
                return Response($saida);
            }
        }
    }
}

