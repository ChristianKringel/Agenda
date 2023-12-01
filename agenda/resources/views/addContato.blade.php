<!-- ========== Menu ========== -->
@extends('novoMenu')

@section('title', 'Resultados da Busca')

@section('content')


<!-- ========== Registro de contatos ========== -->
<link rel="stylesheet" href="/css/addContato.css">
<link rel="stylesheet" href="/css/precisaLogar.css">
<script src="/js/addContato.js"></script>
@guest
    <a href="registro" class="precisaLogar">Você precisa estar logado</a>
    @endif
<div class="add-contatos">
    @auth
    <h1 class="registro-h1">REGISTRO</h1>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <form action="/contatos" method="POST" name="formLogin" class="formLogin">
        @csrf
        <div class="text-fill">
            <label for="nome">Nome</label>
            <input type="text" name="nome" placeholder="Nome" id="nome">
        </div>
        <div class="text-fill">
            <label for="email">E-mail</label>
            <input type="email" name="email" placeholder="E-mail" id="email">
        </div>
        <div class="text-fill">
            <label for="nroCel ">Numero de Celular</label>
            <input type="Cellphone" name="nroCel " placeholder="Número de Celular" id="nroCel ">
        </div>
        <div class="text-fill">
            <label for="nota">Notas</label>
            <input type="nota" name="nota" placeholder="Nota" id="nota">
        </div>

        <!-- ========== Sessão de endereço ========== -->

        <div class="endereco">
            <div class="text-fill">
                <label for="CEP">CEP</label>
                <input type="text" name="CEP" placeholder="CEP (Digitar somente numeros)" id="CEP">
            </div>
            <div class="text-fill">
                <label for="rua">Rua</label>
                <input type="rua" name="rua" placeholder="Rua" id="rua">
            </div>
            <div class="text-fill">
                <label for="numero">Número</label>
                <input type="text" name="rua" placeholder="Número" id="numero">
            </div>
            <div class="text-fill">
                <label for="complemento">Complemento</label>
                <input type="text" name="complemento" placeholder="Complemento" id="complemento">
            </div>
            <div class="text-fill">
                <label for="bairro">Bairro</label>
                <input type="bairro" name="bairro" placeholder="Bairro" id="bairro">
            </div>
            <div class="text-fill">
                <label for="cidade">Cidade</label>
                <input type="cidade" name="cidade" placeholder="Cidade" id="cidade">
            </div>
            <div class="text-fill">
                <label for="estado">Estado</label>
                <input type="estado" name="estado" placeholder="Estado" id="estado">
            </div>
    </form>
</div>
<button type="submit" id="register-login" class="register-login">Registrar</button>
</p>

</div>
@endauth
@endsection


