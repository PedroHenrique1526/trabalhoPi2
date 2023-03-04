<?php
require_once("conexao/Usuario.php");

$usuario = new Usuario;
$usuarios = $usuario->exibirTudo();
$i = 0;
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Document</title>
</head>

<body>
    <div>
        <table border="2">
            <tr>
                <td>ID</td>
                <td>Email</td>
                <td>Senha</td>
                <td>Nome</td>
                <td>Idade</td>
                <td>Sexo</td>
                <td>Jogou</td>
                <td>Sugestão</td>
                <td>Deletar</td>
                <td>Atualizar</td>
            </tr>


                <?php
                foreach ($usuarios as $dado) {
                ?>



                    <tr>
                        <td><?php echo $dado[0] ?></td>
                        <td><?php echo $dado[1] ?></td>
                        <td><?php echo $dado[2] ?></td>
                        <td><?php echo $dado[3] ?></td>
                        <td><?php echo $dado[4] ?></td>
                        <td><?php echo $dado[5] ?></td>
                        <td><?php echo $dado[6] ?></td>
                        <td><?php echo $dado[7] ?></td>
                        <td><a href="delete.php?id=<?php echo $dado[0] ?>"> Deletar </a>
                        <td><a href="update.php?id=<?php echo $dado[0] ?>"> Atualizar </a> </td>
                    </tr>
                <?php
                }
                ?>
        </table>
    </div>

</body>

</html>