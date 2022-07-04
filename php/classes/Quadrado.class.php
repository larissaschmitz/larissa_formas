<?php
    include_once ("../classes/autoload.php");
    class Quadrado extends Forma{
        private $lado;

        //Criação do construct
        public function __construct($id, $lado, $cor, $tabuleiro_idtabuleiro) {
            parent::__construct($id, $cor, $tabuleiro_idtabuleiro);
            $this->setLado($lado);
        }
        
        //Metodos get e set
        public function getLado() {
            return $this->lado;
        }
        
        public function setLado($lado) {
                $this->lado = $lado;
        }
        
        //método toString
        public function __toString(){
            $str = parent::__toString();
            $str .= "<br>Lado: ".$this->getLado().
                    "<br>Área: ".$this->area().
                    "<br>Perímetro: ".$this->perimetro().
                    "<br>Diagonal: ".round($this->diagonal(),2);
            return $str;
        }
        
        //Metodos diversos
        public function area() {
            return $this->getLado() * $this->getLado();
        }

        public function perimetro() {
            return $this->getLado()*4;
        }

        public function diagonal() {
            return $this->getLado()*sqrt(2);
        }
        
        public function desenha() {
            $style = ".quadrado {
                height: ".$this->getLado()."vw;
                width: ".$this->getLado()."vw;
                background-color: ".$this->getCor().";}";
                return $style;
        }


        // Métodos CRUD  e listagem
        public function inserir(){ 
            $sql = "INSERT INTO quadrado (lado, cor, tabuleiro_idtabuleiro) VALUES(:lado, :cor, :tabuleiro_idtabuleiro)";
            $parametros = array(":lado"=> $this->getLado(), 
                                ":cor"=> $this->getCor(), 
                                ":tabuleiro_idtabuleiro"=> $this->getIdT());
            return parent::executaComando($sql, $parametros);
        }

        public function excluir(){
            $sql = "DELETE FROM quadrado WHERE idquadrado = :idquadrado";
            $parametros = array(":idquadrado" => $this->getId());
            return parent::executaComando($sql, $parametros);
        }

        public function editar() {
            $sql = "UPDATE quadrado SET lado = :lado, cor = :cor, tabuleiro_idtabuleiro = :tabuleiro_idtabuleiro WHERE (idquadrado = :idquadrado);";
            $parametros = array(":lado"=> $this->getLado(), 
                                ":cor"=> $this->getCor(), 
                                ":tabuleiro_idtabuleiro"=> $this->getIdT(),
                                ":idquadrado"=> $this->getId());
            return parent::executaComando($sql, $parametros);
        }


        public static function listar($buscar = 0, $procurar = ""){
            $sql = "SELECT * FROM quadrado";
            if ($buscar > 0)
                switch($buscar){
                    case(1): $sql .= " WHERE idquadrado LIKE :procurar ORDER BY idquadrado"; $procurar = $procurar."%";  break;
                    case(2): $sql .= " WHERE quadrado.lado LIKE :procurar ORDER BY lado"; $procurar = $procurar."%"; break;
                    case(3): $sql .= " WHERE cor LIKE :procurar ORDER BY cor"; $procurar = "%".$procurar."%";  break;
                }
            if ($buscar > 0)
                $par = array(':procurar' => $procurar);
            else
                $par = array();
            return parent::buscar($sql, $par);
        }


        public function buscarQuad($id){
            require_once("../../conf/Conexao.php");

            $conexao = Conexao::getInstance();

            $query = 'SELECT * FROM quadrado';
            if($id > 0){
                $query .= ' WHERE idquadrado = :Id';
                $stmt->bindParam(':Id', $id);
            }
                $stmt = $conexao->prepare($query);
                if($stmt->execute())
                    return $stmt->fetchAll();
        
                return false;
        }

    }

    // $quad = new Quadrado(1, 'rosa', 1, 40);
    // var_dump($ret);
    // print_r($ret);
    // echo "<hr>  " .$quad;
    ?>


