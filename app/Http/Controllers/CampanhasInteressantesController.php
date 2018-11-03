<?php

namespace App\Http\Controllers;

use App\Campanha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CampanhasInteressantesController extends Controller
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

        $usuario = Auth::user();

        $num = 0;

        $campanhasIds = DB::table('user_campanha_interesses')
            ->where('users_id', $usuario->id)
            ->where('interesse', 1)
            ->get()
            ->map(function ($value) {
                return $value->campanhas_id;
            });


        $campanhasInteressadas = Campanha::findMany($campanhasIds);

        if ($campanhasInteressadas) {
            $resultado = DB::table('user_campanha_interesses')
                ->where('users_id', $usuario->id)
                ->where('interesse', 1)
                ->get();
            //dd($resultado[1]->campanhas_id);
            $num = $resultado->count();
            //dd($num);
        }

        return view('site.campanha.campanhasInteressantes', compact('num', 'campanhasInteressadas'));
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
