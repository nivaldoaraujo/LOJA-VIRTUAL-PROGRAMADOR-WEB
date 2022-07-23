<?php
namespace LOJA\DAO;
use LOJA\Model\Conexao;
use LOJA\Model\Produto;

class DAOProduto{

    public $lastId;

    public function cadastrar(Produto $produto){

        $pdo = Conexao::getInstance(); // Cria objeto de conexão
        $pdo->beginTransaction(); // Inicia a transação

        try{
            $con = $pdo->prepare(
                "INSERT INTO produto 
                    VALUES (default, :nome, :preco, :descricao, :departamento, :imagem)"
            );
            $con->bindValue(":nome", $produto->getNome());
            $con->bindValue(":preco", $produto->getPreco());
            $con->bindValue(":descricao", $produto->getDescricao());
            $con->bindValue(":imagem", $produto->getImagem());
            // $produto->getDepartamento() um objeto da classe departamento
            // entao $produto->getDepartamento()->getId()  retorna o id do departamento
            $con->bindValue(":departamento", $produto->getDepartamento()->getId());
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


    public function listaProduto(){
       
        $sql = "SELECT
                produto.nome,
                produto.preco,
                produto.imagem,
                produto.pk_produto as 'id',
                departamento.nome as 'departamento'
                    
                FROM produto
                INNER JOIN departamento
                ON produto.fk_departamento_produto = departamento.pk_departamento";


        
        $con = Conexao::getInstance()->prepare($sql);
        $con->execute();
        $lista = array();

        while($produto = $con->fetch(\PDO::FETCH_ASSOC)) {
            $lista[] = $produto;
        }
        return $lista;
    }

    public function buscaPorId($id){
        $sql = "SELECT * FROM produto WHERE pk_produto = :id";
        $con = Conexao::getInstance()->prepare($sql);
        $con->bindValue(":id", $id);
        $con->execute();

        $obj = $con->fetch(\PDO::FETCH_ASSOC);
       
        $produto = new Produto();
        $produto->setId($obj['pk_produto']);
        $produto->setNome($obj['nome']);
        $produto->setPreco($obj['preco']);
        $produto->setImagem($obj['imagem']);
        $produto->setDescricao($obj['descricao']);

        return $produto;
    }


    public function buscaPorNome($busca){
        
        $sql = "SELECT * FROM produto WHERE nome LIKE :busca";
        $con = Conexao::getInstance()->prepare($sql);
        
        $con->bindValue(":busca", '%'.$busca.'%');
        $con->execute();

        $lista = array();

        while($produto = $con->fetch(\PDO::FETCH_ASSOC)) {
            $lista[] = $produto;
        }
        return $lista;
    }

    public function deleteFromId($id){
        $sql = "delete from produto where pk_produto = {$id}";   
        $con = Conexao::getInstance()->prepare($sql);
        $con->execute();
        return "Excluído Todos com sucesso";
    }
}
?>
