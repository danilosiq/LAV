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
  
  const cepInput = document.getElementById("cepInput");
  cepInput.addEventListener("input", function() {
    this.value = this.value.replace(/\D/g, "").slice(0, 8);
  });

  function toggleCartaoCadastro() {
    const cartaoCadastro = document.getElementById("cartaoCadastro");
    const formaPagamento = document.querySelector('input[name="formaPagamento"]:checked').value;
  
    if (formaPagamento === "cartao") {
      cartaoCadastro.style.opacity = 1;
      cartaoCadastro.style.pointerEvents = "auto";
    } else {
      cartaoCadastro.style.opacity = 0.5;
      cartaoCadastro.style.pointerEvents = "none";
    }
  }
  
  // Função para detectar a bandeira do cartão
  function detectarBandeira(numeroCartao) {
    const bandeiraCartao = document.getElementById("bandeiraCartao");
    const cardType = creditCardType(numberCartao);
  
    if (cardType && cardType.length > 0) {
      const bandeira = cardType[0].niceType;
      bandeiraCartao.value = bandeira;
    } else {
      bandeiraCartao.value = "";
    }
  }
  
  // Restrição para permitir apenas números nos campos de cartão
  const numeroCartaoInput = document.getElementById("numeroCartao");
  numeroCartaoInput.addEventListener("input", function () {
    this.value = this.value.replace(/\D/g, "");
    detectarBandeira(this.value);
  });
  
  const validadeCartaoInput = document.getElementById("validadeCartao");
  validadeCartaoInput.addEventListener("input", function () {
    this.value = this.value.replace(/\D/g, "");
  });
  
  const cvvCartaoInput = document.getElementById("cvvCartao");
  cvvCartaoInput.addEventListener("input", function () {
    this.value = this.value.replace(/\D/g, "");
  });
  
  
  