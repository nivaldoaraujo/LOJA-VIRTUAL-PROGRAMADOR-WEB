<?php
namespace LOJA\Model;
use LOJA\Model\Produto;

class Item{
	
    private $pedido;
	private $produto;
	private $quantidade;

    public function __construct(){
	}
	
	public function getPedido(){
		return $this->pedido;
	}

	public function setPedido($pedido){
		$this->pedido = $pedido;
	}

	public function getProduto(){
		return $this->produto;
	}

	public function setProduto($produto){
		$this->produto = $produto;
	}

	public function getQuantidade(){
		return $this->quantidade;
	}

	public function setQuantidade($quantidade){
		$this->quantidade = $quantidade;
	}
}
