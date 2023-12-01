document.addEventListener('DOMContentLoaded', function () {
  // ##############################################
    // Funcoes para preenchimento a partir do cep

  const preencherFormulario = (endereco) => {
    document.getElementById('rua').value = endereco.logradouro;
    document.getElementById('bairro').value = endereco.bairro;
    document.getElementById('cidade').value = endereco.localidade;
    document.getElementById('estado').value = endereco.uf;
  }

  const eNumero = (cep) => /^[0-9]+$/.test(cep);
  const cepValido = (cep) => cep.length == 8 && eNumero(cep);

  const pesquisarCep = async () => {
    const cep = document.getElementById('CEP').value;
    const proxyUrl = 'http://localhost:8080'; // URL do proxy
    const url = `${proxyUrl}/https://viacep.com.br/ws/${cep}/json/`;
    if (cepValido(cep)) {
      const dados = await fetch(url);
      const endereco = await dados.json();

      if (endereco.hasOwnProperty('erro')) {
        alert('CEP não encontrado!');
      } else {
        preencherFormulario(endereco);
      }
    }
    else {
      alert('CEP inválido!');
    }
  }


  document.getElementById('CEP').addEventListener('focusout', pesquisarCep);

  // Funcao do registro do contato
  document.getElementById('register-login').addEventListener('click', function (event) {
    event.preventDefault();
    //document.getElementById('CEP').addEventListener('focusout', pesquisarCep);

    var rua = document.getElementById('rua').value;
    var bairro = document.getElementById('bairro').value;
    var cidade = document.getElementById('cidade').value;
    var estado = document.getElementById('estado').value;
    var cep = document.getElementById('CEP').value;
    var numero = document.getElementById('numero').value;
    var complemento = document.getElementById('complemento').value;
    var nota = document.getElementById('nota').value;

    nome = document.getElementById('nome').value;
    nroCel = document.getElementById('nroCel ').value;
    email = document.getElementById('email').value;
    var token = document.querySelector('meta[name="csrf-token"]').content;
    console.log('Nome:', nome);
    console.log('Número de Celular:', nroCel);
    console.log('Email:', email);
    console.log('Rua:', rua);
    console.log('Bairro:', bairro);
    console.log('Cidade:', cidade);
    console.log('Estado:', estado);
    console.log('CEP:', cep);

    var formData = new FormData();
    formData.append('_token', token);
    formData.append('nome', nome);
    formData.append('nroCel', nroCel);
    formData.append('email', email);
    formData.append('nota', nota);

    formData.append('rua', rua);
    formData.append('bairro', bairro);
    formData.append('cidade', cidade);
    formData.append('estado', estado);
    formData.append('cep', cep);
    formData.append('numero', numero);
    formData.append('complemento', complemento);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/contatos', true);


    xhr.onload = function () {
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
    };

    xhr.send(formData);
  });



});
