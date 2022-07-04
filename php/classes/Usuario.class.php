<?php
    include_once ("../classes/autoload.php");
    class Usuario extends Database{
        private $idusuario;
        private $nome;
        private $login;
        private $senha;

        //criação do construct
        public function __construct($idusuario,$nome,$login,$senha) {
            $this->setId($idusuario);
            $this->setNome($nome);
            $this->setlogin($login);
            $this->setSenha($senha);
        }

        //Metodos get e set 
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
    
        //Métodos CRUD e listagem
        public function inserir(){
            $sql = "INSERT INTO usuario (nome, login, senha) VALUES (:nome, :login, :senha)";
            $parametros = array(":nome"=> $this->getNome(),
                                ":login"=> $this->getlogin(),
                                ":senha"=> $this->getSenha());

            return parent::executaComando($sql, $parametros);
        }
        
        public function excluir(){
            $sql = "DELETE FROM usuario WHERE idusuario = :idusuario";
            $parametros = array(":idusuario" => $this->getId());
            return parent::executaComando($sql, $parametros);
            
        }
        
        public function editar(){
            $sql = "UPDATE usuario SET nome = :nome, login = :login, senha = :senha WHERE (idusuario = :idusuario);";
            $parametros = array(":nome"=> $this->getNome(),
                                ":login"=> $this->getlogin(),
                                ":senha"=> $this->getSenha(),
                                ":idusuario"=> $this->getId());
            
            return parent::executaComando($sql, $parametros);
        }

        public static function listar($buscar = 0, $procurar = ""){
            $sql = "SELECT * FROM usuario";
            if ($buscar > 0)
                switch($buscar){
                    case(1): $sql .= " WHERE idusuario LIKE :procurar ORDER BY idusuario"; $procurar = "%".$procurar."%";  break;
                    case(2): $sql .= " WHERE nome LIKE :procurar ORDER BY nome"; $procurar = "%".$procurar."%";  break;
                    case(3): $sql .= " WHERE login LIKE :procurar ORDER BY login"; $procurar = "%".$procurar."%";  break;
                    case(4): $sql .= " WHERE senha LIKE :procurar ORDER BY senha"; $procurar = "%".$procurar."%";  break;
                    
                }
            if ($buscar > 0)
                $par = array(':procurar' => $procurar);
            else
                $par = array();
            return parent::buscar($sql, $par);
        }

        
       //Metodos diversos
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