<!DOCTYPE html>
<?php
    $action = "";
    if(isset($_POST['action'])){$action = $_POST['action'];}else if(isset($_GET['action'])){$action = $_GET['action'];}
    $table = "";
    if(isset($_POST['table'])){$table = $_POST['table'];}else if(isset($_GET['table'])){$table = $_GET['table'];}
?>
<html>
<?php
    include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";
    acao($action, $table);

    function acao($acao, $table){
        if($table == "quadrado"){
            include_once('classes/Quadrado.class.php');
        } else if($table == "tabuleiro"){
            include_once('classes/Tabuleiro.class.php');
        } else if($table == "usuario"){
            include_once('classes/Usuario.class.php');
        }
        if($acao == "insert"){
            if($table == "quadrado"){
                $quad = new Quadrado("", $_POST['lado'], $_POST['cor'], $_POST['tabuleiro_idtabuleiro']);
                $quad->inserir();
                header("location:quadrado.php");
            } else if($table == "tabuleiro")  {
                $tab = new Tabuleiro("", $_POST['lado']);
                $tab->inserir();
                header("location:tabuleiro.php");
            } else if($table == "usuario")  {
                $user = new Usuario("", $_POST['nome'], $_POST['login'], $_POST['senha']);
                $user->inserir();
                header("location:usuario.php");
            }
        }
        
        else if($acao == "excluir"){
            if($table == "quadrado"){
                $idquadrado = isset($_POST['idquadrado']) ? $_POST['idquadrado'] : "";
                $quad = new Quadrado($_GET['idquadrado'], "", "", "");
                $quad->excluir();
                header("location:quadrado.php");
            } else if($table == "tabuleiro"){
                $idtabuleiro = isset($_POST['idtabuleiro']) ? $_POST['idtabuleiro'] : "";
                $tab = new Tabuleiro($_GET['idtabuleiro'], "");
                $tab->excluir();
                header("location:tabuleiro.php");
            } else if($table == "usuario"){
                $idusuario = isset($_POST['idusuario']) ? $_POST['idusuario'] : "";
                $user = new Usuario($_GET['idusuario'], "", "", "");
                $user->excluir();
                header("location:usuario.php");
            }
        }
            if($acao == "editar"){
                if($table == "quadrado"){
                $quad = new Quadrado($_POST['idquadrado'], $_POST['lado'], $_POST['cor'], $_POST['tabuleiro_idtabuleiro']);
                $quad->editar();
                header("location:quadrado.php");  
            } else if ($table == "tabuleiro"){
                $tab = new Tabuleiro($_POST['idtabuleiro'], $_POST['lado']);
                $tab->editar();
                header("location:tabuleiro.php");
            }else if ($table == "usuario"){
                $user = new Usuario($_POST['idusuario'], $_POST['nome'], $_POST['login'], $_POST['senha']);
                $user->editar();
                header("location:usuario.php");
            }
        }
    }

    function dados(){
        $dados = array();
        $dados['idtabuleiro'] = $_POST["idtabuleiro"];
        $dados['lado'] = $_POST["lado"];
        $dados['cor'] = $_POST["cor"];
        $dados['tabuleiro_idtabuleiro'] = $_POST["tabuleiro_idtabuleiro"];
        $dados['nome'] = $_POST["nome"];
        $dados['login'] = $_POST["login"];
        $dados['senha'] = $_POST["senha"];
        $dados['idusuario'] = $_POST["idusuario"];
        
        return $dados;
    }

    function buscarDados($id,$table) {
        $pdo = Conexao::getInstance();
        $dados = array();
        if($table == 'quadrado'){
            $consulta = $pdo->query("SELECT * FROM quadrado WHERE idquadrado = $id");
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $dados['idquadrado'] = $linha['idquadrado'];
                $dados['lado'] = $linha['lado'];
                $dados['cor'] = $linha['cor'];
                $dados['tabuleiro_idtabuleiro'] = $linha['tabuleiro_idtabuleiro'];
            }
        }  else if($table == 'tabuleiro'){
            $consulta = $pdo->query("SELECT * FROM tabuleiro WHERE idtabuleiro = $id");
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $dados['idtabuleiro'] = $linha['idtabuleiro'];
                $dados['lado'] = $linha['lado'];
            }
        }  else if($table == 'usuario'){
            $consulta = $pdo->query("SELECT * FROM usuario WHERE idusuario = $id");
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $dados['idusuario'] = $linha['idusuario'];
                $dados['nome'] = $linha['nome'];
                $dados['login'] = $linha['login'];
                $dados['senha'] = $linha['senha'];}     
            }
        return $dados;
    }

    function exibirTab($chave, $dados){
        $str = 0;
        foreach($dados as $linha){
            $str .= "<option value='".$linha[$chave[0]]."'>".$linha[$chave[1]]."</option>";
        }
        return $str;
    }
    include_once('classes/Tabuleiro.class.php');

    function listarTab($id){
        $tab = new Tabuleiro("","");
        $lista = $tab->buscarTab($id);
        return exibirTab(array('idtabuleiro', 'lado'), $lista);
    }
    
?>
</body>
</html>