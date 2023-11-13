<?php
$logado = 0;
session_start();
if (isset($_SESSION['idlog'])) {
    $logado = 1;
} else {
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleção</title>
    <link rel="stylesheet" href="/OFICIAL/css/global.css">
    <link rel="stylesheet" href="/OFICIAL/css/aplication.css">
    <link rel="stylesheet" href="/OFICIAL/css/pay.css">
</head>

<body>
    <?php
    if ($logado === 1) {

        echo "<nav>
        <h3 class='l'>L</h3>
        <h3 class='a'>A</h3>
        <h3 class='v'>V</h3>
        <h3 class='v'>.</h3>
        <div class='invi'></div>
        <li><a href='/OFICIAL/index.php'> Inicio </a></li>
        <li><a href='#intro'>Saiba mais </a></li>
        <li><a href='/OFICIAL/index.php?logout'>Logout</a></li>
        <li><a href=''>" . $_SESSION['username'] . "</a></li>
        </nav>";

        if (isset($_GET['logout'])) {
            session_destroy();
            header('location:login.php');
        }
    } else {
        echo "<nav>
    <h3 class='l'>L</h3>
    <h3 class='a'>A</h3>
    <h3 class='v'>V</h3>
    <h3 class='v'>.</h3>
    <div class='invi'></div>
    <li><a href='/OFICIAL/index.php'> Inicio </a></li>
    <li><a href='#intro'>Saiba mais </a></li>
    <li><a href='/OFICIAL/sign-in.php'>Cadastrar-se </a></li>
    <li><a href='/OFICIAL/login.php'>Entrar</a></li>
    </nav>";
    }
    ?>

    <div class="container" id="container">

        <div class="app-camp" id="app-camp">
            
            <form action="index.php" method="POST">
                <div id="products" class="products">
                <h1>Selecione suas peças de roupas</h1><br>
                    <center>
                        <div class="product">
                            <center>
                                <h2>Bermudas</h2>
                                <img src="./img/bermudas.png" alt="">
                                <h2>R$5.75</h2>
                                <input type="number" placeholder="Quantidade" id="qbermuda" name="qbermuda" class="usu"
                                    data-price="5.75">
                            </center>
                        </div>

                        <div class="product">
                            <center>
                                <h2>Calcinhas</h2>
                                <img src="./img/calcinhas.png" alt="">
                                <h2>R$2.15</h2>
                                <input type="number" placeholder="Quantidade" id="qcalcinha" name="qcalcinha"
                                    class="usu" data-price="2.15">
                            </center>
                        </div>

                        <div class="product">
                            <center>
                                <h2>Camisetas - R$6.50</h2>
                                <img src="./img/camiseta-(1).png" alt="">
                                <h2>R$6.50</h2>
                                <input type="number" placeholder="Quantidade" id="qcamiseta" name="qcamiseta"
                                    class="usu" data-price="6.50">
                            </center>
                        </div>

                        <div class="product">
                            <center>
                                <h2>Meias(par)</h2>
                                <img src="./img/meias.png" alt="">
                                <h2>R$0.85</h2>
                                <input type="number" placeholder="Quantidade" id="qmeia" name="qmeia" class="usu"
                                    data-price="0.85">
                            </center>
                        </div>

                        <div class="product">
                            <center>
                                <h2>Casacos</h2>
                                <img src="./img/um-casaco-com-capuz.png" alt="">
                                <h2>R$7.00</h2>
                                <input type="number" placeholder="Quantidade" id="qcasaco" name="qcasaco" class="usu"
                                    data-price="7.00">
                            </center>
                        </div>

                        <div class="product">
                            <center>
                                <h2>Sutiãs</h2>
                                <img src="./img/sutia.png" alt="">
                                <h2>R$3.00</h2>
                                <input type="number" placeholder="Quantidade" id="qsutia" name="qsutia" class="usu"
                                    data-price="3.00">
                            </center>
                        </div>

                        <div class="product">
                            <center>
                                <h2>Cuecas</h2>
                                <img src="./img/cuecas-(1).png" alt="">
                                <h2>R$3.00</h2>
                                <input type="number" placeholder="Quantidade" id="qcueca" name="qcueca" class="usu"
                                    data-price="3.00">
                            </center>
                        </div>

                        <div class="product">
                            <center>
                                <h2>Peças Jeans</h2>
                                <img src="./img/jeans (1).png" alt="">
                                <h2>R$8.00</h2>
                                <input type="number" placeholder="Quantidade" id="qjeans" name="qjeans" class="usu"
                                    data-price="8.00">
                            </center>
                        </div>

                    </center>


                </div>
                

        </div>
        <button type="button" onclick="substituir()" id="butao" class="prox"><img src="./img/seta-direita.png" alt="" class="proxi"></button>

        <div class="container-pay" id="container-pay">

            <div class="s">
                <div class="paycamp">
                    <div class="back">
                        <img src="./img/seta-direita.png" alt="">

                    </div>
                    <h1>Escolha a forma de pagamento</h1>
                    <hr><br>
                    <label>
                        <input type="radio" name="formaPagamento" value="cartao"  onchange="toggleCartaoCadastro()" />
                        Cartão
                    </label>
                    <label>
                        <input type="radio" name="formaPagamento" value="dinheiro" onchange="toggleCartaoCadastro()" />
                        Dinheiro
                    </label>

                    <div id="cartaoCadastro" style="opacity: 0.5; pointer-events: none;">

                        <h3>Cadastro de Cartão</h3>
                        <div>
                            <label for="nomeCartao">Nome no Cartão:</label><br>
                            <input type="text" id="nomeCartao" placeholder="Nome no Cartão" class="rua" />
                        </div>
                        <div>
                            <label for="numeroCartao">Número do Cartão:</label><br>
                            <input type="text" id="numeroCartao" placeholder="Número do Cartão" maxlength="19"
                                class="rua" />
                        </div>
                        <div>
                            <label for="validadeCartao">Validade:</label><br>
                            <input type="text" id="validadeCartao" placeholder="MM/AA" maxlength="5" class="rua" />
                        </div>
                        <div>
                            <label for="cvvCartao">CVV:</label><br>
                            <input type="text" id="cvvCartao" placeholder="CVV" maxlength="4" class="rua" />
                        </div>
                        <div>
                            <label for="bandeiraCartao">Bandeira do Cartão:</label><br>
                            <input type="text" id="bandeiraCartao" readonly class="rua" />
                        </div>
                    </div>

                </div>


            </div>
            <center><input type="submit" name="mandar"></center>
        </div>
        
    </div>
   </form> 
    <?php

    include "conn.php";
    if(isset($_POST['mandar'])){
    $bermuda = floatval($_POST['qbermuda'] ?? 0);
    $calcinha = floatval($_POST['qcalcinha'] ?? 0);
    $camiseta = floatval($_POST['qcamiseta'] ?? 0);
    $meia = floatval($_POST['qmeia'] ?? 0);
    $casaco = floatval($_POST['qcasaco'] ?? 0);
    $sutia = floatval($_POST['qsutia'] ?? 0);
    $cueca = floatval($_POST['qcueca'] ?? 0);
    $jeans = floatval($_POST['qjeans'] ?? 0);

    $forma= ($_POST['formaPagamento']);
    

    $pag = $conn ->prepare ('INSERT INTO `pagamento` (`id_compra`, `id_usuario`, `modo_pagamento`, `preco`) VALUES (NULL, :idusu, :modo, :preco);');

    $mandar = $conn->prepare('INSERT INTO `pedidos` (`id_servico`,`id_usuario`, `bermuda`, `calcinha`, `camiseta`, `meia`, `casaco`, `sutia`, `cueca`, `jeans`, `preco`) VALUES (NULL,:id_usuario, :bermuda, :calcinha, :camiseta, :meia, :casaco, :sutia, :cueca, :jeans, :preco)');

    $totalPreco = ($bermuda * 5.75) + ($calcinha * 2.15) + ($camiseta * 6.50) + ($meia * 0.85) + ($casaco * 7.00) + ($sutia * 3.00) + ($cueca * 3.00) + ($jeans * 8.00);


    $mandar->bindValue(':id_usuario', $_SESSION['idlog']);
    $mandar->bindValue(':bermuda', $bermuda);
    $mandar->bindValue(':calcinha', $calcinha);
    $mandar->bindValue(':camiseta', $camiseta);
    $mandar->bindValue(':meia', $meia);
    $mandar->bindValue(':casaco', $casaco);
    $mandar->bindValue(':sutia', $sutia);
    $mandar->bindValue(':cueca', $cueca);
    $mandar->bindValue(':jeans', $jeans);
    $mandar->bindValue(':preco', $totalPreco);

    $mandar->execute();

    $pag ->bindValue(':idusu', $_SESSION['idlog']);
    $pag ->bindValue(':modo', $forma);
    $pag ->bindValue(':preco', $totalPreco);
    $pag->execute();

    $_SESSION['total'] = $totalPreco;
    }
    ?>


    <script>
        function substituir() {
            var elemento = document.getElementById("app-camp");
            var bot = document.getElementById("butao");
            var novo = document.getElementById("container-pay");
            elemento.style.display = "none";
            bot.style.display = "none";
            novo.style.display = "block";
        };



    </script>
    <script src="aplication.js"></script>
</body>

</html>