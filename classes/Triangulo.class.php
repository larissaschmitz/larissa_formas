<?php
    require_once "Forma.class.php";
    class Triangulo extends Forma{
        private $lado1;
        private $lado2;
        private $lado3;

        public function __construct($id,$lado1, $lado2, $lado3, $cor, $tabuleiro_idtabuleiro){
            parent::__construct($id, $cor, $tabuleiro_idtabuleiro);
            $this->setLado1($lado1);
            $this->setLado2($lado2);
            $this->setLado3($lado3);
        }

        public function getLado1() {
            return $this->lado1;
        }

        public function setLado1($lado1) {
                $this->lado1 = $lado1;
        }

        public function getLado2() {
            return $this->lado2;
        }

        public function setLado2($lado2) {
                $this->lado2 = $lado2;
        }

        public function getLado3() {
            return $this->lado3;
        }

        public function setLado3($lado3) {
                $this->lado3 = $lado3;
        }

        public function __toString() {
            $str = parent::__toString();
            $str .="<br> Lado 1:".$this->getLado1()."<br>".
                "Lado 2:".$this->getLado2()."<br>".
                "Lado 3:" .$this->getLado3();
            return $str;
        }

        public function inserir(){
            $sql = "INSERT INTO triangulo (lado1, lado2, lado3, cor, tabuleiro_idtabuleiro) VALUES(:lado1, :lado2, :lado3, :cor, :tabuleiro_idtabuleiro)";
            $parametros = array(":lado1"=> $this->getLado1(),
                                ":lado2"=> $this->getLado2(),
                                ":lado3"=> $this->getLado3(),
                                ":cor"=> $this->getCor(),
                                ":tabuleiro_idtabuleiro"=> $this->getIdT());
                
            return parent::executaComando($sql, $parametros);
        }

        public function excluir(){
            $sql = "DELETE FROM triangulo WHERE idtriangulo = :idtriangulo";
            $parametros = array(":idtriangulo" => $this->getId());

            return parent::executaComando($sql, $parametros);
        }

        public function editar(){
            $sql = "UPDATE triangulo SET lado1 = :lado1, lado2 = :lado2, lado3 = :lado3, cor = :cor, tabuleiro_idtabuleiro = :tabuleiro_idtabuleiro WHERE (idtriangulo = :idtriangulo)";
            $parametros = array(":lado1"=> $this->getLado1(),
                                ":lado2"=> $this->getLado2(),
                                ":lado3"=> $this->getLado3(),
                                ":cor"=> $this->getCor(),
                                ":tabuleiro_idtabuleiro"=> $this->getIdT(),
                                "idtriangulo"=> $this->getId());

            return parent::executaComando($sql, $parametros);
        }

        public static function listar($buscar = 0, $procurar = ""){
            $sql = "SELECT * FROM triangulo";
            if ($buscar > 0)
                switch($buscar){
                    case(1): $sql .= " WHERE idtriangulo LIKE :procurar ORDER BY idtriangulo"; $procurar = $procurar."%";  break;
                    case(2): $sql .= " WHERE triangulo.lado1 LIKE :procurar ORDER BY lado1"; $procurar = $procurar."%"; break;
                    case(3): $sql .= " WHERE cor LIKE :procurar ORDER BY cor"; $procurar = "%".$procurar."%";  break;
                }
            if ($buscar > 0)
                $par = array(':procurar' => $procurar);
            else
                $par = array();
            return parent::buscar($sql, $par);
        }
        
    //     public static function listar($buscar = 0, $procurar = ""){
    //         $pdo = Conexao::getInstance();
    //         $sql = "SELECT * FROM triangulo";
    //         if ($buscar > 0)
    //             switch($buscar){
    //                 case(1): $sql .= " WHERE idtriangulo LIKE :procurar ORDER BY idtriangulo"; $procurar = $procurar."%";  break;
    //                 case(2): $sql .= " WHERE triangulo.lado1 LIKE :procurar ORDER BY lado1"; $procurar = $procurar."%"; break;
    //                 case(3): $sql .= " WHERE cor LIKE :procurar ORDER BY cor"; $procurar = "%".$procurar."%";  break;
    //             }
    //         $stmt = $pdo->prepare($sql);
    //         if ($buscar > 0)
    //             $stmt->bindValue(':procurar', $procurar, PDO::PARAM_STR);
    //         $stmt->execute();
    //         return $stmt->fetchAll();
    //     }
    }
    

    // $tri = new Triangulo(1, 'rosa', 1, 10, 40, 20);
    // // var_dump($tri);
    // print_r($tri);
    // echo "<hr>  " .$tri;
?>