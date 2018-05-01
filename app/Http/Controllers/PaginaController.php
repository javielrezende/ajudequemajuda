<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginaController extends Controller
{
    public function index()
    {
        $users = User::where('entidade', 0)
            ->orderBy('id')
            ->get();
        return view('users/users_list', compact('users'));
    }
}
