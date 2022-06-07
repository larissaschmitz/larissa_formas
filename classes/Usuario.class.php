<?php
    class Usuario{
        private $idusuario;
        private $nome;
        private $login;
        private $senha;

        public function __construct($idusuario,$nome,$login,$senha) {
            $this->setId($idusuario);
            $this->setNome($nome);
            $this->setlogin($login);
            $this->setSenha($senha);
        }

                
        public function getId() {
            return $this->idusuario;
        }
        public function getNome() {
            return $this->nome;
        }
        public function getlogin() {
            return $this->login;
        }
        public function getSenha() {
            return $this->senha;
        }
        

        public function setId($idusuario) {
                $this->idusuario = $idusuario;
        }
        public function setNome($nome) {
            if ($nome >  0)
                $this->nome = $nome;
        }
        public function setlogin($login) {
                $this->login = $login;
        }
        public function setSenha($senha) {
                $this->senha = $senha;
        }
    
        
        public function inserir(){
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare('INSERT INTO usuario (nome, login, senha) VALUES(:nome, :login, :senha)');
            $stmt->bindValue(':nome', $this->getNome());
            $stmt->bindValue(':login', $this->getlogin());
            $stmt->bindValue(':senha', $this->getSenha());
            return $stmt->execute();
        }

        
        public function excluir(){
                $pdo = Conexao::getInstance();
                $stmt = $pdo->prepare('DELETE FROM usuario WHERE idusuario = :idusuario');
                $stmt->bindValue(':idusuario', $this->getId());
                
                return $stmt->execute();
            }
        

        public function editar() {
            $pdo = Conexao::getInstance();
            $stmt = $pdo->prepare("UPDATE `quadrado`.`usuario` SET `nome` = :nome, `login` = :login, `senha` = :senha  WHERE (`idusuario` = :idusuario);");
            $stmt->bindValue(':idusuario', $this->getId());
            $stmt->bindValue(':nome', $this->getNome());
            $stmt->bindValue(':login', $this->getlogin());
            $stmt->bindValue(':senha', $this->getSenha());
            return $stmt->execute();
        }

        public function listar($buscar = 0, $procurar = ""){
            $pdo = Conexao::getInstance();
            $sql = "SELECT * FROM usuario";
            if ($buscar > 0)
                switch($buscar){
                    case(1): $sql .= " WHERE idusuario LIKE :procurar ORDER BY idusuario"; $procurar = "%".$procurar."%";  break;
                    case(2): $sql .= " WHERE nome LIKE :procurar ORDER BY nome"; $procurar = "%".$procurar."%";  break;
                    case(3): $sql .= " WHERE login LIKE :procurar ORDER BY login"; $procurar = "%".$procurar."%";  break;
                    case(4): $sql .= " WHERE senha LIKE :procurar ORDER BY senha"; $procurar = "%".$procurar."%";  break;
                    
                }
            $stmt = $pdo->prepare($sql);
            if ($buscar > 0)
                $stmt->bindValue(':procurar', $procurar, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        }

       
        public function efetuarLogin($lg, $sn){
            $pdo = Conexao::getInstance();
            $sql = "SELECT nome FROM usuario WHERE login = '$lg' AND senha = '$sn';";
            $resultado = $pdo->query($sql)->fetchAll();
            if($resultado){
                $_SESSION['nome'] = $resultado[0]['nome'];
                return true;
            } else {
                $_SESSION['nome'] = null;
                return false;
            }
        }
    }
    
?>