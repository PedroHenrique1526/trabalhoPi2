<?php 
require_once("conexao/Usuario.php");

$id = $_GET['id'];

$usuario = new Usuario;
$usuario->deleteUsuario($id);

header("Location: admin.php");
