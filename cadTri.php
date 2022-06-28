<!DOCTYPE html>
<?php
    //inclusão de arquivos
    require_once "conf/Conexao.php";
    include_once "acao.php";
    //variaveis
    $action = isset($_GET['action']) ? $_GET['action'] : "";
    $table = "triangulo";
    $dados;
    $id = isset($_POST['idtriangulo']) ? $_POST['idtriangulo'] : "";
    $lado1 = isset($_POST['lado1']) ? $_POST['lado1'] : 0;
    $lado2 = isset($_POST['lado2']) ? $_POST['lado2'] : 0;
    $lado3 = isset($_POST['lado3']) ? $_POST['lado3'] : 0;
    $cor = isset($_POST['cor']) ? $_POST['cor'] : "";
    $tabuleiro_idtabuleiro = isset($_POST['tabuleiro_idtabuleiro']) ? $_POST['tabuleiro_idtabuleiro'] : "";
    if ($action == 'editar'){
        $id = isset($_GET['idtriangulo']) ? $_GET['idtriangulo'] : "";
        if ($id > 0){
            $dados = buscarDados($id, $table);
        }
    }
    ?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img\favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Cadastro de quadrados</title>
</head>

<body>
    <?php 
        include_once "menu.php";
        echo "<br>";
    ?>
    <div class="container-fluid">
        <form method="post" action="acao.php">
            Lado 1: <input name="lado1" id="lado1" type="number" required="true" placeholder="Digite o lado" value="<?php if ($action == "editar"){echo $dados['lado1'];}?>"><br>         
            Lado 2: <input name="lado2" id="lado2" type="number" required="true" placeholder="Digite o lado" value="<?php if ($action == "editar"){echo $dados['lado2'];}?>"><br>         
            Lado 3: <input name="lado3" id="lado3" type="number" required="true" placeholder="Digite o lado" value="<?php if ($action == "editar"){echo $dados['lado3'];}?>"><br>         
            <br>
            Cor: <input name="cor" id="cor" type="color" required="true" placeholder="Digite a cor" value="<?php if ($action == "editar"){echo $dados['cor'];}?>"><br>
            <br>
            Tabela:
                <select name="tabuleiro_idtabuleiro"  id="tabuleiro_idtabuleiro" class="form-select">
                    <?php
                        require_once ("acao.php");
                        echo selection(0, $dados['tabuleiro_idtabuleiro']);
                    ?>
                </select>
                <br>
                    
            <input type="hidden" id="table" name="table" class="table" value="triangulo">
            <input type="hidden" name="idtriangulo" id="" value="<?php if($action == "editar"){echo $dados['idtriangulo'];}?>">

            <button  type="submit" class="btn btn-outline-dark" name="action" id="action" value="<?php if($action == "editar"){echo "editar";} else {echo "insert";}?>">Enviar</button>
        </form>  
        <hr>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
