<?php
use PHPUnit\Framework\TestCase; // importar o PHPUnit
use LOJA\Model\Cliente; // Loja foi configurado no JSON composer

class ClienteTest extends TestCase
{
public function testClass()
  {
     $c = new Cliente();
     $c->setNome('Daniel');
     $c->setTelefone('(21)1231-2132');
     $c->setEmail('daniel@email.com');
     $c->setCpf('123.456.789-10');
    
     $this->assertEquals($c->getNome(), 'Daniel');
     $this->assertEquals($c->getTelefone(), '(21)1231-2132');
     $this->assertEquals($c->getEmail(), 'daniel@email.com');
     $this->assertEquals($c->getCpf(), '123.456.789-10');

  }

  public function testErrorEmail(){
    $this->expectException(\Exception::class);
    $this->expectExceptionMessage('E-mail Inválido');
    $c = new Cliente();
    $c->setEmail('danielemail.com');
  }

  public function testErrorNome(){
    $this->expectException(\Exception::class);
    $this->expectExceptionMessage('Nome Inválido');
    $c = new Cliente();
    $c->setNome("");
  }

  public function testErrorCPF(){

    $this->expectException(\Exception::class);
    $this->expectExceptionMessage('CPF Inválido');
    $c = new Cliente();
    $c->setCpf("13185244745");
    
  }

}