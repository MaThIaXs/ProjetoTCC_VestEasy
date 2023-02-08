const INPUT_CIDADE = document.querySelector('#cidade');
const INPUT_ESTADO = document.querySelector('#estado');
const INPUT_LOGRADOURO= document.querySelector('#endereco');
const btnVerificarCEP = document.querySelector('#VerificarCEP');
const campoCEP = document.querySelector('#cep');

const buscarCEP = (cep) => {
  let check = false;
  if (cep.length < 8) return;
  let url = 'https://viacep.com.br/ws/${cep}/json/'.replace('${cep}', cep);
  fetch(url)
    .then((res) => {
    if (res.ok) {
      res.json().then((json) => {
        if (!json.erro) {
          let logradouro = json.logradouro;
          let cidade = json.localidade;
          let estado = json.uf;
          // Preenche os campos
          INPUT_LOGRADOURO.value = logradouro;
          INPUT_CIDADE.value = cidade;
          INPUT_ESTADO.value = estado;
        } else {
            alert("CEP Inválido!");
        }
      });
    } else {
        alert("Erro na resposta!");
    }
  });
}

// Adiciona o evento click
btnVerificarCEP.addEventListener('click', function(e) {  
  buscarCEP(campoCEP.value);
});