<!DOCTYPE html>
<?php
    //inclusão de arquivos
    include_once ("../classes/autoload.php");
    $idquadrado = isset($_GET['idquadrado']) ? $_GET['idquadrado'] : 0;
    $cor = isset($_GET['cor']) ? $_GET['cor'] : "";
    $lado = isset($_GET['lado']) ? $_GET['lado'] : 0;
    $tabuleiro_idtabuleiro = isset($_GET['tabuleiro_idtabuleiro']) ? $_GET['tabuleiro_idtabuleiro'] : "";

    $quad = new Quadrado($idquadrado, $lado, $cor, $tabuleiro_idtabuleiro);
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../..img/favicon.ico" type="image/x-icon">
    <title>Mostrar o quadrado</title>
    <style>
        <?php
            echo $quad->desenha();
        ?>
    </style>
</head>
<body>  
    <div class="container-fluid">
        <a href='quadrado.php'><img src="../../img/back.svg" style="width: 1.8vw;"></a><br><hr>
        <?php
            echo $quad; 
        ?> 
        <hr>
        <div class = "quadrado"></div>
    </div>
</body>
</html>