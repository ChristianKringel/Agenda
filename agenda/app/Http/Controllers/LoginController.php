<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autentication;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('/meu-login');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required',
        ]);

        $user = Autentication::where('email', $request->input('email'))->first();

        if (!$user || !Hash::check($request->input('senha'), $user->senha)) {
            Log::info('Tentativa de login falhou para o e-mail: ' . $request->input('email'));
            return response()->json(['success' => false, 'message' => 'Credenciais inválidas']);
        }

        Log::info('Usuário autenticado com sucesso para o e-mail: ' . $request->input('email'));
        Auth::guard('web')->login($user);

        $request->session()->regenerate();
       

        return response()->json(['success' => true, 'message' => 'Usuário autenticado com sucesso']);
    }


    /*
    public function store(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'senha' => 'required',
            ]);

            $user = User::Where ('email', $request->input('email'))->first();
            if(! $user) {
                return response()->json(['success' => false, 'message' => 'Credenciais inválidas']);
            }
            // $credentials = $request->only('email', 'senha');
            // $authenticated = Auth::attempt($credentials);
            // if (!$authenticated) {
            //     return response()->json(['success' => false, 'message' => 'Credenciais inválidas']);
            // }
            // return response()->json(['success' => true, 'message' => 'Usuário logado']);
            //$credentials['senha'] = bcrypt($credentials['senha']);
            /*


            // Log para verificar as credenciais antes da autenticação
            \Log::info('Tentativa de login com credenciais: ' . json_encode($credentials));

            $authenticated = Auth::attempt($credentials);

            if ($authenticated) {
                $user = Auth::user();
                Auth::login($user);
                return response()->json(['success' => true, 'message' => 'Usuário logado']);
            } else {
            }
            */
    //$user = Auth::user();
    //Auth::login($user);
    //Auth::login($credentials);
    //return response()->json(['success' => true, 'message' => 'Usuário logado']);
    // Restante do código...
    /*
} catch (\Exception $e) {
    // Log para verificar erros durante a autenticação
    \Log::error($e);

    return response()->json(['success' => false, 'message' => 'Erro interno no servidor.']);
}
}*/




    public function destroy()
    {
        Auth::logout();
        return redirect()->route('meu-login')->with('success', 'Usuário deslogado');
    }
    /*public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/meu-login');
    } */
}
