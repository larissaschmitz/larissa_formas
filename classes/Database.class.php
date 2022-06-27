<?php
    class Database{
        // CRUD

        public static function iniciaConexao(){
            return Conexao::getInstance();
        }

        public static function vinculaParametros($stmt, $parametros=array()){
            foreach($parametros as $key => $value){
                $stmt->bindValue($key, $value);
                // print_r($stmt);
                // echo "stmt->bindValue($key, $value)";
            }
            // die();
            return $stmt;
        }

        public static function executaComando($sql, $parametros=array()){
            $conexao = self::iniciaConexao();
            $stmt = $conexao->prepare($sql);
            // print_r($parametros);die();
            $stmt = self::vinculaParametros($stmt,$parametros);
            // print_r($stmt);
            // die();
            // print_r($sql);
            // die();

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