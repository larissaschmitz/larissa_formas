<?php
    include_once ("../classes/autoload.php");
    class Cubo extends Quadrado{
        private $idcubo;
        private $cor;


        public function __construct($idcubo, $cor, $quadrado_idquadrado, $tabuleiro_idtabuleiro, $lado) {
            parent::__construct($quadrado_idquadrado, $lado, "", $tabuleiro_idtabuleiro);
            $this->setIdC($idcubo);
            $this->setCor($cor);
        }
        
        //Metodos get e set
        public function getIdC() {
            return $this->idcubo;
        }
        
        public function setIdC($idcubo) {
                $this->idcubo = $idcubo;
        }
        
        public function getCor() {
            return $this->cor;
        }
        
        public function setCor($cor) {
                $this->cor = $cor;
        }

        //Método toString
        public function __toString() {
            $str = "ID do Quadrado: ".$this->getId().
                    "<br>ID do Cubo: ".$this->getIdC().
                    "<br>Cor: ".$this->getCor().
                    "<br>Lado: ".$this->getLado().
                    "<br>Área do cubo: ".$this->area()."";
            return $str;
        }

        //Métodos diversos
        public function calcRotate(){
            return $this->getLado() / 2;
        }
        
        public function desenha(){
            $str = "<br>
                    <br>
                    <style>                        
                        .face--front {transform: translateZ(".$this->calcRotate()."px);}
                        .face--right {transform: rotateY(90deg) translateZ(".$this->calcRotate()."px);}
                        .face--back {transform: rotateY(180deg) translateZ(".$this->calcRotate()."px);}
                        .face--left {transform: rotateY(-90deg) translateZ(".$this->calcRotate()."px);}
                        .face--top {transform: rotateX(90deg) translateZ(".$this->calcRotate()."px);}
                        .face--bottom {transform: rotateX(-90deg) translateZ(".$this->calcRotate()."px);}
                        @keyframes rotate {
                            from {transform: rotateX(-20deg) rotateY(-10deg);}
                            50% {transform: rotateX(20deg) rotateY(320deg);}
                            to {transform: rotateX(-20deg) rotateY(-20deg);}
                        }
                    </style>
                    <div style='width: ".$this->getLado()."px; height: ".$this->getLado()."px; animation: rotate 5s infinite alternate; transform-style: preserve-3d;' class='cube'>
                        <div style='background-color: ".$this->getCor()."; border: 1px black solid; width: ".$this->getLado()."px; height: ".$this->getLado()."px; position: absolute;' class='face--front'></div>
                        <div style='background-color: ".$this->getCor()."; border: 1px black solid; width: ".$this->getLado()."px; height: ".$this->getLado()."px; position: absolute;' class='face--right'></div>
                        <div style='background-color: ".$this->getCor()."; border: 1px black solid; width: ".$this->getLado()."px; height: ".$this->getLado()."px; position: absolute;' class='face--back'></div>
                        <div style='background-color: ".$this->getCor()."; border: 1px black solid; width: ".$this->getLado()."px; height: ".$this->getLado()."px; position: absolute;' class='face--left'></div>
                        <div style='background-color: ".$this->getCor()."; border: 1px black solid; width: ".$this->getLado()."px; height: ".$this->getLado()."px; position: absolute;' class='face--top'></div>
                        <div style='background-color: ".$this->getCor()."; border: 1px black solid; width: ".$this->getLado()."px; height: ".$this->getLado()."px; position: absolute;' class='face--bottom'></div>
                    </div>";
            return $str;
        }

        public function area() {
            $area = 6 * ($this->getLado() * $this->getLado());
            return $area;
        }

        
        // CRUD
        public function inserir(){ 
            $sql = "INSERT INTO cubo (cor, quadrado_idquadrado, tabuleiro_idtabuleiro) VALUES(:cor, :quadrado_idquadrado, :tabuleiro_idtabuleiro)";
            $parametros = array(":cor"=> $this->getCor(), 
                                ":quadrado_idquadrado"=> $this->getId(), 
                                ":tabuleiro_idtabuleiro"=> $this->getIdT());
           
            return parent::executaComando($sql, $parametros);
        }

        public function excluir(){
            $sql = "DELETE FROM cubo WHERE idcubo = :idcubo";
            $parametros = array(":idcubo" => $this->getIdC());
            return parent::executaComando($sql, $parametros);
        }
        

        public function editar() {
            $sql = "UPDATE cubo SET cor = :cor, quadrado_idquadrado = :quadrado_idquadrado, tabuleiro_idtabuleiro = :tabuleiro_idtabuleiro WHERE (idcubo = :idcubo);";
            $parametros = array(":cor"=> $this->getCor(), 
                                ":quadrado_idquadrado"=> $this->getId(), 
                                ":tabuleiro_idtabuleiro"=> $this->getIdT(),
                                ":idcubo"=> $this->getIdC());

            return parent::executaComando($sql, $parametros);
        }

        public static function listar($buscar = 0, $procurar = ""){
            $sql = "SELECT * FROM quadrado, cubo WHERE quadrado_idquadrado = idquadrado";
            if ($buscar > 0)
                switch($buscar){
                    case(1): $sql .= " && idcubo LIKE :procurar "; $procurar = $procurar."%";  break;
                    case(2): $sql .= " && cubo.cor LIKE :procurar "; $procurar = $procurar."%"; break;
                    case(3): $sql .= " && quadrado_idquadrado LIKE :procurar "; $procurar = "%".$procurar."%";  break;
                }
            if ($buscar > 0)
                $par = array(':procurar' => $procurar);
            else
                $par = array();
            return parent::buscar($sql, $par);
        }
    }

    ?>


