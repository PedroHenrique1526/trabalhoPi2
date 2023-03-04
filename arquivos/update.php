<?php
require_once("conexao/Usuario.php");

$usuario = new Usuario;
$id = $_GET['id'];

$dados = $usuario->select_perfilID($id);

foreach ($dados as $dado) {
    $email = $dado[1];
    $senha = $dado[2];

    $nomecomp = $dado[3];
    $nomes = explode(" ", $nomecomp);
    $nome = $nomes[0];
    $snome = $nomes[1];

    $idade = $dado[4];

    $jogou = $dado[6];

    if ($jogou == "sim") {
        $jogs = "checked";
        $jogn = " ";
    } elseif ($jogou == "nao") {
        $jogn = "checked";
        $jogs = " ";
    };

    $sexoid = $dado[5];

    echo $sexoid;

    $suges = $dado[7];
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Atualizar</title>
</head>

<body>

    <div>
        <form action="update2.php" method="post">
            <fieldset class="campos">
                <legend>Atualizar dados</legend>

                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="text" name="nome" id="" placeholder="Nome" value="<?php echo $nome ?>" required><br>
                <input type="text" name="snome" id="" placeholder="Sobrenome" value="<?php echo $snome ?>" required><br>
                <input type="email" name="email" id="" placeholder="Email" value="<?php echo $email ?>" required><br>
                <input type="password" name="senha" id="" placeholder="Senha" value="<?php echo $senha ?>" required><br>
                <input type="number" name="idade" id="" placeholder="Idade" value="<?php echo $idade ?>" required><br>

                <label for="sexo">Você se identifica<br>

                    <?php
                    $usuario = new Usuario;
                    $sexo = $usuario->select_linhas();
                    foreach ($sexo as $sexo) {
                        $name = $sexo["name"];
                        $idsexo = $sexo["id"];


                        if ($sexoid == $idsexo) {
                            $check = "checked";
                        } else {
                            $check = " ";
                        }
                    ?>
                        <input type="radio" name="sexo" id=<?php echo "'$name'" ?> <?php echo $check; ?> value=<?php echo "'$idsexo'" ?>>
                        <label for=<?php echo "'$idsexo'" ?> value=<?php echo "'$name'" ?>>
                            <?php echo $name ?>
                        </label>
                        <br>
                    <?php } ?>

                    <div style="background-color: #0a1016;">
                        <label for="">Já jogou Valorant?<br>
                            <input type="radio" name="jogou" <?php echo $jogs; ?> value="sim"> Sim
                            <input type="radio" name="jogou" <?php echo $jogn; ?> value="nao"> Não
                        </label><br>
                    </div><br>

                    <label for="suges"> Sugestões para melhor o site:<br>
                        <textarea name="suges" id="sugess" rows="4" cols="33">
                </textarea></label><br>

                    <input type="submit" value="Atualizar">

            </fieldset>
        </form>
    </div>

    <script>
        text = '<?php echo $suges; ?>'
        document.getElementById("sugess").innerHTML = text
    </script>

</body>

</html>