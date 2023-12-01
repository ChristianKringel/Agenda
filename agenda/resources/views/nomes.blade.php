<!-- ========== Menu ========== -->
@extends('novoMenu')

@section('title', 'Resultados da Busca')

@section('content')



<!-- ========== Pagina principal ========== -->
<!-- ========== Mostra os contatos do usuário ========== -->
    </nav>
    <link rel="stylesheet" href="/css/styleNomes.css">
    <link rel="stylesheet" href="/css/precisaLogar.css">
    @guest
    <a href="registro" class="precisaLogar">Você precisa estar logado</a>
    @endif
    @auth
    <div class="lista-nomes">
        <h1>Nomes dos Contatos:</h1>

        @foreach ($contatos as $contato)
        <p>
            <a href="{{ route('contatos.showDetalhes', ['nome' => $contato->nome]) }}" class="nome-text">{{
                $contato->nome }} - {{ $contato->nroCel }} </a>
            | <a href="{{ route('contatos.edit', ['id' => $contato->id]) }}" class="editar-btn">Editar</a>
        <form action="{{ route('contatos.excluirContato', ['id' => $contato->id]) }}" method="post"
            onsubmit="return confirm('Tem certeza que deseja excluir este contato?')">
            @csrf
            @method('post')
            <button type="submit" class="excluir-btn">Excluir</button>
        </form>
        </p>
        @endforeach
    </div>
@endauth
</body>
@endsection