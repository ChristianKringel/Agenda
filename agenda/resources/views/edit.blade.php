@extends('novoMenu')

@section('title', 'Resultados da Busca')

@section('content')


<!-- ========== Pagina de edição de contato ========== -->
<body>
    @guest
    <a href="registro" class="precisaLogar">Você precisa estar logado</a>
    @endif
    <link rel="stylesheet" href="/css/edit.css">
    <form action="{{ route('contatos.update', ['id' => $contato->id]) }}" method="post" class="form-edit">
        @csrf
        @method('put')
        @csrf
        <div card-text>
            <div class="text-fill">
                <label for="nome">Nome</label>
                <input type="text" name="nome" value="{{ $contato->nome }}" required>
            </div>
            <div class="text-fill">
                <label for="email">E-mail</label>
                <input type="email" name="email" placeholder="E-mail" id="email" value="{{ $contato->email }}" required>
            </div>
            <div class="text-fill">
                <label for="nroCel ">Numero de Celular</label>
                <input type="text" name="nroCel" value="{{ $contato->nroCel }}" required>
            </div>
            <div class="text-fill">
                <label for="nota">Notas</label>
                <input type="nota" name="nota" placeholder="Nota " id="nota" value="{{ $contato->nota }}" required>
            </div>
            <div class="endereco">
                <div class="text-fill">
                    <label for="CEP">CEP</label>
                    <input type="CEP" name="CEP" placeholder="CEP (Digitar somente numeros)" id="CEP"
                        value="{{ $contato->endereco->cep }}" required>
                </div>
                <div class="text-fill">
                    <label for="rua">Rua</label>
                    <input type="text" name="rua" value="{{ $contato->endereco->rua }}" required>
                </div>
                <div class="text-fill">
                    <label for="numero">Número</label>
                    <input type="text" name="numero" placeholder="Número" id="numero"
                        value="{{ $contato->endereco->numero }}" required>
                </div>
                <div class="text-fill">
                    <label for="complemento">Complemento</label>
                    <input type="text" name="complemento" placeholder="Complemento" id="complemento"
                        value="{{ $contato->endereco->complemento }}" required>
                </div>
                <div class="text-fill">
                    <label for="bairro">Bairro</label>
                    <input type="bairro" name="bairro" placeholder="Bairro" id="bairro"
                        value="{{ $contato->endereco->bairro }}" required>
                </div>
                <div class="text-fill">
                    <label for="cidade">Cidade</label>
                    <input type="cidade" name="cidade" placeholder="Cidade" id="cidade"
                        value="{{ $contato->endereco->cidade }}" required>
                </div>
                <div class="text-fill">
                    <label for="estado">Estado</label>
                    <input type="estado" name="estado" placeholder="Estado" id="estado"
                        value="{{ $contato->endereco->estado }}" required>
                </div>
                <!--  -->
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('contatos.update', ['id' => $contato->id]) }}" method="get">
                    @csrf
                    @method('put')
                    <button type="submit" class="edit-bttn">Salvar</button>
                </form>
            </div>
    </form>

</body>
@endsection