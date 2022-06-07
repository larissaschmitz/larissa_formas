<!DOCTYPE html>
<?php
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    include_once "acao.php";


    $action = isset($_GET['action']) ? $_GET['action'] : "";
    $title = "Cadastro Usuário";
    $table = "usuario";
    $dados;

    if ($action == 'editar'){
        $id = isset($_GET['idusuario']) ? $_GET['idusuario'] : "";
        if ($id > 0)
            $dados = buscarDados($id, $table);
        }
    $id = isset($_POST['idusuario']) ? $_POST['idusuario'] : "";
    $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
    $login = isset($_POST['login']) ? $_POST['login'] : "";
    $senha = isset($_POST['senha']) ? $_POST['senha'] : "";

    ?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title><?php echo $title ?></title>
   
</head>

<body>
    <?php 
        include_once "menu.php";
        echo "<br>";
    ?>

    <div class="container-fluid">
        <form method="post" action="acao.php">
            Nome: <input name="nome" id="nome" type="text" required="true" placeholder="Digite o nome" value="<?php if ($action == "editar"){echo $dados['nome'];}?>"><br>         
            <br>
            login: <input name="login" id="login" type="text" required="true" placeholder="Digite o login" value="<?php if ($action == "editar"){echo $dados['login'];}?>"><br>         
            <br>
            Senha: <input name="senha" id="senha" type="text" required="true" maxlength="8" placeholder="Digite o senha" value="<?php if ($action == "editar"){echo $dados['senha'];}?>"><br>         
            <br>
            
            <input type="hidden" id="table" name="table" class="table" value="usuario">
            <input type="hidden" name="idusuario" id="" value="<?php if($action == "editar"){echo $dados['idusuario'];}?>">

            <button  type="submit" class="btn btn-outline-dark" name="action" id="action" value="<?php if($action == "editar"){echo "editar";} else {echo "insert";}?>">Enviar</button>
        </form>  
        <hr>
    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
