// Arquivo para interações com o registro de um usuário 
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('register-login').addEventListener('click', function (event) {
        event.preventDefault();

        var senha = document.getElementById('senha').value.trim();
        var confirmarSenha = document.getElementById('confirmarSenha').value.trim();

        if (senha !== confirmarSenha) {
            alert('As senhas não coincidem. Tente novamente.');
            return;
        }

        var email = document.getElementById('email').value;
        var token = document.querySelector('meta[name="csrf-token"]').content;

        var formData = new FormData();
        formData.append('_token', token);
        formData.append('email', email);
        formData.append('senha', senha);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/autentication', true);

        xhr.onload = function () {
            if (xhr.status === 200) {
                var resposta = JSON.parse(xhr.responseText);
        
                if (resposta.success) {
                    console.log('Sucesso:', resposta.message);
                    alert(resposta.message);
                    window.location.href = '/contatos/nomes';
                } else {
                    console.error('Erro:', resposta.message);
                    alert(resposta.message);
                }
            } else {
                console.error('Erro na requisição. Código de status:', xhr.status);
                alert('Erro na requisição. Código de status:' + xhr.status);
            }
        };

        
        xhr.send(formData);

    });

    /*
    $(function () {
        $('form[name="formLogin"]').submit(function (event) {
            event.preventDefault();
            $.ajax({
                url: "{{ route('admin.login.do) }} ",
                type: "post",
                data: $(this).serialize(),
                dataType: 'json',
                succes: function (response) {
                    console.log(response);
                }
            });
        });
    });
    */

});