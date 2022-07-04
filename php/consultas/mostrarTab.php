<!DOCTYPE html>
<?php
    //inclusão de arquivos
    include_once ("../classes/autoload.php");
    //variaveis
    $idtabuleiro = isset($_GET['idtabuleiro']) ? $_GET['idtabuleiro'] : 0;
    $lado = isset($_GET['lado']) ? $_GET['lado'] : 0;

    $tab = new Tabuleiro($idtabuleiro, $lado);
?>

<html lang="pt-br">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../../img/favicon.ico">
    <title>Mostrar o tabuleiro</title>
    <style>
        <?php
            echo $tab->desenha();
        ?>
    </style>
</head>

<body>  
    <div class="container-fluid">
        <a href='tabuleiro.php'><img src="../../img/back.svg" style="width: 1.8vw;"></a><br><hr>
        <?php
            echo $tab; 
        ?> 
        <hr>
        <center><div class = "tabuleiro"></div></center>
    </div>
</body>
</html>