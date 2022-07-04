<!DOCTYPE html>
<?php
    //inclusão de arquivos
    include_once ("../classes/autoload.php");
    require_once "../../conf/Conexao.php";
    include_once "../control/acao.php";
    //variaveis
    $action = isset($_GET['action']) ? $_GET['action'] : "";
    $table = "tabuleiro";
    $id = isset($_POST['idtabuleiro']) ? $_POST['idtabuleiro'] : "";
    $lado = isset($_POST['lado']) ? $_POST['lado'] : 0;
    if ($action == 'editar'){
        $id = isset($_GET['idtabuleiro']) ? $_GET['idtabuleiro'] : "";
        if ($id > 0){
            $tab = new Tabuleiro("","");
            $dados = $tab->listar(1, $id);
        }
    }
    ?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../../img/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Cadastro de tabuleiros</title>
</head>

<body>
    <?php 
        include_once "../consultas/menu.php";
        echo "<br>";
    ?>

    <div class="container-fluid">
        <form method="post" action="../control/acao.php">
            Lado: <input name="lado" id="lado" type="number" required="true" placeholder="Digite o lado" value="<?php if ($action == "editar"){echo $dados[0]['lado'];}?>"><br>         
            <br>
            
            <input type="hidden" id="table" name="table" class="table" value="tabuleiro">
            <input type="hidden" name="idtabuleiro" id="" value="<?php if($action == "editar"){echo $dados[0]['idtabuleiro'];}?>">

            <button  type="submit" class="btn btn-outline-dark" name="action" id="action" value="<?php if($action == "editar"){echo "editar";} else {echo "insert";}?>">Enviar</button>
        </form>  
        <hr>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
