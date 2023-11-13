function substituir() {
    var container = document.getElementById("container");
    var containerPay = document.getElementById("container-pay");

    if (container.style.display === "none") {
        container.style.display = "block";
        containerPay.style.display = "none";
    } else {
        container.style.display = "none";
        containerPay.style.display = "block";
    }
}
