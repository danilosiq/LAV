function substituir(){
    var elemento  = document.getElementById("pt1");
    var novo = document.getElementById("pt2");
    elemento.style.display = "none";
    novo.style.display = "block";
};

  


function buscarCEP() {
    const cepInput = document.getElementById("cepInput");
    const ruaInput = document.getElementById("ruaInput");
    const cidadeInput = document.getElementById("cidadeInput");
    const bairroInput = document.getElementById("bairroInput");
    const estadoInput = document.getElementById("estadoInput");
  
    if (cepInput.value.length === 8) {
      fetch(`https://viacep.com.br/ws/${cepInput.value}/json/`)
        .then(response => response.json())
        .then(data => {
          if (data.erro) {
            ruaInput.value = "";
            cidadeInput.value = "";
            bairroInput.value = "";
            estadoInput.value = "";
            alert("CEP não encontrado");
          } else {
            ruaInput.value = data.logradouro;
            cidadeInput.value = data.localidade;
            bairroInput.value = data.bairro;
            estadoInput.value = data.uf;
          }
        })
        .catch(error => {
          console.log(error);
          alert("Ocorreu um erro na busca do CEP");
        });
    } else {
      ruaInput.value = "";
      cidadeInput.value = "";
      bairroInput.value = "";
      estadoInput.value = "";
      alert("CEP inválido");
    }
  }

