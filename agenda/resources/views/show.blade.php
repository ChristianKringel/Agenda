@extends('novoMenu')

@section('title', 'Resultados da Busca')

<!-- ========== Pagina que mostra os detalhes dos contatos ========== -->
    @section('content')
    @guest
    <a href="registro" class="precisaLogar">Você precisa estar logado</a>
    @endif
    <link rel="stylesheet" href="/css/styleDetalhes.css">
    <div class="detalhes-container">
        <div class="detalhes-contato">
            <h1>Detalhes do Contato:</h1>

            <div class="detalhe">
                <strong>Nome:</strong> {{ $contato->nome }}
            </div>

            <div class="detalhe">
                <strong>E-mail:</strong> {{ $contato->email }}
            </div>

            <div class="detalhe">
                <strong>Número de Celular:</strong> {{ $contato->nroCel }}
            </div>

            <div class="detalhe">
                <strong>Nota:</strong> {{ $contato->nota }}
            </div>

            <div class="endereco">
                <h2>Endereço:</h2>

                <div class="detalhe">
                    <strong>CEP:</strong> {{ $contato->endereco->cep }}
                </div>

                <div class="detalhe">
                    <strong>Rua:</strong> {{ $contato->endereco->rua }}
                </div>
                <div class="detalhe">
                    <strong>Numero:</strong> {{ $contato->endereco->numero }}
                </div>
                <div class="detalhe">
                    <strong>Complemento:</strong> {{ $contato->endereco->complemento }}
                </div>

                <div class="detalhe">
                    <strong>Bairro:</strong> {{ $contato->endereco->bairro }}
                </div>

                <div class="detalhe">
                    <strong>Cidade:</strong> {{ $contato->endereco->cidade }}
                </div>

                <div class="detalhe">
                    <strong>Estado:</strong> {{ $contato->endereco->estado }}
                </div>

            </div>
        </div>
    </div>
</body>
@endsection


</html>