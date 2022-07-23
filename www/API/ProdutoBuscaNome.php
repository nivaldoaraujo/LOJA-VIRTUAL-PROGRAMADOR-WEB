<?php
namespace LOJA\API;
use LOJA\DAO\DAOProduto;
class ProdutoBuscaNome {

    public $lista;
    
    function __construct(){
        
        $busca = $_GET['id'];
        $obj = new DAOProduto();
        $this->lista = $obj->buscaPorNome($busca);
    }
}
?>