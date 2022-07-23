<?php
namespace LOJA\API;
use LOJA\DAO\DAODepartamento;

class DepartamentoListar{

    public $lista;

    function __construct(){
        $obj = new DAODepartamento();
        $this->lista = $obj->listaDepartamentos();
    }

}
?>