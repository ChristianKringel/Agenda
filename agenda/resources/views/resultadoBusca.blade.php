@extends('novoMenu')

@section('title', 'Resultados da Busca')

@section('content')
<link rel="stylesheet" href="/css/busca.css">
<div class="resultados">
    <h1>Resultados da Busca para: "{{ $termo }}"</h1>

    @if($contatos->count() > 0)
    <ul>
        @foreach($contatos as $contato)
        <a href="{{ route('contatos.showDetalhes', ['nome' => $contato->nome]) }}" class="nome-text">{{
            $contato->nome }} - {{ $contato->nroCel }} </a>
        <p></p>
        @endforeach
    </ul>
    @else
    <p>Nenhum resultado encontrado.</p>
    @endif
</div>
@endsection