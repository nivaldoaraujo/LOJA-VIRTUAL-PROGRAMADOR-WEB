<?php
namespace LOJA\DAO;
use LOJA\Model\Conexao;
use LOJA\Model\Cliente;

class DAOCliente{

    public $lastId;

    public function cadastrar(Cliente $cliente){

        $pdo = Conexao::getInstance(); // Cria objeto de conexão
        $pdo->beginTransaction(); // Inicia a transação

        try{

            $con = $pdo->prepare(
                "INSERT INTO cliente VALUES 
                    (default, :nome, :telefone, :email, :cpf, :senha)"
            );

            $con->bindValue(":nome", $cliente->getNome());
            $con->bindValue(":telefone", $cliente->getTelefone());
            $con->bindValue(":email", $cliente->getEmail());
            $con->bindValue(":cpf", $cliente->getCpf());
            $con->bindValue(":senha", $cliente->getSenha());
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

    public function listaClientes(){
       
        $sql = "SELECT * FROM cliente"; // String de sql
        $con = Conexao::getInstance()->prepare($sql);// Associa o SQL a Conexão
        $con->execute();// Executa no banco
        
        $lista = array();

        while($cliente = $con->fetch(\PDO::FETCH_ASSOC)) {
            $lista[] = $cliente;
        }

        return $lista;

    }

    public function buscaPorId($id){
        $sql = "SELECT * FROM cliente WHERE pk_cliente = :id";
        $con = Conexao::getInstance()->prepare($sql);
        $con->bindValue(":id", $id);  
        $con->execute();
        
        $cliente = new Cliente();
        $cliente = $con->fetch(\PDO::FETCH_ASSOC);
        //print_r($usuario); // testar saída
        return $cliente;
    }

    public function deleteAll(){
        $sql = "delete from cliente";   
        $con = Conexao::getInstance()->prepare($sql);
        $con->execute();
        return "Excluído Todos com sucesso";
    }

    public function deleteFromId($id){
        $sql = "delete from cliente where pk_cliente = {$id}";   
        $con = Conexao::getInstance()->prepare($sql);
        $con->execute();
        return "Excluído Todos com sucesso";
    }

    public function buscaPorEmailSenha(Cliente $cliente){
        $sql = "SELECT 
            pk_cliente as id,
            nome 
            FROM cliente 
            WHERE email = :email AND senha = :senha";

        $con = Conexao::getInstance()->prepare($sql);
        $con->bindValue(":email", $cliente->getEmail());
        $con->bindValue(":senha", $cliente->getSenha());
        $result = $con->execute();
        

        $obj = new Cliente();
        $obj = $con->fetch(\PDO::FETCH_ASSOC);
      
        return $obj;

    }


    public function atualizar(Cliente $cliente){

         try{

            $sql = 
                "UPDATE cliente SET 
                    nome= :nome,
                    telefone= :telefone,
                    email= :email,
                    cpf= :cpf,
                    senha= :senha 
                    where pk_cliente = :id
                    ";
            $con = Conexao::getInstance()->prepare($sql);
            $con->bindValue(":id", $cliente->getId());
            $con->bindValue(":nome", $cliente->getNome());
            $con->bindValue(":telefone", $cliente->getTelefone());
            $con->bindValue(":email", $cliente->getEmail());
            $con->bindValue(":cpf", $cliente->getCpf());
            $con->bindValue(":senha", $cliente->getSenha());
            $con->execute();
            echo $cliente->getNome();
            return "Atualizado com sucesso";

        }catch(Exception $e){
           
            return "Erro ao atualizar";
        }

    }
}
?>
