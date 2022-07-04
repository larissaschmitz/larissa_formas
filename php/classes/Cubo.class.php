<?php
    include_once ("../classes/autoload.php");
    class Cubo extends Forma{
        private $quadrado_idquadrado;

        public function __construct($id, $cor, $quadrado_idquadrado, $tabuleiro_idtabuleiro) {
            parent::__construct($id, $cor, $tabuleiro_idtabuleiro);
            $this->setIdQ($quadrado_idquadrado);
        }
        
        //Metodos get e set
        public function getIdQ() {
            return $this->quadrado_idquadrado;
        }
        
        public function setIdQ($quadrado_idquadrado) {
            // if ($lado >  0)
                $this->quadrado_idquadrado = $quadrado_idquadrado;
            // else 
            //     throw new Exception("O lado deve ser maior que zero");
        }
        
        // CRUD
        public function inserir(){ 
            $sql = "INSERT INTO cubo (cor, quadrado_idquadrado, tabuleiro_idtabuleiro) VALUES(:cor, :quadrado_idquadrado, :tabuleiro_idtabuleiro)";
            $parametros = array(":cor"=> $this->getCor(), 
                                ":quadrado_idquadrado"=> $this->getIdQ(), 
                                ":tabuleiro_idtabuleiro"=> $this->getIdT());
                                // print_r($parametros);
                                // die();
           
            return parent::executaComando($sql, $parametros);
        }

        public function excluir(){
            $sql = "DELETE FROM cubo WHERE idcubo = :idcubo";
            $parametros = array(":idcubo" => $this->getId());
            return parent::executaComando($sql, $parametros);
        }
        

        public function editar() {
            $sql = "UPDATE cubo SET cor = :cor, quadrado_idquadrado = :quadrado_idquadrado, tabuleiro_idtabuleiro = :tabuleiro_idtabuleiro WHERE (idcubo = :idcubo);";
            $parametros = array(":cor"=> $this->getCor(), 
                                ":quadrado_idquadrado"=> $this->getIdQ(), 
                                ":tabuleiro_idtabuleiro"=> $this->getIdT(),
                                ":idcubo"=> $this->getId());
                                // print_r($parametros);
                                // die();
           
            return parent::executaComando($sql, $parametros);
        }

        public static function listar($buscar = 0, $procurar = ""){
            $sql = "SELECT * FROM cubo";
            if ($buscar > 0)
                switch($buscar){
                    case(1): $sql .= " WHERE idcubo LIKE :procurar "; $procurar = $procurar."%";  break;
                    case(2): $sql .= " WHERE cor LIKE :procurar "; $procurar = $procurar."%"; break;
                    case(3): $sql .= " WHERE quadrado_idquadrado LIKE :procurar "; $procurar = "%".$procurar."%";  break;
                }
            if ($buscar > 0)
                $par = array(':procurar' => $procurar);
            else
                $par = array();
            return parent::buscar($sql, $par);
        }

       
       

        //Metodos diversos
        public function Area() {
            // return $this->getLado() * $this->getLado();
        }
    
        // public function Perimetro() {
        //     return $this->getLado()*4;
        // }
    
        // public function Diagonal() {
        //     return $this->getLado()*sqrt(2);
        // }
    

        public function __toString(){
            $str = parent::__toString();
            $str .= "<br>Lado do quadrado: ";
            return $str;
        }

        public function desenha(){
            // $desenho = "<div style='height: ".$this->getLado()."vw; width: ".$this->getLado()."vw; background-color:".$this->getCor().";'></div>";
            // return $desenho;
        }
    }

    ?>


