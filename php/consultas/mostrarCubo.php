<!DOCTYPE html>
<?php
    //inclusão de arquivos
    include_once ("../classes/autoload.php");
    $title = "Cubo";
    $idcubo = isset($_GET['idcubo']) ? $_GET['idcubo'] : 0;
    $cor = isset($_GET['cor']) ? $_GET['cor'] : 0;
    $quadrado_idquadrado = isset($_GET['quadrado_idquadrado']) ? $_GET['quadrado_idquadrado'] : 0;
    $lado2 = isset($_GET['lado2']) ? $_GET['lado2'] : 0;
    $cor = isset($_GET['cor']) ? $_GET['cor'] : "";
    $tabuleiro_idtabuleiro = isset($_GET['tabuleiro_idtabuleiro']) ? $_GET['tabuleiro_idtabuleiro'] : "";

    $cubo = new Cubo($idcubo, $cor, $quadrado_idquadrado, $tabuleiro_idtabuleiro);
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon">
    <title>Mostrar o Cubo</title>
   </head>
<body>  
    <div class="container-fluid">
        <a href='cubo.php'><img src="../../img/back.svg" style="width: 1.8vw;"></a><br><hr>
        <?php
            echo $cubo ."<br>";
            echo $cubo->desenha();

        ?> 
        <hr>
    </div>
</body>
</html>