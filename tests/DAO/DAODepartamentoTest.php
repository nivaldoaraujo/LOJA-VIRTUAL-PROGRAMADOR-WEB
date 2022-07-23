<?php
use PHPUnit\Framework\TestCase;
use LOJA\Model\Departamento;
use LOJA\DAO\DAODepartamento;


class DAODepartamentoTests extends TestCase
{
    /**
     * @before
     */
    public function setUpInit(){

    }

    
  public function testCadastro()
  {
      // Dados
     $d = new Departamento();
     $d->setNome('Daniel 55');


     // Execução
     $DAO = new DAODepartamento();
     $result = $DAO->cadastrar($d);

      //Testa Resultados
     $this->assertEquals($result,"Cadastrado com sucesso");

     // Remove os dados gerados
     $DAO->deleteFromId($DAO->lastId);

  }
  
  }  ?>