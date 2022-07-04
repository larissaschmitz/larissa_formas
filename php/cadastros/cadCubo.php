<!DOCTYPE html>
<?php
    //inclusão de arquivos
    include_once ("../classes/autoload.php");
    require_once "../../conf/Conexao.php";
    include_once "../control/acao.php";
    include_once "../control/utils.php";
    //variaveis
    $action = isset($_GET['action']) ? $_GET['action'] : "";
    $table = "cubo";
    $id = isset($_POST['idcubo']) ? $_POST['idcubo'] : "";
    $cor = isset($_POST['cor']) ? $_POST['cor'] : "";   
    $quadrado_idquadrado = isset($_POST['quadrado_idquadrado']) ? $_POST['quadrado_idquadrado'] : "";
    $tabuleiro_idtabuleiro = isset($_POST['tabuleiro_idtabuleiro']) ? $_POST['tabuleiro_idtabuleiro'] : "";
    if ($action == 'editar'){
        $id = isset($_GET['idcubo']) ? $_GET['idcubo'] : "";
        if ($id > 0){
            $cubo = new Cubo("","","","","");
            $dados = $cubo->listar(1, $id);
        }
    }
    ?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../img\favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Cadastro de quadrados</title>
</head>

<body>
    <?php 
        include_once "../consultas/menu.php";
        echo "<br>";
    ?>
    <div class="container-fluid">
        <form method="post" action="../control/acao.php">
            Cor: <input name="cor" id="cor" type="color" required="true" placeholder="Digite a cor" value="<?php if ($action == "editar"){echo $dados[0]['cor'];}?>"><br>
            <br>
            Quadrado:
                <select name="quadrado_idquadrado"  id="quadrado_idquadrado" class="form-select">
                    <?php
                        require_once ("../control/utils.php");
                        echo selectionQuad(0, $dados[0]['quadrado_idquadrado']);
                    ?>
                </select>
                <br>
            Tabela:
                <select name="tabuleiro_idtabuleiro"  id="tabuleiro_idtabuleiro" class="form-select">
                    <?php
                        require_once ("../control/utils.php");
                        echo selection(0, $dados[0]['tabuleiro_idtabuleiro']);
                    ?>
                </select>
                <br>
                    
            <input type="hidden" id="table" name="table" class="table" value="cubo">
            <input type="hidden" name="idcubo" id="" value="<?php if($action == "editar"){echo $dados[0]['idcubo'];}?>">

            <button  type="submit" class="btn btn-outline-dark" name="action" id="action" value="<?php if($action == "editar"){echo "editar";} else {echo "insert";}?>">Enviar</button>
        </form>  
        <hr>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
