<?php
namespace LOJA\DAO;
use LOJA\Model\Item;
use LOJA\Model\Carrinho;
use LOJA\Model\Produto;


class DAOCarrinho{

    public function addItem(Item $item){
		array_push($this->lista,$item);
	}

	public function removeItem($id){
		$item;
		foreach($this->lista as $item){
			if($item->getProduto()->getId()===$id){
				$item = $item->getProduto();
			};
		}
		$index = array_search($item, $this->lista, true);
		unset($this->lista[$index]);
	}

	

}