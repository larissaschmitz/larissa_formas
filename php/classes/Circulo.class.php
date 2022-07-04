<?php
    include_once ("../classes/autoload.php");
    class Circulo extends Forma{
        private $raio;
        
        //criação do construct
        public function __construct($id, $raio, $cor, $tabuleiro_idtabuleiro){
            parent::__construct($id, $cor, $tabuleiro_idtabuleiro);
            $this->setRaio($raio);
        }

        //Métodos get e set
        public function getRaio() {
            return $this->raio;
        }

        public function setRaio($raio) {
                $this->raio = $raio;
        }

        //método toString
        public function __toString(){
            $str = parent::__toString();
            $str .= "<br>Raio: ".$this->getRaio().
                    "<br>Diâmetro: ".$this->diametro().
                    "<br>Área: ".$this->area();
            return $str;
        }

        //metodos diversos
        public function diametro(){
            $diametro = $this->raio * 2;
            return $diametro;
        }

        public function area(){
            $area = pi() * $this->raio;
            return $area;
        }


        public function desenha(){
            $style = ".circulo {
                height: ".$this->diametro()."px;
                width: ".$this->diametro()."px;
                border-radius: 50%;
                background: ".$this->getCor().";}";

            // $str = "<div style='display: inline-block; border: 1vh solid black;'></div><br>";
            return $style;
        }
        

        //Métodos CRUD e listagem
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
                    case(3): $sql .= " WHERE cor LIKE :procurar  ORDER BY cor"; $procurar = "%".$procurar."%";  break;
                }
            if ($buscar > 0)
                $par = array(':procurar' => $procurar);
            else
                $par = array();
            return parent::buscar($sql, $par);
        }
    }
?>