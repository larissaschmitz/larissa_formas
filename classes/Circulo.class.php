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


        public function __toString() {
            $str = parent::__toString();
            $str .="<br> Raio:".$this->getRaio();
            return $str;
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
        
 
        public function desenha(){}
        public function Area(){}
    }
    

    // $tri = new Triangulo(1, 'rosa', 1, 10, 40, 20);
    // // var_dump($tri);
    // print_r($tri);
    // echo "<hr>  " .$tri;
?>