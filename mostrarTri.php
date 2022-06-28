<!DOCTYPE html>
<?php
    include_once ("classes/autoload.php");
    $title = "Triangulo";
    $idtriangulo = isset($_GET['idtriangulo']) ? $_GET['idtriangulo'] : 0;
    $lado1 = isset($_GET['lado1']) ? $_GET['lado1'] : 0;
    $lado2 = isset($_GET['lado2']) ? $_GET['lado2'] : 0;
    $lado3 = isset($_GET['lado3']) ? $_GET['lado3'] : 0;
    $cor = isset($_GET['cor']) ? $_GET['cor'] : "";
    $tabuleiro_idtabuleiro = isset($_GET['tabuleiro_idtabuleiro']) ? $_GET['tabuleiro_idtabuleiro'] : "";
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=3.0">
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
                $tri = new Triangulo($idtriangulo, $lado1, $lado2, $lado3, $cor, $tabuleiro_idtabuleiro);
                echo $tri->desenha();
                echo $tri;
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