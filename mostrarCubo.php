<!DOCTYPE html>
<?php
    include_once ("classes/autoload.php");
    $title = "Cubo";
    $idcubo = isset($_GET['idcubo']) ? $_GET['idcubo'] : 0;
    $cor = isset($_GET['cor']) ? $_GET['cor'] : "";
    $quadrado_idquadrado = isset($_GET['quadrado_idquadrado']) ? $_GET['quadrado_idquadrado'] : "";
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
                // include_once "classes/Circulo.class.php";
                $cubo = new Cubo($idcubo, $cor, $quadrado_idquadrado, $tabuleiro_idtabuleiro);
                echo $cubo->desenha();
                echo $cubo;
                
                $quad = new Quadrado($idquadrado, $lado, $cor, $tabuleiro_idtabuleiro);
                echo $quad->desenha();
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