<?php
namespace LOJA\Model;
use LOJA\includes\Util;
class Cliente{

    private $id;
    private $nome;
    private $telefone;
    private $email;
		private $cpf;
		private $senha;

    public function __construct(){
		}
		
		public function getSenha(){
			return $this->senha;
		}
	
		public function setSenha($senha){
			$this->senha = $senha;
		}
    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		if($nome==="") throw new \Exception('Nome Inválido');
		
		$this->nome = $nome;
	}

	public function getTelefone(){
		return $this->telefone;
	}

	public function setTelefone($telefone){
		$this->telefone = $telefone;
	}

	public function getEmail(){
		
		return $this->email;
	}

	public function setEmail($email){
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			$this->email = $email;
		}else{
			throw new \Exception("E-mail Inválido");
		}
	}

	public function getCpf(){
		return $this->cpf;
	}

	public function setCpf($cpf){

		//if(Util::validaCPF($cpf)) throw new \Exception("CPF Inválido");
		$this->cpf = $cpf;
	
	}
}

?>