<?php
$logado=0;
session_start();
if(isset($_SESSION['idlog'])){
    $logado = 1;
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem vindo!</title>
    <link rel="stylesheet" href="/oficial/css/index.css">
    <link rel="stylesheet" href="/oficial/css/global.css">
</head>

<body>

<?php
if($logado ===1){
    
    echo"<nav>
        <h3 class='l'>L</h3>
        <h3 class='a'>A</h3>
        <h3 class='v'>V</h3>
        <h3 class='v'>.</h3>
        <div class='invi'></div>
        <li><a href='/OFICIAL/index.php'> Inicio </a></li>
        <li><a href='#intro'>Saiba mais </a></li>
        <li><a href='/OFICIAL/index.php?logout'>Logout</a></li>
        <li><a href=''>".$_SESSION['username']."</a></li>
        </nav>";

        if(isset($_GET['logout'])){
            session_destroy();
            header('location:login.php');
        }
}else{
    echo"<nav>
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

    <div class="back">
        <br><br><br><br>
        <section>
            <div class="intro">
                <hr>
                <center>
                    <p>Suas roupas limpas sem sair do sofa!</p>
                </center>
            </div>

            <div class="buttons">

                <a href="./buyset.php">
                    <div class="button-intro">
                        <img src="./img/cleantshirt.png" alt=""><br>
                        Começar
                        <hr>
                        <p>Faça aqui seu pedido de lavagem de roupas!</p>
                    </div>
                </a>

                <a href="#intro">
                    <div class="button-intro">
                        <img src="./img/delivery.png" alt=""><br>
                        Saiba mais
                        <hr>
                        <p>Continue lendo sobre a origem da LAV e como
                            utiliza-la!</p>
                    </div>
                </a>

            </div>
        </section>
    </div>

    <section>

        <hr>

        <div class="box" id="intro">

            <div class="img">
                <img src="./img/house.png" alt="">
            </div>


            <div class="textcamp-intro">
                <h1>O que é LAV?</h1><br>
                <p>LAV não é apenas uma empresa, é a garantia que suas
                    roupas
                    estejam no maior cuidado possivel, permitindo que ela
                    estejam em boas condições sem mesmo voce ter uma maquina
                    de
                    lavar!Facilitando aqueles que nao sabem lavar roupas,
                    nao tem tempo para lavar ou nao possuiem uma maquina de
                    levar e secar roupas!</p>
            </div>
        </div>


        <div class="box" id="idea">

            <div class="textcamp-idea" id="textcamp-idea">
                <h1>Como surgiu?</h1>

                <p>A LAV surgiu como uma ideia principalmente a um trabalho
                    de
                    faculdade e tudo começou com um grupo de jovens
                    sonhadores
                    na qual teve e brilhante ideia de fazer a LAV <br><br> A
                    ideia surgiu quando um dos integrantes, avistou uma
                    lavanderia, na qual voce alugava por algum momento a
                    maquina
                    de lavar, com isso, ele pensou mais para frente e
                    pensou:
                    <br> <br>
                    <center>"Por que nao juntar o delivery, com o
                        serviço
                        de lavagem de roupas?"</center><br> com a ideia em
                    mão,
                    juntou seus amigos para desenvolver esse projeto
                    brilhante!
                </p>
            </div>

            <div class="img">
                <img src="./img/idea.png" alt="">
            </div>
        </div>

    </section>



    <section>
        <hr>

        <div class="tutotext">
            <center>
                <h1>Como usar LAV?</h1>
                <h2>explicando de forma simples!</h2>
            </center>
        </div>
        <div class="tutocamp">

            <div class="card">
                <center><img src="./img/smartphone.png" alt="">
                    <h2>Peça pelo nosso aplicativo</h2>
                </center>
            </div>

            <img src="./img/seta-direita.png" alt="" class="seta">

            <div class="card">
                <center><img src="./img/entrega.png" alt="">
                    <h2>O motoboy busca na sua casa</h2>
                </center>
            </div>

            <img src="./img/seta-direita.png" alt="" class="seta">

            <div class="card">
                <center><img src="./img/brilha.png" alt="">
                    <h2>Nós fazemos nossa magica</h2>
                </center>
            </div>

            <img src="./img/seta-direita.png" alt="" class="seta">


            <div class="card">
                <center><img src="./img/delivery.png" alt="">
                    <h2>E pronto! entregamos até voce!</h2>
                </center>
            </div>
        </div>
        <br><br><br><br>

    </section>



</body>

</html>