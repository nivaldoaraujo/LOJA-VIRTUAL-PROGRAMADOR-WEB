<?php
use PHPUnit\Framework\TestCase;
use LOJA\Model\Cliente;
use LOJA\DAO\DAOCliente;
use LOJA\Model\Conexao;
use LOJA\Model\Pedido;
use LOJA\Model\Carrinho;

class DAOPedidoTests extends TestCase
{

    public $cliente;
    public $carrinho;

    /**
     * @before
     */
    public function setUpInit(){
/*
      $obj = new Cliente();
      $obj->setNome('Daniel');
      $obj->setTelefone('(21)1231-2132');
      $obj->setEmail('daniel@email.com');
      $obj->setCpf('123.456.789-10');
      
      $DAO = new DAOCliente();
      $DAO->cadastrar($obj);
      $this->cliente = new Cliente();
      $this->cliente->setId($DAO->lastId);

      $produto = new Produto();
      $produto->setNome('Celular LG');
      $produto->setPreco(1000);
      $produto->setDescricao('Câmera 10mp');
      $produto->setImagem('imagem.jpg');
      
      // Crio um objeto Departamento
      $departamento =new Departamento();
      $departamento->setId($_POST['departamento']);

      // Definindo o departamento para o produto
      $produto->setDepartamento($departamento);
     
      $DAO = new DAOProduto();
      $msg = $DAO->cadastrar($produto);


      $pdo = Conexao::getInstance();
      $pdo->beginTransaction();

      $con = $pdo->prepare("
        INSERT INTO cliente VALUES (default, :nome, :telefone, :email, :cpf)"
      );
      
      $con->bindValue(":nome", 'Daniel');
      $con->bindValue(":telefone", '(21)1231-2132');
      $con->bindValue(":email", 'daniel@email.com');
      $con->bindValue(":cpf", '123.456.789-10');
      $con->execute();
      
      $c = new Cliente();
      $c->setId($pdo->lastInsertId());
      $this->idcliente = $c;*/
    

    }
    
  public function testCadastro()
  {
    $p = new Pedido();
     //$c->setId();
     $p->setData('2019-12-25');
     $p->setFrete(20.00);
     $p->setDias(5);
     $p->setCliente($this->cliente);
    


    

  }  }  ?>
