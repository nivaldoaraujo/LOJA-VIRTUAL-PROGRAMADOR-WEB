<?php
namespace LOJA\API; // local desta classe
use LOJA\DAO\DAOCliente;
use LOJA\Model\Cliente;

class ClienteLogar{
    public $msg;

    function __construct($url){
        if($_POST){

            try{
                $obj = new Cliente();
                $obj->setEmail($_POST['email']);
                $obj->setSenha($_POST['senha']);
                
                $DAO = new DAOCliente();
    
                $result = $DAO->buscaPorEmailSenha($obj);
                $this->verificaUrl($url);

                if($result){
                    
                    $_SESSION['clienteid'] = $result['id'];
                    $_SESSION['clientenome'] = $result['nome'];

                }else{
                    $this->msg = "E-mail/Senha inválidos"; 
                }
                
            }catch(\Exception $e){
                $this->msg = $e->getMessage();
            }
        }
    }

            function verificaUrl($url){
                
                if(isset($_SESSION['url'])){
                    
                    $url2 = $_SESSION['url'];
                    unset($_SESSION['url']);
                    header("location:".$url2);

                }else{
                    header("location: ".$url."/painel/cliente");
                }
            }
    
    

}