<?php
namespace LOJA\API;
use LOJA\Model\Produto;
use LOJA\Model\Departamento;
use LOJA\DAO\DAOProduto;
use LOJA\includes\Util;

class ProdutoCadastrar{
    public $msg;
            function __construct(){
                if($_POST){
                        try{
                            // Criamos um objeto produto
                            $produto = new Produto();
                            $produto->setNome($_POST['nome']);
                            $produto->setPreco($_POST['preco']);
                            $produto->setDescricao($_POST['descricao']);
                            $produto->setImagem(Util::uploadImg());
                            
                            // Crio um objeto Departamento
                            $departamento =new Departamento();
                            $departamento->setId($_POST['departamento']);

                            // Definindo o departamento para o produto
                            $produto->setDepartamento($departamento);
                           
                            $DAO = new DAOProduto();
                            $msg = $DAO->cadastrar($produto);
                            
                            
                        }catch(Exception $e){
                            $msg = $e->getMessage();
                            
                        }
                    }
                }
        }
    
?>