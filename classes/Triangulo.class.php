<?php
    include_once ("classes/autoload.php");
    class Triangulo extends Forma{
        private $lado1;
        private $lado2;
        private $lado3;

        public function __construct($id,$lado1, $lado2, $lado3, $cor, $tabuleiro_idtabuleiro){
            parent::__construct($id, $cor, $tabuleiro_idtabuleiro);
            $this->setlado1($lado1);
            $this->setLado2($lado2);
            $this->setLado3($lado3);
        }

        public function getlado1() {
            return $this->lado1;
        }

        public function setlado1($lado1) {
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
            $str .="<br> Lado 1:".$this->getlado1()."<br>".
                "Lado 2:".$this->getLado2()."<br>".
                "Lado 3:" .$this->getLado3()."<br>".
                "<br>Classificação:".$this->Tipo();

            return $str;
        }

        public function inserir(){
            $sql = "INSERT INTO triangulo (lado1, lado2, lado3, cor, tabuleiro_idtabuleiro) VALUES(:lado1, :lado2, :lado3, :cor, :tabuleiro_idtabuleiro)";
            $parametros = array(":lado1"=> $this->getlado1(),
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
            $parametros = array(":lado1"=> $this->getlado1(),
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
        
  public function Tipo(){
            if ($this->getlado1() == $this->getlado1() && $this->getlado1() == $this->getLado2()) {
                return "Equilátero";
            }
            elseif ($this->getlado1() != $this->getlado1() && $this->getlado1() != $this->getLado2() 
            && $this->getlado1() != $this->getLado2()) {
                return "Escaleno";
            }
            else{
                return "Isóceles";
            }
        }
        public function desenha(){
            $str = "<div style='width: 0px; height: 0px; border-left: ".$this->lado3."vw solid transparent; border-right: "
            .$this->lado2."vw solid transparent; border-bottom: ".$this->lado1."vw solid ".parent::getCor().";'></div><br>";
            return $str;
        }        public function Area(){}
    }
    

    // $tri = new Triangulo(1, 'rosa', 1, 10, 40, 20);
    // // var_dump($tri);
    // print_r($tri);
    // echo "<hr>  " .$tri;
?>