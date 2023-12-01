<?php
// BuscaController.php
// BuscaController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contatos;

class BuscaController extends Controller
{
    //Controlador para a busca
    public function index(Request $request)
    {
        $termo = $request->input('termo');
        $userId = auth()->id();

        $contatos = Contatos::where('autentication_id', $userId)
            ->where(function ($query) use ($termo) {
                $query->where('nome', 'LIKE', "%$termo%")
                    ->orWhere('nroCel', 'LIKE', "%$termo%");
            })
            ->get();

        return view('resultadoBusca', compact('contatos', 'termo'));
    }
}

