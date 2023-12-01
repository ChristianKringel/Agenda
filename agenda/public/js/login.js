document.addEventListener('DOMContentLoaded', function () {
    var buttonLogin = document.getElementById('button-login');

    buttonLogin.addEventListener('click', function (event) {
        event.preventDefault();
        var email = document.getElementById('email').value;
        var senha = document.getElementById('senha').value;
        if (email === '' || senha === '') {
            alert('Por favor, preencha todos os campos.');
            return;
        }
        var xhr = new XMLHttpRequest();
        var formData = new FormData();
        var token = document.querySelector('meta[name="csrf-token"]').content;

        formData.append('_token', token);
        formData.append('email', email);
        formData.append('senha', senha);

        xhr.open('POST', '/loginController', true);
        //xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function () {
            console.log('Resposta completa do servidor:', xhr.responseText);

            try {
                if (xhr.status === 200) {
                    var resposta = JSON.parse(xhr.responseText);

                    if (resposta.success) {
                        console.log('Sucesso:', resposta.message);
                        alert(resposta.message);
                        window.location.href = '/';
                    } else {
                        console.error('Erro:', resposta.message);
                        alert(resposta.message);
                    }
                } else {
                    console.error('Erro na requisição. Código de status:', xhr.status);
                    alert('Erro na requisição. Código de status:' + xhr.status);
                }
            } catch (error) {
                console.error('Erro ao fazer o parse da resposta JSON:', error);
                alert('Erro ao processar a resposta do servidor.');
            }
        };

        xhr.send(formData);
    })
});