<?php
namespace LOJA\Model;
use LOJA\includes\Config;
class Conexao{

    private function __construct(){
    }
    
    public static function getInstance(){
    
        try {
            $config = new Config();

            $conexao = new \PDO("mysql:host={$config->serverHost}; dbname={$config->serverDB}", "{$config->serverUser}", "{$config->serverPass}");
            $conexao->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $conexao->exec("set names utf8");
            return $conexao;
        } catch (\PDOException $erro) {
            return null;
        }
    }
}
?>