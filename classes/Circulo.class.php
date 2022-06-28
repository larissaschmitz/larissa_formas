<?php
    require_once "Forma.class.php";
    class Circulo extends Forma{
        private $raio;
        
        public function __construct($id, $raio, $cor, $tabuleiro_idtabuleiro){
            parent::__construct($id, $cor, $tabuleiro_idtabuleiro);
            $this->setRaio($raio);
        }

        public function getRaio() {
            return $this->raio;
        }

        public function setRaio($raio) {
                $this->raio = $raio;
        }


        public function inserir(){
            $sql = "INSERT INTO circulo (raio, cor, tabuleiro_idtabuleiro) VALUES(:raio, :cor, :tabuleiro_idtabuleiro)";
            $parametros = array(":raio"=> $this->getRaio(),
                                ":cor"=> $this->getCor(),
                                ":tabuleiro_idtabuleiro"=> $this->getIdT());
                
            return parent::executaComando($sql, $parametros);
        }

        public function excluir(){
            $sql = "DELETE FROM circulo WHERE idcirculo = :idcirculo";
            $parametros = array(":idcirculo" => $this->getId());

            return parent::executaComando($sql, $parametros);
        }

        public function editar(){
            $sql = "UPDATE circulo SET raio = :raio, cor = :cor, tabuleiro_idtabuleiro = :tabuleiro_idtabuleiro WHERE (idcirculo = :idcirculo)";
            $parametros = array(":raio"=> $this->getRaio(),
                                ":cor"=> $this->getCor(),
                                ":tabuleiro_idtabuleiro"=> $this->getIdT(),
                                "idcirculo"=> $this->getId());
                    
            return parent::executaComando($sql, $parametros);
        }

        public static function listar($buscar = 0, $procurar = ""){
            $sql = "SELECT * FROM circulo";
            if ($buscar > 0)
                switch($buscar){
                    case(1): $sql .= " WHERE idcirculo LIKE :procurar ORDER BY idcirculo"; $procurar = $procurar."%";  break;
                    case(2): $sql .= " WHERE circulo.raio LIKE :procurar ORDER BY raio"; $procurar = $procurar."%"; break;
                    case(3): $sql .= " WHERE cor LIKE :procurar ORDER BY cor"; $procurar = "%".$procurar."%";  break;
                }
            if ($buscar > 0)
                $par = array(':procurar' => $procurar);
            else
                $par = array();
            return parent::buscar($sql, $par);
        }
        public function __toString(){
            $str = parent::__toString();
            $str .= "<br>Raio: ".$this->getRaio().
            // "<br>Área: ".round($this->Area(),2).
            // "<br>Circunferência: ".round($this->Circunferencia(),2).
            "<br>Diâmetro: ".round($this->Diametro(),2);
            return $str;
        }

        public function diametro(){
            $diametro = 2 * $this->raio;
            return $diametro;
        }
        public function desenha(){
            $str = "<div style='border-radius: 50%; display: inline-block; width: ".$this->diametro()."vw; 
            height: ".$this->diametro()."vw; background: ".$this->getcor().";border: 5px solid".$this->getcor().";'></div><br>";
            return $str;
        }
        public function Area(){}
    }
    
?>