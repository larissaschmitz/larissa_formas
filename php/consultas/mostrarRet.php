<!DOCTYPE html>
<?php
    //inclusão de arquivos
    include_once ("../classes/autoload.php");
    $idretangulo = isset($_GET['idretangulo']) ? $_GET['idretangulo'] : 0;
    $base = isset($_GET['base']) ? $_GET['base'] : 0;
    $altura = isset($_GET['altura']) ? $_GET['altura'] : 0;
    $cor = isset($_GET['cor']) ? $_GET['cor'] : "";
    $tabuleiro_idtabuleiro = isset($_GET['tabuleiro_idtabuleiro']) ? $_GET['tabuleiro_idtabuleiro'] : "";

    $ret = new Retangulo($idretangulo, $base, $altura, $cor, $tabuleiro_idtabuleiro);
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../..img/favicon.ico" type="image/x-icon">
    <title>Mostrar o retângulo</title>
    <style>
        <?php
            echo $ret->desenha();
        ?>
    </style>
</head>
<body>  
    <div class="container-fluid">
        <a href='retangulo.php'><img src="../../img/back.svg" style="width: 1.8vw;"></a><br><hr>
        <?php
            echo $ret; 
        ?> 
        <hr>
        <div class = "retangulo"></div>
    </div>
</body>
</html>