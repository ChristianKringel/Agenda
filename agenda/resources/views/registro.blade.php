<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/js/registro.js"></script>
    <title>Registro</title>
</head>

<body>            
        <form action="/autentication" method="POST" name="formLogin" class="formLogin">
    <div class="main-login">
        <div class="login-esquerda">
            <h1>Crie uma nova conta para usar a agenda</h1>
        </div>
        <div class="login-direita">
            <div class="card-login">
                <h1>REGISTRO</h1>
                <meta name="csrf-token" content="{{ csrf_token() }}">
                    @csrf
                    <div class="text-fill">
                        <label for="email">E-mail</label>
                        <input type="text" name="email" placeholder="E-mail" id="email">
                    </div>
                    <div class="text-fill">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" placeholder="Senha" id="senha">
                    </div>
                    <div class="text-fill">
                        <label for="senha">Confirmar Senha</label>
                        <input type="password" name="senha" placeholder="Senha" id="confirmarSenha">
                    </div>
                    <button type="submit" id="register-login" class="register-login">Registrar</button>
                </form>
                <p><span class="conta">Já tem uma conta?</span> <a class="loginLink" href="meu-login">Faça login
                        aqui</a>
                </p>
            </div>
        </div>
    </div>
</body>

</html>