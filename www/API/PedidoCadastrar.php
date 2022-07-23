<?php
namespace LOJA\API;
use LOJA\Model\Cliente;
use LOJA\Model\Pedido;
use LOJA\Model\Carrinho;
use LOJA\DAO\DAOPedido;

class PedidoCadastrar{

    public $msg;

    function __construct($url){

        if(isset($_SESSION['clienteid'])){
            $this->efetuarPedido();
            header("location:".$url."/pedido/pagamento");
        }else{
            $_SESSION['url'] = $url."/pedido/finalizar";
            header("location: ".$url."/login/usuario");
        }

    }

    function efetuarPedido(){

        try{
            $frete = $_SESSION['frete']; // Adicionei
            $obj = new Pedido();
            $obj->setData(date("d-m-Y"));  // alterei
            $obj->setFrete($frete->getValor()); // alterei
            $obj->setDias($frete->getPrazoEntrega()); // alterei
            
            $DAO = new DAOPedido();
            $this->msg = $DAO->cadastrar($obj,$_SESSION['carrinho']);

        }catch(Exception $e){
            $this->msg = $e->getMessage();
        }
    }
    

 
}