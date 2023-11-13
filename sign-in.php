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
    <title>Cadastre-se!</title>
    <link rel="stylesheet" href="/OFICIAL/css/sign-in.css">
    <link rel="stylesheet" href="/OFICIAL/css/global.css">

</head>


<body>

 
    <div class="container" id="container">
        <div class="img"><img src="./img/sign-in-img.png" alt="" class="pc-format"> </div>
        <div class="sign-in-camp" id="pt1">

            <h1>Cadastre - se!</h1>
            <p>Participe nesse mundo! Se aventure com nós</p><br><br>
            <form action="login.php" method="POST">
                    <label for="name"> Nome:<br> <input type="text" placeholder="Nome"  id="nome"
                            name="nome" class="usu"></label><br><br>

                    <label for="lastname"> Sobrenome:<br> <input type="text" placeholder="Sobrenome"  id="sobrenome"
                            name="sobrenome" class="usu"></label><br><br>

                    <label for="email">Email: <br> <input type="email" placeholder="Email" id="email" name="email"
                            class="usu"></label><br><br>

                    <label for="cpf">CPF:<br> 
                        <input type="text" placeholder="000.000.000-00" id="cpf" name="cpf" class="usu" maxlength="14">
                    </label>

                    <p>Gênero:</p>
                    <label for="gener-men"> <input type="radio" name="genero" value="masculino" id="genero">
                        Masculino</label><br>
                    <label for="gener-woman"> <input type="radio" name="genero" value="Feminino" id="genero">
                        Feminino</label><br><br>

                    <label for="password"> Senha:<br> <input type="password" placeholder="Senha" rid="senha"
                            name="senha" class="usu"></label><br>
                            
                    <label for="terms"><input type="checkbox" > Eu aceitos os <a href="" class="usu"> termos de
                            serviço.</a></label><br><br>

                    
                            <center>
                                <p>Ja tem conta? Faça o <a href="login.php">Login</a></p>
                            </center>
                    <button type="button" id="confim" onclick="substituir()">Confirmar</button>
                
                </div>

                <div class="location-camp" id="pt2">

                    <h1>Cadastre - se!</h1>
                    <p>Participe nesse mundo! Se aventure com nós</p><br><br>
                        Digite seu CEP: <br>
                        <input type="text" id="cepInput" placeholder="Digite o CEP" class="usu" name="cep"> <button type="button" onclick="buscarCEP()"
                            class="search">Buscar CEP</button><br><p>Rua:</p>
                            <input type="text" id="ruaInput" placeholder="Rua" readonly class="usu" name="nomerua"><br><p>Cidade:</p>
                            <input type="text" id="cidadeInput" placeholder="Cidade" readonly class="usu" name="cidade"><br><p>Bairro:</p>
                            <input type="text" id="bairroInput" placeholder="Bairro" readonly class="usu" name="bairro"><br><p>Estado:</p>
                            <input type="text" id="estadoInput" placeholder="Estado" readonly class="usu" name="estado"><br><p>Complemento:</p>
                            <input type="text" placeholder="Complemento" id="complemento" name="complemento" class="usu" name="complemento"><br><p>Numero:</p>
                        <input type="number" placeholder="numero" required id="numero" name="numero" class="usu"><br><br>
                        

                    <input type="submit" name="grava" ><br><br>
            </form>
            
        </div>

        

        <center>
            <div class="img-phone"><img src="/img/sign-in-img.png" alt="" class="phone-format"> </div>
        </center><br>

        <script src="signin.js"></script>

<?php 
include "conn.php";
if(isset($_POST['grava'])){
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $genero = $_POST['genero'];
    $senha = md5($_POST['senha']);

    $cep = $_POST['cep'];
    $nomerua = $_POST['nomerua'];
    $cidade= $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $estado = $_POST['estado'];
    $complemento = $_POST['complemento'];
    $numero = $_POST['numero'];


    $gravalogin =$conn->prepare('INSERT INTO `usuarios` (`id_usuarios`, `nome`, `sobrenome`,`cpf`, `email`, `genero`, `senha`) VALUES (NULL, :nome, :sobrenome, :cpf, :email, :genero, :senha);');
    $gravaEndereco =$conn->prepare('INSERT INTO `endereco` (`id_endereco`, `cep`, `nomerua`, `cidade`, `bairro`, `estado`, `complemento`, `numero`) VALUES (NULL, :cep, :nomerua, :cidade, :bairro, :estado, :complemento, :numero);');


    $gravalogin -> bindValue(':nome', $nome);
    $gravalogin-> bindValue(':sobrenome', $sobrenome);
    $gravalogin-> bindValue(':cpf', $cpf);
    $gravalogin -> bindValue(':email', $email);
    $gravalogin -> bindValue(':genero', $genero);
    $gravalogin-> bindValue(':senha', $senha);

    $gravaEndereco -> bindValue(':cep', $cep);
    $gravaEndereco -> bindValue(':nomerua', $nomerua);
    $gravaEndereco -> bindValue(':cidade', $cidade);
    $gravaEndereco -> bindValue(':bairro', $bairro);
    $gravaEndereco -> bindValue(':estado', $estado);
    $gravaEndereco -> bindValue(':complemento', $complemento);
    $gravaEndereco -> bindValue(':numero', $numero);

    $gravaEndereco -> execute();
    $gravalogin-> execute();
    
};


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