<?php
require_once("conexao/Usuario.php");

if (isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['nome']) && isset($_POST['snome']) && isset($_POST['idade']) && isset($_POST['jogou']) && isset($_POST['suges']) && isset($_POST['sexo'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $nome = $_POST["nome"] . ' ' . $_POST['snome'];
    $idade = $_POST['idade'];
    $jogou = $_POST['jogou'];
    $suges = $_POST['suges'];
    $sexo = $_POST['sexo'];

    $nome = trim(preg_replace('/\s+/', ' ', $nome));
    $suges = trim(preg_replace('/\s+/', ' ', $suges));

    $id = $_POST['id'];

    $usuario = new Usuario;

    if (!($usuario->verificarEmailUsuario($email, $id))) {
        if ($usuario->verificarEmail($email)) {
            echo "o email já está em uso!";
        } else {
            $usuario->setarDados($email, $senha, $nome, $idade, $sexo, $jogou, $suges);
            $usuario->atualizar($id);
            header("Location: admin.php");
        }
    } else {
        $usuario->setarDados($email, $senha, $nome, $idade, $sexo, $jogou, $suges);
        $usuario->atualizar($id);
        header("Location: admin.php");
    }
} else {
    header("Location: cadastroerrado.html");
}
