<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autentication;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;


class AutenticationController extends Controller
{
    public function create()
    {
        return view('autentication.create');
    }

    public function store(Request $request)
    {
        // Testando a validacao dos dados 
        $validatorEmail = Validator::make($request->all(), [
            'email' => 'required|email|unique:autentication'
        ]);

        $validatorSenha = Validator::make($request->all(), [
            'senha' => 'required|min:6'
        ]);

        if ($validatorSenha->fails()) {
            return response()->json(['success' => false, 'message' => 'A senha precisa ter ao menos 6 caracteres.']);
        }

        if ($validatorEmail->fails()) {
            return response()->json(['success' => false, 'message' => 'Você precisa digitar um email']);
        }

        $existingUser = Autentication::where('email', $request->email)->first();
        if ($existingUser) {
            return response()->json(['success' => false, 'message' => 'O e-mail já está em uso.']);
        }

        // Novo usuario usando Eloquent
        $autentication = new Autentication;
        $autentication->email = $request->email;
        $autentication->senha = bcrypt($request->senha);
        $autentication->save();

        // Autentica o usuário após o registro
        Auth::login($autentication);

        // Redirecionamento
        return response()->json(['success' => true, 'message' => 'Usuário registrado com sucesso']);
    }
}

