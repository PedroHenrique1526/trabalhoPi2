<?php
session_start();
require_once("conexao/Usuario.php");

$emailSession = $_SESSION["email"];
$usuario = new Usuario;
$dados = $usuario->select_perfil($emailSession);

foreach ($dados as $dado) {
    $email = $dado["email"];
    $nome = $dado["nome"];
    $sexo = $dado["sexo"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="estilo.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div>
        <?php

        echo "Bem vindo, " . $nome;

        ?>
    </div>
    <div>
        <a href="admin.php">Clique aqui para ver usuarios</a><br>
       
    </div>
    <div>
        <a href="sitevava/index.html">Clique aqui para saber mais sobre o Valorant</a>
    </div>


</body>

</html>