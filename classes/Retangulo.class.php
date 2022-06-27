<?php
    require_once "Forma.class.php";
    class Retangulo extends Forma{
        private $altura;
        private $base;

        public function __construct($id, $cor, $tabuleiro_idtabuleiro, $altura, $base){
            parent::__construct($id, $cor, $tabuleiro_idtabuleiro);
            $this->setAltura($altura);
            $this->setBase($base);
        }

        public function getAltura() {
            return $this->altura;
        }

        public function setAltura($altura) {
                $this->altura = $altura;
        }
        public function getBase() {
            return $this->base;
        }

        public function setBase($base) {
                $this->base = $base;
        }

        public function __toString() {
            $str = parent::__toString();
            $str .="<br> Atura:".$this->getAltura()."<br>".
                    "Base:" .$this->getBase();
            return $str;
        }
    }

    $ret = new Retangulo(1, 'rosa', 1, 10, 40);
    // var_dump($ret);
    print_r($ret);
    echo "<hr>  " .$ret;
?>