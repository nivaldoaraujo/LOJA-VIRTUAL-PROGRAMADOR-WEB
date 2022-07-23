<?php
use PHPUnit\Framework\TestCase;
use LOJA\Model\Departamento;
use LOJA\Model\Produto;
use LOJA\DAO\DAODepartamento;
use LOJA\DAO\DAOProduto;

class DAOProdutoTest extends TestCase
{
  public $departamento; // dados do departamento
  /**
  * @before
  */
  public function setUpInit(){ // Será executado primeiro
    // Cria um novo departamento
    $this->departamento =new Departamento();
    $this->departamento->setNome('Eletrônicos');
    // Cadastra um novo departamento para teste e atribui ao $departamento
    $DAO = new DAODepartamento();
    $DAO->cadastrar($this->departamento);
    $this->departamento->setId($DAO->lastId); 

  }

  public function testCadastro() // testa o cadastro de produtos
  {
    // Definindo produto para teste
    $produto = new Produto();
    $produto->setNome('Televisão');
    $produto->setPreco(2000);
    $produto->setDescricao('Samsung 4K');
    $produto->setImagem('imagem.jpg');
    // Definindo o departamento para o produto
    $produto->setDepartamento($this->departamento);
    // Executando Cadastro
    $DAO = new DAOProduto();
    $result = $DAO->cadastrar($produto);
    // Verificando se o cadastro foi efetuado com sucesso
    $this->assertEquals($result,"Cadastrado com sucesso");
    // Deletando a categoria e o cliente
    $DAO->deleteFromId($DAO->lastId);
    $DAO = new DAODepartamento();
    $DAO->deleteFromId($this->departamento->getId());

  }
  
  }  
  
  ?>