var selectedProductsCount = {};
var productPrices = {
  "Bermudas - R$5.75": 5.75,
  "Calcinhas - R$2.15": 2.15,
  "Camisetas - R$6.50": 6.50,
  "Meias(par) - R$0.85": 0.85,
  "Casacos - R$7.00": 7.00,
  "Sutiãs - R$3.00": 3.00,
  "Cuecas - R$3.00": 3.00,
  "Peças Jeans - R$8.00": 8.00,

};

function selectProduct(product) {
  var productName = product.querySelector("h2").innerText;

  if (selectedProductsCount[productName]) {
    selectedProductsCount[productName]++;
  } else {
    selectedProductsCount[productName] = 1;
  }

  updateSelectedProducts();
  updateTotalPrice();
}

function removeProduct(productName) {
  if (selectedProductsCount[productName]) {
    delete selectedProductsCount[productName];
    updateSelectedProducts();
    updateTotalPrice();
  }
}

function updateSelectedProducts() {
  var selectedProductsDiv = document.getElementById("selectedProducts");
  selectedProductsDiv.innerHTML = "";

  for (var productName in selectedProductsCount) {
    var productCount = selectedProductsCount[productName];
    var selectedProductDiv = document.createElement("div");
    selectedProductDiv.className = "selected-product";

    var productInfoDiv = document.createElement("div");

    var productNameSpan = document.createElement("span");
    productNameSpan.innerText = productName;

    var decreaseButton = document.createElement("button");
    decreaseButton.innerText = "-";
    decreaseButton.className = "bt";
    decreaseButton.onclick = decreaseProductCount.bind(null, productName);

    var productCountSpan = document.createElement("span");
    productCountSpan.innerText = productCount;

    var increaseButton = document.createElement("button");
    increaseButton.innerText = "+";
    increaseButton.className = "bt";
    increaseButton.onclick = increaseProductCount.bind(null, productName);

    var removeButton = document.createElement("button");
    removeButton.innerText = "Remover";
    removeButton.className = "remove";
    removeButton.onclick = removeProduct.bind(null, productName);

    productInfoDiv.appendChild(productNameSpan);
    productInfoDiv.appendChild(decreaseButton);
    productInfoDiv.appendChild(productCountSpan);
    productInfoDiv.appendChild(increaseButton);

    selectedProductDiv.appendChild(productInfoDiv);
    selectedProductDiv.appendChild(removeButton);

    selectedProductsDiv.appendChild(selectedProductDiv);
  }
}

function decreaseProductCount(productName) {
  if (selectedProductsCount[productName] > 1) {
    selectedProductsCount[productName]--;
    updateSelectedProducts();
    updateTotalPrice();
  }
}

function increaseProductCount(productName) {
  selectedProductsCount[productName]++;
  updateSelectedProducts();
  updateTotalPrice();
}

function updateTotalPrice() {
  var totalPrice = 0;

  for (var productName in selectedProductsCount) {
    var productCount = selectedProductsCount[productName];
    var productPrice = productPrices[productName];
    totalPrice += productPrice * productCount;
  }

  var totalPriceElement = document.getElementById("totalPrice");
  totalPriceElement.innerText = "Total: R$ " + totalPrice.toFixed(2);
  totalPriceElement.classList.add("total-price");

}