<?php
    class Tabuleiro{
        private $idtabuleiro;
        private $lado;

        public function __construct($idtabuleiro,$lado) {
            $this->setId($idtabuleiro);
            $this->setLado($lado);
        }
                
        public function getId() {
            return $this->idtabuleiro;
        }
        public function getLado() {
            return $this->lado;
        }
        
        public function setLado($lado) {
            if ($lado >  0)
                $this->lado = $lado;
        }
        public function setId($idtabuleiro) {
                $this->idtabuleiro = $idtabuleiro;
        }
        
        public function Area() {
            return $this->getLado()*$this->getLado();
        }

        public function Perimetro() {
            return $this->getLado()*4;
        }
    
        public function inserir(){
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('INSERT INTO tabuleiro (lado) VALUES(:lado)');
            $stmt->bindValue(':lado', $this->getLado());
            return $stmt->execute();
        }

        public function excluir(){
                $pdo = Conexao::getInstance();
                $stmt = $pdo->prepare('DELETE FROM tabuleiro WHERE idtabuleiro = :idtabuleiro');
                $stmt->bindValue(':idtabuleiro', $this->getId());
                return $stmt->execute();
            }
        
        public function editar() {
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare("UPDATE tabuleiro SET lado = :lado WHERE (idtabuleiro = :idtabuleiro);");
            $stmt->bindValue(':idtabuleiro', $this->getId());
            $stmt->bindValue(':lado', $this->getLado());
            return $stmt->execute();
        }

        public function listar($buscar = 0, $procurar = ""){
            $pdo = Conexao::getInstance();
            $sql = "SELECT * FROM tabuleiro";
            if ($buscar > 0)
                switch($buscar){
                    case(1): $sql .= " WHERE idtabuleiro LIKE :procurar ORDER BY idtabuleiro"; $procurar = $procurar."%";  break;
                    case(2): $sql .= " WHERE lado LIKE :procurar ORDER BY lado"; $procurar = $procurar."%";  break;
                }
            $stmt = $pdo->prepare($sql);
            if ($buscar > 0)
                $stmt->bindValue(':procurar', $procurar, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        }

        public function buscarTab($id){
            require_once("conf/Conexao.php");

            $conexao = Conexao::getInstance();

            $query = 'SELECT * FROM tabuleiro';
            if($id > 0){
                $query .= ' WHERE idtabuleiro = :Id';
                $stmt->bindParam(':Id', $id);
            }
                $stmt = $conexao->prepare($query);
                if($stmt->execute())
                    return $stmt->fetchAll();
        
                return false;
        }

        public function __toString() {
            return  "[Quadrado]<br>Lado: ".$this->getLado()."<br>".
                    "Area: ".$this->Area()."<br>".
                    "Perimetro: ".$this->Perimetro()."<br>";
        }

        public function desenha() {
            $style = ".tabuleiro {
             height: ".$this->lado."vw;
             width: ".$this->lado."vw;
             background-color: #7B68EE;}";
         
             return $style;
     }

    }
    
?>