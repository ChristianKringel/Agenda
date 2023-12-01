<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/login.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login Page</title>
</head>

<!-- ========== Pagina de login ========== -->

<body>
    <div class="main-login">
        <div class="login-esquerda">
            <h1>Faça login e comece a cadastrar seus contatos</h1>
        </div>

        <div class="login-direita">
            <form action="/loginController" method="POST">
                @csrf
                <div class="card-login-login">
                    <span id="msgAlertErroLogin"></span>
                    <h1>LOGIN</h1>
                    <div class="text-fill">
                        <label for="email">Email</label>
                        <input type="text" name="email" placeholder="Email" id="email">
                    </div>
                    <div class="text-fill">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" placeholder="Senha" id="senha">
                    </div>
                    <button type="submit" class="button-login" id="button-login">Login</button>
                    <p><span class="conta">Ainda não tem uma conta?</span> <a class="registro"
                            href="/registro">Registre-se aqui</a></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>