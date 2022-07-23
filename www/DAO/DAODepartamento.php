<?php
namespace LOJA\DAO;
use LOJA\Model\Conexao;
use LOJA\Model\Departamento;

class DAODepartamento{

    public $lastId;

    public function cadastrar(Departamento $departamento){
        $pdo = Conexao::getInstance(); // Cria objeto de conexão
        $pdo->beginTransaction(); // Inicia a transação

        try{
            $con = $pdo->prepare(
                "INSERT INTO departamento VALUES (default, :nome)"
            );
        
        $con->bindValue(":nome", $departamento->getNome());
        $con->execute();

        $this->lastId = $pdo->lastInsertId(); // Retorna o id do cliente cadastrado
        $pdo->commit(); // Finaliza a transação
        return "Cadastrado com sucesso";

        }catch(Exception $e){
            $this->lastId = 0;
            $pdo->rollback();
            return "Erro ao cadastrar";
        }
    }

    public function listaDepartamentos(){
       
        $sql = "SELECT * FROM departamento";  
        $con = Conexao::getInstance()->prepare($sql);
        $con->execute();
        
        $lista = array();
        while($departamento = $con->fetch(\PDO::FETCH_ASSOC)) {
            $lista[] = $departamento;
        }
        return $lista;
 
    }

    public function buscaPorId($id){
        $sql = "SELECT * FROM departamento WHERE pk_departamento = :id";
        $con = Conexao::getInstance()->prepare($sql);
        $con->bindValue(":id", $id);  
        $con->execute();
        
        $departamento = new Departamento();
        $departamento = $con->fetch(\PDO::FETCH_ASSOC);
        //print_r($usuario); // testar saída
        return $departamento;
    }
    public function deleteFromId($id){
        $sql = "delete from departamento where pk_departamento = {$id}";   
        $con = Conexao::getInstance()->prepare($sql);
        $con->execute();
        return "Excluído Todos com sucesso";
    }
}
?>
