<?php
/*
    Super classe Forma que irá definir aquilo que é comum (Classe Pai)
*/
include_once ("classes/autoload.php"); //adiciona a classe autoload

    abstract class Forma extends Database{
        private $id;
        private $cor;
        private $tabuleiro_idtabuleiro;

        //criação do construct
        public function __construct($id, $cor, $tabuleiro_idtabuleiro) {
            $this->setId($id);
            $this->setCor($cor);
            $this->setIdT($tabuleiro_idtabuleiro);
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

        //método toString
        public function __toString() {
            return  "Id: ".$this->getId()."<br>".
                    "Cor: ".$this->getCor()."<br>".
                    "Id Tabulueiro: ".$this->getIdT()."";
        }

        //demais métodos abstract
        public abstract function desenha();
        public abstract function area();
        public abstract function inserir();
        public abstract function editar();
        public abstract function excluir();
        public abstract static function listar($buscar = 0, $procurar = "");

    }
?>