<!DOCTYPE html>
<?php
    //inclusão de arquivos
    require_once "conf/Conexao.php";
    include_once "acao.php";
    //variaveis
    $action = isset($_GET['action']) ? $_GET['action'] : "";
    $table = "retangulo";
    $dados;
    $id = isset($_POST['idretangulo']) ? $_POST['idretangulo'] : "";
    $base = isset($_POST['base']) ? $_POST['base'] : 0;
    $altura = isset($_POST['altura']) ? $_POST['altura'] : 0;
    $cor = isset($_POST['cor']) ? $_POST['cor'] : "";
    $tabuleiro_idtabuleiro = isset($_POST['tabuleiro_idtabuleiro']) ? $_POST['tabuleiro_idtabuleiro'] : "";
    if ($action == 'editar'){
        $id = isset($_GET['idretangulo']) ? $_GET['idretangulo'] : "";
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
            Base: <input name="base" id="base" type="number" required="true" placeholder="Digite o lado" value="<?php if ($action == "editar"){echo $dados['base'];}?>"><br>         
            Altura: <input name="altura" id="altura" type="number" required="true" placeholder="Digite o lado" value="<?php if ($action == "editar"){echo $dados['altura'];}?>"><br>         
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
                    
            <input type="hidden" id="table" name="table" class="table" value="retangulo">
            <input type="hidden" name="idretangulo" id="" value="<?php if($action == "editar"){echo $dados['idretangulo'];}?>">

            <button  type="submit" class="btn btn-outline-dark" name="action" id="action" value="<?php if($action == "editar"){echo "editar";} else {echo "insert";}?>">Enviar</button>
        </form>  
        <hr>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
