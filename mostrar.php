<!DOCTYPE html>
<?php
    $title = "Quadrado";
    $idquadrado = isset($_GET['idquadrado']) ? $_GET['idquadrado'] : 0;
    $cor = isset($_GET['cor']) ? $_GET['cor'] : "";
    $lado = isset($_GET['lado']) ? $_GET['lado'] : 0;
    $tabuleiro_idtabuleiro = isset($_GET['tabuleiro_idtabuleiro']) ? $_GET['tabuleiro_idtabuleiro'] : "";
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title><?php echo $title ?></title>
    <style>

    </style>
</head>
<body>
    <br>
    <div class="div">
        <center>
        <br><br><br>
        <?php  
            if ($acao = "salvar") {
                include_once "classes/Quadrado.class.php";
                $quad = new Quadrado($idquadrado, $lado, $cor, $tabuleiro_idtabuleiro);
                echo $quad->desenha();
                echo $quad;
            }
            ?>
            <br>
            <br>
            <a href="showCirc.php"><img src="img/arrow.svg" alt="" class="seta"></a>
            <br><br><br>
        </center>
    </div>
    </fieldset>
    <br>
</body>
</html>