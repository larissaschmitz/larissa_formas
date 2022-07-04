<!DOCTYPE html>
<?php
    //inclusão de arquivos
    include_once ("../classes/autoload.php");
    $title = "Círculo";
    $idcirculo = isset($_GET['idcirculo']) ? $_GET['idcirculo'] : 0;
    $raio = isset($_GET['raio']) ? $_GET['raio'] : 0;
    $cor = isset($_GET['cor']) ? $_GET['cor'] : "";
    $tabuleiro_idtabuleiro = isset($_GET['tabuleiro_idtabuleiro']) ? $_GET['tabuleiro_idtabuleiro'] : "";

    $cir = new Circulo($idcirculo, $raio, $cor, $tabuleiro_idtabuleiro);
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../..img/favicon.ico" type="image/x-icon">
    <title>Mostrar o Circulo</title>
    <style>
        <?php
            echo $cir->desenha();
        ?>
    </style>
</head>
<body>  
    <div class="container-fluid">
        <a href='circulo.php'><img src="../../img/back.svg" style="width: 1.8vw;"></a><br><hr>
        <?php
            echo $cir; 
        ?> 
        <hr>
        <center><div class = "circulo"></div></center>
    </div>
</body>
</html>