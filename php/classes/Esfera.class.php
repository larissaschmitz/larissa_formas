<?php
    include_once ("../classes/autoload.php");
    class Esfera extends Circulo{
        private $idesfera;
        private $cor;


        public function __construct($idesfera, $cor, $circulo_idcirculo, $tabuleiro_idtabuleiro, $raio) {
            parent::__construct($circulo_idcirculo, $raio, $cor, $tabuleiro_idtabuleiro);
            $this->setIdE($idesfera);
            $this->setCor($cor);
        }
        
        //Metodos get e set
        public function getIdE() {
            return $this->idesfera;
        }
        
        public function setIdE($idesfera) {
                $this->idesfera = $idesfera;
        }
        
        public function getCor() {
            return $this->cor;
        }
        
        public function setCor($cor) {
                $this->cor = $cor;
        }

        //Método toString
        public function __toString() {
            $str = "ID do Circulo: ".$this->getId().
                    "<br>ID do Cubo: ".$this->getIdE().
                    "<br>Cor: ".$this->getCor().
                    "<br>Raio: ".$this->getRaio().
                    "<br>Diametro: ".$this->diametro().
                    "<br>Área do cubo: ".$this->area()."";
            return $str;
        }

        //Métodos diversos
        
        
        public function desenha(){
            $str = ".esfera {
                        width: ".$this->diametro()."px;
                        height: ".$this->diametro()."px;
                        background: radial-gradient(at top left, ".$this->getCor()." 20%, black);
                        -ms-border-radius: 150px;
                        -moz-border-radius: 150px;
                        -webkit-border-radius: 150px;
                        -o-border-radius: 150px;
                        border-radius: 150px;
                        margin: 0px auto;
              }";
            return $str;
        }

        public function area() {
            $area = pi() * $this->getRaio();
            return $area;
        }

        
        // CRUD
        public function inserir(){ 
            $sql = "INSERT INTO esfera (cor, circulo_idcirculo, tabuleiro_idtabuleiro) VALUES(:cor, :circulo_idcirculo, :tabuleiro_idtabuleiro)";
            $parametros = array(":cor"=> $this->getCor(), 
                                ":circulo_idcirculo"=> $this->getId(), 
                                ":tabuleiro_idtabuleiro"=> $this->getIdT());
           
            return parent::executaComando($sql, $parametros);
        }

        public function excluir(){
            $sql = "DELETE FROM esfera WHERE idesfera = :idesfera";
            $parametros = array(":idesfera" => $this->getIdE());
            return parent::executaComando($sql, $parametros);
        }
        

        public function editar() {
            $sql = "UPDATE esfera SET cor = :cor, circulo_idcirculo = :circulo_idcirculo, tabuleiro_idtabuleiro = :tabuleiro_idtabuleiro WHERE (idesfera = :idesfera);";
            $parametros = array(":cor"=> $this->getCor(), 
                                ":circulo_idcirculo"=> $this->getId(), 
                                ":tabuleiro_idtabuleiro"=> $this->getIdT(),
                                ":idesfera"=> $this->getIdE());
    
            return parent::executaComando($sql, $parametros);
        }

        public static function listar($buscar = 0, $procurar = ""){
            $sql = "SELECT * FROM circulo, esfera WHERE circulo_idcirculo = idcirculo";
            if ($buscar > 0)
                switch($buscar){
                    case(1): $sql .= " && idesfera LIKE :procurar ORDER BY idesfera"; $procurar = $procurar."%";  break;
                    case(2): $sql .= " && esfera.cor LIKE :procurar ORDER BY esfera.cor"; $procurar = $procurar."%"; break;
                    case(3): $sql .= " && circulo_idcirculo LIKE :procurar ORDER BY circulo_idcirculo"; $procurar = "%".$procurar."%";  break;
                }
            if ($buscar > 0)
                $par = array(':procurar' => $procurar);
            else
                $par = array();
            return parent::buscar($sql, $par);
        }
    }

    ?>


