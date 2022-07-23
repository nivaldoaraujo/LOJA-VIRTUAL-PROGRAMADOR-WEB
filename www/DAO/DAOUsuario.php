<?php
namespace LOJA\DAO;
use LOJA\Model\Conexao;
use LOJA\Model\Usuario;
class DAOUsuario{

    public function cadastrar(Usuario $usuario){
        $sql = "INSERT INTO usuario 
            VALUES (default, :nome, :senha)";
        
        $con = Conexao::getInstance()->prepare($sql);
        $con->bindValue(":nome", $usuario->getNome());
        $con->bindValue(":senha", $usuario->getSenha());
        $con->execute();

        return "Cadastrado com sucesso";
    }

    public function buscaPorId($id){
        $sql = "SELECT * FROM usuario WHERE pk_usuario = :id";
        $con = Conexao::getInstance()->prepare($sql);
        $con->bindValue(":id", $id);  
        $con->execute();
        
        $usuario = new Usuario();
        $usuario = $con->fetch(PDO::FETCH_ASSOC);
        //print_r($usuario); // testar saída
        return $usuario;

    }

    public function buscaPorNomeSenha(Usuario $usuario){
        $sql = "SELECT 
            pk_usuario as id,
            nome 
            FROM usuario 
            WHERE nome = :nome AND senha = :senha";
        
        $con = Conexao::getInstance()->prepare($sql);
        $con->bindValue(":nome", $usuario->getNome());
        $con->bindValue(":senha", $usuario->getSenha());
        $result = $con->execute();

        $obj = new Usuario();
        $obj = $con->fetch(\PDO::FETCH_ASSOC);

        return $obj;

    }


    public function listaUsuarios(){
       
        $sql = "SELECT * FROM usuario";  
        $con = Conexao::getInstance()->prepare($sql);
        $con->execute();
        
        $lista = array();

        while($usuario = $con->fetch(PDO::FETCH_ASSOC)) {
            $lista[] = $usuario;
        }

        return $lista;

    }
}
?>