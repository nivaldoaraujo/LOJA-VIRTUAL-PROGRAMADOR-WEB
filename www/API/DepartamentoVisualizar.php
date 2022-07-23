<?php
namespace LOJA\API; // local desta classe
use LOJA\DAO\DAODepartamento;

class DepartamentoVisualizar{
    public $dados;

    public function __construct(){
        try{  
            $DAO = new DAODepartamento();
            $this->dados = $DAO->buscaPorId($_GET['id']);
   
        }catch(\Exception $e){
            $this->dados = $e->getMessage();
        }
    }
}

?>