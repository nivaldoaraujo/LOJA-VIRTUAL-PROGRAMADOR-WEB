<?php
namespace LOJA\API; // local desta classe
use LOJA\DAO\DAOUsuario;
use LOJA\Model\Usuario;

class UsuarioLogar{
    public $msg;

    function __construct(){
        if($_POST){
            try{
                $obj = new Usuario();
                $obj->setNome($_POST['nome']);
                $obj->setSenha($_POST['senha']);

                $DAO = new DAOUsuario();
                // Verifica se existe usuario com nome e senha informados
                $result = $DAO->buscaPorNomeSenha($obj);
                
                if($result){ // se houver resultado
                    // Guardo as informações do usuário na sessão
                    $_SESSION['usuarioid'] = $result['id'];
                    $_SESSION['usuarionome'] = $result['nome'];

                    header("location: http://localhost/lojavirtual/painel/adm");
                }else{ // Não houve resultado
                    $this->msg = "Usuário/Senha inválidos"; 
                }
                
            }catch(\Exception $e){
                $this->msg = $e->getMessage();
            }
    }
    }

}