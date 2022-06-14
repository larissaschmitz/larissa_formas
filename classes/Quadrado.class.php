<?php
    class Quadrado{
        private $id;
        private $lado;
        private $cor;
        private $tabuleiro_idtabuleiro;

        public function __construct($id,$lado,$cor,$tabuleiro_idtabuleiro) {
            $this->setId($id);
            $this->setLado($lado);
            $this->setCor($cor);
            $this->setIdT($tabuleiro_idtabuleiro);
        }
        
        public function getId() {
            return $this->id;
        }
        public function getLado() {
            return $this->lado;
        }
        public function getCor() {
            return $this->cor;
        }
        public function getIdT() {
            return $this->tabuleiro_idtabuleiro;
        }

        public function setLado($lado) {
            if ($lado >  0)
                $this->lado = $lado;
        }
        public function setCor($cor) {
            if (strlen($cor) > 0)    
                $this->cor = $cor;
        }
        public function setId($id) {
                $this->id = $id;
        }
        public function setIdT($tabuleiro_idtabuleiro) {
                $this->tabuleiro_idtabuleiro = $tabuleiro_idtabuleiro;
        }
        
        public function Area() {
            return $this->getLado() * $this->getLado();
        }

        public function Perimetro() {
            return $this->getLado()*4;
        }

        public function Diagonal() {
            return $this->getLado()*sqrt(2);
        }

        // CRUD
        public static function inserir($lado, $cor, $tabuleiro_idtabuleiro){
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('INSERT INTO quadrado (lado, cor, tabuleiro_idtabuleiro) VALUES(:lado, :cor, :tabuleiro_idtabuleiro)');
            $stmt->bindValue(':lado', $lado);
            $stmt->bindValue(':cor', $cor);
            $stmt->bindValue(':tabuleiro_idtabuleiro', $tabuleiro_idtabuleiro);
            return $stmt->execute();
        }

        public static function excluir($id){
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('DELETE FROM quadrado WHERE idquadrado = :idquadrado');
            $stmt->bindValue(':idquadrado', $id);
            return $stmt->execute();
        }
        

        public static function editar($idquadrado, $lado, $cor, $tabuleiro_idtabuleiro) {
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare("UPDATE quadrado SET lado = :lado, cor = :cor, tabuleiro_idtabuleiro = :tabuleiro_idtabuleiro WHERE (idquadrado = :idquadrado);");
            $stmt->bindValue(':idquadrado', $idquadrado);
            $stmt->bindValue(':lado', $lado);
            $stmt->bindValue(':cor', $cor);
            $stmt->bindValue(':tabuleiro_idtabuleiro', $tabuleiro_idtabuleiro);
            return $stmt->execute();
        }

        // CONSULTAS
        public static function listar($buscar = 0, $procurar = ""){
            $pdo = Conexao::getInstance();
            $sql = "SELECT * FROM quadrado";
            if ($buscar > 0)
                switch($buscar){
                    case(1): $sql .= " WHERE idquadrado LIKE :procurar ORDER BY idquadrado"; $procurar = $procurar."%";  break;
                    case(2): $sql .= " WHERE quadrado.lado LIKE :procurar ORDER BY lado"; $procurar = $procurar."%"; break;
                    case(3): $sql .= " WHERE cor LIKE :procurar ORDER BY cor"; $procurar = "%".$procurar."%";  break;
                }
            $stmt = $pdo->prepare($sql);
            if ($buscar > 0)
                $stmt->bindValue(':procurar', $procurar, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        }
        
        public function __toString() {
            return  "[Quadrado]<br>Lado: ".$this->getLado()."<br>".
                    "Cor: ".$this->getCor()."<br>".
                    "Area: ".$this->Area()."<br>".
                    "Perimetro: ".$this->Perimetro()."<br>".
                    "Diagonal: ".$this->Diagonal()."<br>".
                    "Tabuleiro: ".$this->getIdT();
        }

        public function desenha() {
            $style = ".quadrado {
            height: ".$this->lado."vw;
            width: ".$this->lado."vw;
            background-color: ".$this->cor.";}";
            return $style;
        }
    }
?>