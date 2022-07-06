<!DOCTYPE html>
<?php
    //inclusão de arquivos
    include_once ("../classes/autoload.php");
    $title = "Esfera";
    $idesfera = isset($_GET['idesfera']) ? $_GET['idesfera'] : 0;
    $cor = isset($_GET['cor']) ? $_GET['cor'] : 0;
    $circulo_idcirculo = isset($_GET['circulo_idcirculo']) ? $_GET['circulo_idcirculo'] : 0;
    $raio = isset($_GET['raio']) ? $_GET['raio'] : 0;
    $tabuleiro_idtabuleiro = isset($_GET['tabuleiro_idtabuleiro']) ? $_GET['tabuleiro_idtabuleiro'] : "";

    $esfera = new Esfera($idesfera, $cor, $circulo_idcirculo, $tabuleiro_idtabuleiro, $raio);
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon">
    <title>Mostrar o Esfera</title>
    <style>
        <?php 
            echo $esfera->desenha();
        ?>
        .rodar {
                animation: rotation 4s infinite linear;
                }

            @keyframes rotation {
                from {
                transform: rotate(0deg);
                }
                to {
                transform: rotate(359deg);
                }
            }
    </style>
   </head>
<body>  
    <div class="container-fluid">
        <a href='esfera.php'><img src="../../img/back.svg" style="width: 1.8vw;"></a><br><hr>
        <?php
            echo $esfera."<br>";
        ?> 
        <div class="rodar"><div class="rodar esfera"></div></div>
    </div>
</body>
</html>