<?php
    include_once ("../classes/autoload.php");
    class Triangulo extends Forma{
        private $base;
        private $lado1;
        private $lado2;

        public function __construct($id, $base, $lado1, $lado2, $cor, $tabuleiro_idtabuleiro){
            parent::__construct($id, $cor, $tabuleiro_idtabuleiro);
            $this->setBase($base);
            $this->setLado1($lado1);
            $this->setLado2($lado2);
        }

        //Metodos get e set
        public function getBase() {
            return $this->base;
        }        
        public function getLado1() {
            return $this->lado1;
        }
        public function getLado2() {
            return $this->lado2;
        }
        
        
        public function setBase($base) {
                $this->base = $base;
        }
        public function setLado1($lado1) {
                $this->lado1 = $lado1;
        }
        public function setLado2($lado2) {
                $this->lado2 = $lado2;
        }

       //Método toString
        public function __toString() {
            $str = parent::__toString();
            $str .="<br>Base: ".$this->getBase()."<br>".
                    "Lado 1: ".$this->getLado1()."<br>".
                    "Lado 2: " .$this->getLado2()."<br>".
                    "Altura do triângulo: " .$this->altura()."<br>".
                    "Área do triângulo: " .$this->area()."<br>".
                    "Classificação: ".$this->classe();
            return $str;
        }

        //métodos diversos
        public function classe(){
            if($this->getBase() == $this->getLado1() && $this->getLado2() && $this->getLado1() == $this->getLado2()){
                return "Triângulo equilátero.";
            }else if ($this->getBase() != $this->getLado1() && $this->getLado2() && $this->getLado2() != $this->getLado1()){
                return "Triângulo escaleno";
            } else {
                return "Triângulo isóceles";
            }  
        }

        public function desenha(){
            $str = "<div style='width: 0px; 
            height: 0px; 
            border-left: ".$this->lado1."vh solid transparent; 
            border-right: ".$this->lado2."vh solid transparent;
            border-bottom: ".$this->base."vh solid ".parent::getcor().";'></div><br>";
            return $str;
        }        

        public function altura(){
            $altura = round(sqrt(($this->base+$this->lado1+$this->lado2)*(-$this->base+$this->lado1+$this->lado2))/2,2);
            return $altura;
        }

        public function area() {
            $area = round(sqrt(($this->base+$this->lado1+$this->lado2)*(-$this->base+$this->lado1+$this->lado2)*($this->base-$this->lado1+$this->lado2)*($this->base+$this->lado1-$this->lado2))/4,2);
            return $area;
        }
        
        

        //Métodos CRUD e listagem
        public function inserir(){
            $sql = "INSERT INTO triangulo (base, lado1, lado2, cor, tabuleiro_idtabuleiro) VALUES(:base, :lado1, :lado2, :cor, :tabuleiro_idtabuleiro)";
            $parametros = array(":base"=> $this->getBase(),
                                ":lado1"=> $this->getLado1(),
                                ":lado2"=> $this->getLado2(),
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
            $sql = "UPDATE triangulo SET base = :base, lado1 = :lado1, lado2 = :lado2, cor = :cor, tabuleiro_idtabuleiro = :tabuleiro_idtabuleiro WHERE (idtriangulo = :idtriangulo)";
            $parametros = array(":base"=> $this->getBase(),
                                ":lado1"=> $this->getLado1(),
                                ":lado2"=> $this->getLado2(),
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
                    case(2): $sql .= " WHERE triangulo.base LIKE :procurar ORDER BY base"; $procurar = $procurar."%"; break;
                    case(3): $sql .= " WHERE cor LIKE :procurar ORDER BY cor"; $procurar = "%".$procurar."%";  break;
                }
            if ($buscar > 0)
                $par = array(':procurar' => $procurar);
            else
                $par = array();
            return parent::buscar($sql, $par);
        }
        
    }
?>