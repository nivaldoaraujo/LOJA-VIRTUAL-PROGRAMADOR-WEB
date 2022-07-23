<?php
use PHPUnit\Framework\TestCase;
use LOJA\Model\Cliente;
use LOJA\DAO\DAOCliente;


class DAOClienteTests extends TestCase
{
    /**
     * @before
     */
    public function setUpInit(){

    }

    
  public function testCadastro()
  {
      // Dados
     $c = new Cliente();
     $c->setNome('Daniel 55');
     $c->setTelefone('(21)1231-2132');
     $c->setEmail('daniel@email.com');
     $c->setCpf('123.456.789-10');

     // Execução
     $DAO = new DAOCliente();
     $result = $DAO->cadastrar($c);

      //Testa Resultados
     $this->assertEquals($result,"Cadastrado com sucesso");

     // Remove os dados gerados
     $DAO->deleteFromId($DAO->lastId);

  }
  
  }  ?>