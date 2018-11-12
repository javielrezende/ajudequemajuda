<?php

namespace App\Http\Controllers;

use App\Campanha;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SiteCampanhaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campanhas = Campanha::where('status', 1)
            ->orderBy('destaque', 1)
            ->orderBy('id', 'desc')
            ->get();


            // $c = DB::table('user_campanha_curtidas')
            // ->where('campanhas_id', $campanha->id)
            // ->where('curtida', 1)
            // ->get()
            // ->map(function ($value) {
            //     return $value->curtida;
            // })->count();


        return view('site.campanha.campanhas', compact('campanhas'));
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
        $num = 0;
        $campanha = Campanha::find($id);

//        $coun = 0;

        $c = DB::table('user_campanha_curtidas')
            ->where('campanhas_id', $campanha->id)
            ->where('curtida', 1)
            ->get()
            ->map(function ($value) {
                return $value->curtida;
            })->count();
            

        if (Auth::check()) {
            $usuario = Auth::user()->id;
            $campanha = Campanha::find($id);
            $registro = Campanha::with(['users', 'itens'])
                ->find($id);

            $result = DB::table('user_campanha_interesses')
                ->where('users_id', $usuario)
                ->where('campanhas_id', $campanha->id)
                ->first();

            $res = DB::table('user_campanha_curtidas')
                ->where('users_id', $usuario)
                ->where('campanhas_id', $campanha->id)
                ->first();

            if ($result && $res) {
                $resultado = DB::table('user_campanha_interesses')
                    ->where('users_id', $usuario)
                    ->where('campanhas_id', $campanha->id)
                    ->get();
                $resultado1 = DB::table('user_campanha_curtidas')
                    ->where('users_id', $usuario)
                    ->where('campanhas_id', $campanha->id)
                    ->get();

                $resultado2 = DB::table('user_campanha_curtidas')
                    ->where('campanhas_id', $campanha->id)
                    ->get();
                $num = $resultado2->count();

                $seguindo = $resultado[0]->interesse;
                $curtida = $resultado1[0]->curtida;
                return view('site.campanha.campanha', compact('registro', 'seguindo', 'curtida', 'num', 'c'));
            }

            if ($result && !$res) {
                $resultado = DB::table('user_campanha_interesses')
                    ->where('users_id', $usuario)
                    ->where('campanhas_id', $campanha->id)
                    ->get();

                $seguindo = $resultado[0]->interesse;
                $curtida = null;
                return view('site.campanha.campanha', compact('registro', 'seguindo', 'curtida', 'num', 'c'));
            }

            if (!$result && $res) {
                $resultado1 = DB::table('user_campanha_curtidas')
                    ->where('users_id', $usuario)
                    ->where('campanhas_id', $campanha->id)
                    ->get();
                $resultado2 = DB::table('user_campanha_curtidas')
                    ->where('campanhas_id', $campanha->id)
                    ->get();
                $num = $resultado2->count();
                //dd($num);

                $seguindo = null;
                $curtida = $resultado1[0]->curtida;
                return view('site.campanha.campanha', compact('registro', 'seguindo', 'curtida', 'num', 'c'));
            }

            if (!$result && !$res) {
                $seguindo = null;
                $curtida = null;
                return view('site.campanha.campanha', compact('registro', 'seguindo', 'curtida', 'num', 'c'));
            }
        }


        //dd('oi');

        $registro = Campanha::with('users')
            ->find($id);

        return view('site.campanha.campanha', compact('registro', 'num', 'c'));
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
