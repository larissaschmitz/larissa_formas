<!DOCTYPE html>
<?php
    //inclusão de arquivos
    include_once "classes/Quadrado.class.php";
    //variaveis
    $idquadrado = isset($_GET['idquadrado']) ? $_GET['idquadrado'] : 0;
    $lado = isset($_GET['lado']) ? $_GET['lado'] : 0;
    $cor = isset($_GET['cor']) ? $_GET['cor'] : "";
    $tabuleiro_idtabuleiro = isset($_GET['tabuleiro_idtabuleiro']) ? $_GET['tabuleiro_idtabuleiro'] : 0;    
    
    $quad = new Quadrado("", $lado, $cor, $tabuleiro_idtabuleiro);
?>

<html lang="pt-br">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img\favicon.ico">
    <title>Quadrado</title>
    <style>
        <?php 
            echo $quad->desenha();
        ?>
    </style>
</head>

<body>  
    <div class="container-fluid">
        <a href='quadrado.php'><img src="img/back.svg" style="width: 1.8vw;"></a><br><hr>
        <?php
            echo $quad; 
        ?>  
        <hr>
        <div class = "quadrado"></div>
    </div>
</body>
</html>