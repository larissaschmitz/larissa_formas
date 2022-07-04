<!DOCTYPE html>
<?php
    //inclusão de arquivos
    include_once ("../classes/autoload.php");
    $title = "Triangulo";
    $idtriangulo = isset($_GET['idtriangulo']) ? $_GET['idtriangulo'] : 0;
    $base = isset($_GET['base']) ? $_GET['base'] : 0;
    $lado1 = isset($_GET['lado1']) ? $_GET['lado1'] : 0;
    $lado2 = isset($_GET['lado2']) ? $_GET['lado2'] : 0;
    $cor = isset($_GET['cor']) ? $_GET['cor'] : "";
    $tabuleiro_idtabuleiro = isset($_GET['tabuleiro_idtabuleiro']) ? $_GET['tabuleiro_idtabuleiro'] : "";

    $tri = new Triangulo($idtriangulo, $base, $lado1, $lado2, $cor, $tabuleiro_idtabuleiro);
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon">
    <title>Mostrar o triangulo</title>
   </head>
<body>  
    <div class="container-fluid">
        <a href='triangulo.php'><img src="../../img/back.svg" style="width: 1.8vw;"></a><br><hr>
        <?php
            echo $tri ."<br>";
            echo "<center>".$tri->desenha()."</center>";

        ?> 
        <hr>
    </div>
</body>
</html>