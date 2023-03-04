<?php
require_once("conexao/Usuario.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Cadastro</title>
</head>

<body>
    <div>
        <form action="cadastrarusuario.php" method="post">
            <fieldset class="campos">
                <legend>Cadastrar dados</legend>

                <input type="text" name="nome" id="" placeholder="Nome" required><br>
                <input type="text" name="snome" id="" placeholder="Sobrenome" required><br>
                <input type="email" name="email" id="" placeholder="Email" required><br>
                <input type="password" name="senha" id="" placeholder="Senha" required><br>
                <input type="number" name="idade" id="" placeholder="Idade" required><br>

                <label for="sexo">Você se identifica<br>

                    <?php
                    $usuario = new Usuario;
                    $sexo = $usuario->select_linhas();
                    foreach ($sexo as $sexo) {
                        $name = $sexo["name"];
                        $id = $sexo["id"];
                    ?>
                        <input type="radio" name="sexo" id=<?php echo "'$name'" ?> value=<?php echo "'$id'" ?>>
                        <label for=<?php echo "'$id'" ?> value=<?php echo "'$name'" ?>>
                            <?php echo $name ?>
                        </label>
                        <br>
                    <?php } ?>

                    <div style="background-color: #0a1016;">
                        <label for="">Já jogou Valorant?<br>
                            <input type="radio" name="jogou" value="sim"> Sim
                            <input type="radio" name="jogou" value="nao"> Não
                        </label><br>
                    </div><br>

                    <label for="suges"> Sugestões para melhor o site:<br>
                        <textarea name="suges" rows="4" cols="33">
                </textarea></label><br>

                    <input type="submit" value="Cadastrar">

            </fieldset>
        </form>
    </div>
</body>

</html>