<?php
$logado=0;
session_start();
if(isset($_SESSION['idlog'])){
    $logado = 1;
    header('location:index.php');
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="/OFICIAL/css/global.css">
    <link rel="stylesheet" href="/OFICIAL/css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="login.js"></script>
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
    <div class="container">
        <div class="login-camp">
            <form action="" method="post"></form>
            <h1>Login</h1>
            <p>Entre nesse universo</p><br><br>
            <form action="" method="post">
            <label for="cpf">CPF:<br> 
                    <input type="text" placeholder="000.000.000-00" id="cpf" name="cpf" class="usu" maxlength="14">
                </label><br><br>

                <label for="password">Senha: <br><input type="password" placeholder="Senha" id="password" name="senha"
                        required></label><br><br>


                <input type="submit" name="validar"><br><br>
                
            </form>


            <center>
                <p>Não tem conta? Faça o <a href="/sign-in.php">cadastro</a></p>
            </center>
        </div>
        <div class="img"><img src="/oficial/img/login-img.png" alt=""></div>


<?php
include "conn.php";


if(isset($_POST['validar'])){
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    $ver = $conn -> prepare('SELECT * FROM `usuarios` WHERE `cpf` = :cpf AND `senha` = md5(:senha)');
    $ver -> bindValue(":cpf", $cpf);
    $ver -> bindValue(":senha", $senha);
    $ver -> execute();
    if($ver->rowCount() === 0){
        echo '<script type="text/javascript">';
        echo 'alert("Cpf ou senha invalidos");';
        echo '</script>';
    }else{
        session_start();
        $row = $ver -> fetch();
        $id_login = $row['id_usuarios'];
        $username = $row['nome'];
        $_SESSION['idlog'] = $id_login;
        $_SESSION['username'] = $username;
        header('location:index.php');
      
    }
}



?>

<script>

document.getElementById('cpf').addEventListener('input', function (e) {
    let value = e.target.value.replace(/\D/g, '');
    if (value.length <= 3) {
        value = value.replace(/(\d{1,3})/, '$1');
    } else if (value.length <= 6) {
        value = value.replace(/(\d{3})(\d{1,3})/, '$1.$2');
    } else if (value.length <= 9) {
        value = value.replace(/(\d{3})(\d{3})(\d{1,3})/, '$1.$2.$3');
    } else {
        value = value.replace(/(\d{3})(\d{3})(\d{3})(\d{1,2})/, '$1.$2.$3-$4');
    }
    e.target.value = value;
});

</script>
</body>

</html>