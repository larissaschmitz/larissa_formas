<?php
/*
    Super classe Forma que irá definir aquilo que é comum (Classe Pai)
*/
include_once ("classes/autoload.php");

    abstract class Forma extends Database{
        private $id;
        private $cor;
        private $tabuleiro_idtabuleiro;
        // private static $contador = 0;

        public function __construct($id, $cor, $tabuleiro_idtabuleiro) {
            $this->setId($id);
            $this->setCor($cor);
            $this->setIdT($tabuleiro_idtabuleiro);
            // self::$contador = self::$contador + 1;
        }
        
        //Metodos get e set
        public function getId() {
            return $this->id;
        }
        public function getCor() {
            return $this->cor;
        }
        public function getIdT() {
            return $this->tabuleiro_idtabuleiro;
        }

        public function setId($id) {
                $this->id = $id;
        }

        public function setCor($cor) {
                $this->cor = $cor;
        }
        public function setIdT($tabuleiro_idtabuleiro) {
                $this->tabuleiro_idtabuleiro = $tabuleiro_idtabuleiro;
        }

        public function __toString() {
            return  "[Forma]<br>Id: ".$this->getId()."<br>".
                    "Cor: ".$this->getCor()."<br>".
                    "Id Tabulueiro: ".$this->getIdT()."";
                    // "Contador: ".self::$contador;
        }

        public abstract function desenha();
        public abstract function Area();
        public abstract function inserir();
        public abstract function editar();
        public abstract function excluir();
        public abstract static function listar($buscar = 0, $procurar = "");

    }
?>