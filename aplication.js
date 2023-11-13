

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


