<?php
session_start();
require_once("conexao/Usuario.php");

$email = $_POST["email"];
$senha = $_POST["senha"];

$usuario = new Usuario();

$res = $usuario->login($email, $senha);
$_SESSION["email"] = $email;

if ($res) {
  header("Location: perfil.php");
} else {
  echo "<h1> Login errado!! </h1>";
}
