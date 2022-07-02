<?php
    require_once "conf/Conexao.php";
    $action = "";
    if(isset($_POST['action'])){$action = $_POST['action'];}else if(isset($_GET['action'])){$action = $_GET['action'];}
    $table = "";
    if(isset($_POST['table'])){$table = $_POST['table'];}else if(isset($_GET['table'])){$table = $_GET['table'];}

    // acao($action, $table);

    // function acao($acao, $table){
    //     include_once ("classes/autoload.php");

    //     if($acao == "insert"){
    //         if($table == "quadrado"){
    //             $quad = new Quadrado("", $_POST['cor'], $_POST['tabuleiro_idtabuleiro'], $_POST['lado'],);
    //             $quad->inserir();
    //             header("location:quadrado.php");
    //         } else if($table == "tabuleiro")  {
    //             $tab = Tabuleiro::inserir($_POST['lado']);
    //             header("location:tabuleiro.php");
    //         } else if($table == "usuario")  {
    //             $user = new Usuario("", $_POST['nome'], $_POST['login'], $_POST['senha']);
    //             $user->inserir();
    //             header("location:usuario.php");
    //         }  else if($table == "triangulo")  {
    //             $tri = new Triangulo("", $_POST['lado1'], $_POST['lado2'], $_POST['lado3'], $_POST['cor'], $_POST['tabuleiro_idtabuleiro']);
    //             $tri->inserir();
    //             header("location:triangulo.php");
    //         } else if($table == "circulo")  {
    //             $cir = new Circulo("", $_POST['raio'], $_POST['cor'], $_POST['tabuleiro_idtabuleiro']);
    //             $cir->inserir();
    //             header("location:circulo.php");
    //         }else if($table == "retangulo")  {
    //             $ret = new Retangulo("", $_POST['base'], $_POST['altura'],$_POST['cor'], $_POST['tabuleiro_idtabuleiro']);
    //             $ret->inserir();
    //             header("location:retangulo.php");
    //         }else if($table == "cubo")  {
    //             $cubo = new Cubo("", $_POST['cor'], $_POST['quadrado_idquadrado'], $_POST['tabuleiro_idtabuleiro']);
    //             $cubo->inserir();
    //             header("location:cubo.php");}
    //     }
        
    //     else if($acao == "excluir"){
    //         if($table == "quadrado"){
    //             $quad = new Quadrado($_GET['idquadrado'], "", "", "");
    //             $quad->excluir();                
    //             header("location:quadrado.php");
    //         } else if($table == "tabuleiro"){
    //             $tab = Tabuleiro::excluir($_GET['idtabuleiro']);
    //             header("location:tabuleiro.php");
    //         } else if($table == "usuario"){
    //             $user = new Usuario($_GET['idusuario'], "", "", "",);
    //             $user->excluir();
    //             header("location:usuario.php");
    //         } else if($table == "triangulo"){
    //             $tri = new Triangulo($_GET['idtriangulo'], "", "","", "","");
    //             $tri->excluir();
    //             header("location:triangulo.php");
    //         } else if($table == "circulo"){
    //             $cir = new Circulo($_GET['idcirculo'], "","","");
    //             $cir->excluir();
    //             header("location:circulo.php");
    //         } else if($table == "retangulo"){
    //             $ret = new Retangulo($_GET['idretangulo'], "","","", "");
    //             $ret->excluir();
    //             header("location:retangulo.php");
    //         }
    //     }
    //         if($acao == "editar"){
    //             if($table == "quadrado"){
    //                 $quad = new Quadrado($_POST['idquadrado'], $_POST['lado'], $_POST['cor'], $_POST['tabuleiro_idtabuleiro']);
    //                 $quad->editar();
    //             header("location:quadrado.php");  
    //         } else if ($table == "tabuleiro"){
    //             $tab = Tabuleiro::editar($_POST['idtabuleiro'], $_POST['lado']);
    //             header("location:tabuleiro.php");
    //         }else if ($table == "usuario"){
    //             $user = new Usuario ($_POST['idusuario'], $_POST['nome'], $_POST['login'], $_POST['senha']);
    //             $user->editar();
    //             header("location:usuario.php");
    //         }else if ($table == "triangulo"){
    //             $tri = new Triangulo($_POST['idtriangulo'], $_POST['lado1'], $_POST['lado2'], $_POST['lado3'], $_POST['cor'], $_POST['tabuleiro_idtabuleiro']);
    //             $tri->editar();
    //             header("location:triangulo.php");
    //         }else if ($table == "circulo"){
    //             $cir = new Circulo($_POST['idcirculo'], $_POST['raio'], $_POST['cor'], $_POST['tabuleiro_idtabuleiro']);
    //             $cir->editar();
    //             header("location:circulo.php");
    //         }else if ($table == "retangulo"){
    //             $cir = new Retangulo($_POST['idretangulo'], $_POST['base'],$_POST['altura'], $_POST['cor'], $_POST['tabuleiro_idtabuleiro']);
    //             $cir->editar();
    //             header("location:retangulo.php");
    //         }
    //     }
    

    // function dados(){
    //     $dados = array();
    //     $dados['idtabuleiro'] = $_POST["idtabuleiro"];
    //     $dados['lado'] = $_POST["lado"];
    //     $dados['cor'] = $_POST["cor"];
    //     $dados['tabuleiro_idtabuleiro'] = $_POST["tabuleiro_idtabuleiro"];
    //     $dados['nome'] = $_POST["nome"];
    //     $dados['login'] = $_POST["login"];
    //     $dados['senha'] = $_POST["senha"];
    //     $dados['idusuario'] = $_POST["idusuario"];
    //     $dados['idtriangulo'] = $_POST["idtriangulo"];
    //     $dados['lado1'] = $_POST["lado1"];
    //     $dados['lado2'] = $_POST["lado2"];
    //     $dados['lado3'] = $_POST["lado3"];
    //     $dados['idcirculo'] = $_POST["idcirculo"];
    //     $dados['raio'] = $_POST["raio"];
    //     $dados['idretangulo'] = $_POST["idretangulo"];
    //     $dados['base'] = $_POST["base"];
    //     $dados['altura'] = $_POST["altura"];
        
    //     return $dados;
    // }

    // function buscarDados($id,$table) {
    //     $pdo = Conexao::getInstance();
    //     $dados = array();
    //     if($table == 'quadrado'){
    //         $consulta = $pdo->query("SELECT * FROM quadrado WHERE idquadrado = $id");
    //         while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    //             $dados['idquadrado'] = $linha['idquadrado'];
    //             $dados['lado'] = $linha['lado'];
    //             $dados['cor'] = $linha['cor'];
    //             $dados['tabuleiro_idtabuleiro'] = $linha['tabuleiro_idtabuleiro'];
    //         }
    //     }  else if($table == 'tabuleiro'){
    //         $consulta = $pdo->query("SELECT * FROM tabuleiro WHERE idtabuleiro = $id");
    //         while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    //             $dados['idtabuleiro'] = $linha['idtabuleiro'];
    //             $dados['lado'] = $linha['lado'];
    //         }
    //     }  else if($table == 'usuario'){
    //         $consulta = $pdo->query("SELECT * FROM usuario WHERE idusuario = $id");
    //         while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    //             $dados['idusuario'] = $linha['idusuario'];
    //             $dados['nome'] = $linha['nome'];
    //             $dados['login'] = $linha['login'];
    //             $dados['senha'] = $linha['senha'];
    //         }     
    //     } else if($table == 'triangulo'){
    //             $consulta = $pdo->query("SELECT * FROM triangulo WHERE idtriangulo = $id");
    //             while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    //                 $dados['idtriangulo'] = $linha['idtriangulo'];
    //                 $dados['lado1'] = $linha['lado1'];
    //                 $dados['lado2'] = $linha['lado2'];
    //                 $dados['lado3'] = $linha['lado3'];   
    //                 $dados['cor'] = $linha['cor'];
    //                 $dados['tabuleiro_idtabuleiro'] = $linha['tabuleiro_idtabuleiro'];
    //         }     
    //     }else if($table == 'circulo'){
    //             $consulta = $pdo->query("SELECT * FROM circulo WHERE idcirculo = $id");
    //             while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    //                 $dados['idcirculo'] = $linha['idcirculo'];
    //                 $dados['raio'] = $linha['raio'];
    //                 $dados['cor'] = $linha['cor'];
    //                 $dados['tabuleiro_idtabuleiro'] = $linha['tabuleiro_idtabuleiro'];
    //         }
    //     }  else if($table == 'retangulo'){
    //         $consulta = $pdo->query("SELECT * FROM retangulo WHERE idretangulo = $id");
    //         while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    //             $dados['idretangulo'] = $linha['idretangulo'];
    //             $dados['base'] = $linha['base'];
    //             $dados['altura'] = $linha['altura'];
    //             $dados['cor'] = $linha['cor'];
    //             $dados['tabuleiro_idtabuleiro'] = $linha['tabuleiro_idtabuleiro'];
    //         }     
    //     }return $dados;
    // }}

    include_once('classes/Tabuleiro.class.php');
    function selection($id, $idSelect){
        $tab = new Tabuleiro("","");
        $lista = $tab->buscarTab($id);
        return option(array('idtabuleiro', 'lado'), $lista, $idSelect);
    }
    
    function selectionQuad($id, $idSelect){
        $quad = new Quadrado("","","","");
        $lista = $quad->buscarQuad($id);
        return option(array('idquadrado', 'lado'), $lista, $idSelect);
    }


    function option($chave, $dados, $id=null){
        $str = "<option value='0'>Selecione uma opção</option>";
        $tab = new Tabuleiro("","");

        foreach($dados as $linha){
            $selected = "";
            if($id == $linha[$chave[0]]){
                $selected = "selected";
            }
            $str .= "<option ".$selected." value='".$linha[$chave[0]]."'>".$linha[$chave[0]]."</option>";
        }
        return $str;

        // function optionQuad($chave, $dados, $id=null){
        //     $str = "<option value='0'>Selecione um tabuleiro</option>";
        //     $quad = new Quadrado("","","","");
    
        //     foreach($dados as $linha){
        //         $selected = "";
        //         if($id == $linha[$chave[0]]){
        //             $selected = "selected";
        //         }
        //         $str .= "<option ".$selected." value='".$linha[$chave[0]]."'>".$linha[$chave[0]]."</option>";
        //     }
        //     return $str;
        //}
    }

?>