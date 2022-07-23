<?php

namespace LOJA\API;
use LOJA\Model\Cliente;
use LOJA\DAO\DAOCliente;

class ClienteVisualizar{

    public $dados;

    function __construct(){

        if($_GET['id']){
            try{  
                    $DAO = new DAOCliente();
                    $this->dados = $DAO->buscaPorId($_GET['id']);
        
                }catch(\Exception $e){
                    $this->dados = $e->getMessage();
                }
            }
        }
    }
?>