<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Contatos;
use App\Models\Autentication;
use App\Models\Endereco;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ContatosController extends Controller
{
    public function create()
    {
        return view('contatos.create');
    }

    public function store(Request $request)
    {
        //Validadores
        $validatorNome = Validator::make($request->all(), [
            'nome' => 'required|string|max:255'
        ]);

        $validatorNroCel = Validator::make($request->all(), [
            'nroCel' => 'required|integer|unique:contatos,nroCel,NULL,id,autentication_id,' . auth()->id()
        ]);

        if ($validatorNroCel->fails()) {
            return response()->json(['success' => false, 'message' => 'Você precisa digitar um numero de telefone válido']);
        }

        if ($validatorNome->fails()) {
            return response()->json(['success' => false, 'message' => 'Você precisa digitar um nome para o contato']);
        }

        DB::beginTransaction();

        try {
            // Obtém o ID do usuário autenticado
            $userId = auth()->user()->id;

            // Criacao do endereço
            $endereco = Endereco::create([
                'rua' => $request->input('rua'),
                'bairro' => $request->input('bairro'),
                'cidade' => $request->input('cidade'),
                'estado' => $request->input('estado'),
                'cep' => $request->input('cep'),
                'numero' => $request->input('numero'),
                'complemento' => $request->input('complemento')
            ]);

            // Criacao do contato associado ao endereço e ao ID de autenticação
            $contato = Contatos::create([
                'nome' => $request->input('nome'),
                'nroCel' => $request->input('nroCel'),
                'email' => $request->input('email'),
                'nota' => $request->input('nota'),
                'endereco_id' => $endereco->id,
                'autentication_id' => $userId,

            ]);
            // $contato->autentication_id = $userId->id;

            //dd($contato);

            // Commit
            DB::commit();

            return response()->json(['success' => true, 'user_id' => $userId, 'message' => 'Usuário registrado com sucesso']);
        } catch (\Exception $e) {

            \Illuminate\Support\Facades\Log::error('Erro ao registrar o contato: ' . $e->getMessage());
            DB::rollback();
            return response()->json(['success' => false, 'message' => 'Erro ao registrar o contato', 'error' => $e->getMessage()]);
        }
    }

    public function show($nome)
    {

        // Pegar o id do autentication 
        $userId = Auth::id();

        $contato = Contatos::where('autentication_id', $userId)->where('nome', $nome)->first();

        // Verificar se o contato existe
        if (!$contato) {
            return redirect()->route('pagina_de_erro'); // arrumar pg erro
        }


        return view('show', ['contato' => $contato]);
        //$autentication = Autentication::findOrFail($id);
        //$contatos = $autentication->contatos;
        //return view('main', ['contatos' => $contatos]);
        //return view('show', ['contatos' => $contatos]);

    }

    public function showNomes()
    {
        // Pegar o id do autentication 
        $userId = Auth::id();


        $contatos = Contatos::where('autentication_id', $userId)->get();


        return view('nomes', ['contatos' => $contatos]);
    }


    public function excluirContato($id)
    {
        $contato = Contatos::findOrFail($id);
        $contato->delete();

        return redirect()->route('contatos.showNomes')->with('success', 'Contato excluído com sucesso!');
    }

    public function edit($id)
    {
        $contato = Contatos::findOrFail($id);

        return view('edit', ['contato' => $contato]);
    }

    public function update(Request $request, $id)
    {
        $contato = Contatos::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nroCel' => 'required|integer|unique:contatos,nroCel,' . $id . ',id,autentication_id,' . auth()->id()
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Atualiza os campos do contato
        $contato->update([
            'nome' => $request->input('nome'),
            'nroCel' => $request->input('nroCel'),
            'email' => $request->input('email'),
            'nota' => $request->input('nota'),
        ]);

        // Obtém o endereço associado ao contato
        $endereco = $contato->endereco;

        // Atualiza os campos do endereço
        $endereco->update([
            'rua' => $request->input('rua'),
            'bairro' => $request->input('bairro'),
            'cidade' => $request->input('cidade'),
            'estado' => $request->input('estado'),
            'cep' => $request->input('CEP'),
            'numero' => $request->input('numero'),
            'complemento' => $request->input('complemento'),
        ]);

        return redirect()->route('contatos.showDetalhes', ['nome' => $contato->nome])->with('success', 'Contato atualizado com sucesso!');
    }



}
