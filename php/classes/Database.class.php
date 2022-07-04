<?php
    class Database{
        // CRUD
        public static function iniciaConexao(){
            return Conexao::getInstance();
        }

        public static function vinculaParametros($stmt, $parametros=array()){
            foreach($parametros as $key => $value){
                $stmt->bindValue($key, $value);
            }
            return $stmt;
        }

        public static function executaComando($sql, $parametros=array()){
            $conexao = self::iniciaConexao();
            $stmt = $conexao->prepare($sql);
            $stmt = self::vinculaParametros($stmt,$parametros);
            try{
                return $stmt->execute();
            } catch (Exception $e){
                throw new Exception('Erro na execução:'.$e);
            }
            
            return $stmt->execute();
        }

        public static function buscar($sql, $parametros = array()){
            $conexao = self::iniciaConexao();
            $stmt = $conexao->prepare($sql);
            $stmt = self::vinculaParametros($stmt, $parametros);
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }
?>