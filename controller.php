<?php 
    use LOJA\includes\Config;

    require "includes/autoload.php";
    session_start();

    @$router = $_GET['model'].$_GET['action'];
    $view = "";

    $config = new Config();
    $url = $config->url;

    // 1. Na URL são passados 2 parâmetros
        //  $_GET['model'].$_GET['action'];
        // Model e Action foram configurados pelo htaccess
        // juntar as palavras model + action para formar case

    switch($router){

        case 'departamentocadastrar':
            \LOJA\includes\Seguranca::restritoAdm();
            $obj = new \LOJA\API\DepartamentoCadastrar;
            $msg = $obj->msg;
            
            $view = "form-departamento.php";
            break;

        case 'departamentolistar':

            \LOJA\includes\Seguranca::restritoAdm();

            $obj = new \LOJA\API\DepartamentoListar;
            $lista = $obj->lista;
            $view = "lista-departamento.php";
            break;

        case 'departamentovisualizar':
            $obj = new \LOJA\API\DepartamentoVisualizar;
            $departamento = $obj->dados;
            $view = "visualiza-departamento.php";
            break;

        case 'clientecadastrar':

            $obj = new \LOJA\API\DepartamentoListar;
            $lista = $obj->lista;
            
            $obj = new \LOJA\API\ClienteCadastrar;
            $msg = $obj->msg;
            $view = "form-cliente.php";
            break;

        case 'clientelistar':
            $obj = new \LOJA\API\ClienteListar;
            $lista = $obj->lista;
            $view = "lista-cliente.php";
            break;




        case 'clientevisualizar':

            $obj = new \LOJA\API\ClienteAtualizar;
            $msg = $obj->msg;
            
            $obj = new \LOJA\API\ClienteVisualizar;
            $cliente = $obj->dados;
            $view = "visualiza-cliente.php";
            break;

        case 'produtocadastrar':
            
            $obj = new \LOJA\API\ProdutoCadastrar;
            $msg = $obj->msg;
            echo $msg;

            $obj2 = new \LOJA\API\DepartamentoListar;                ;
            $lista = $obj2->lista;

            $view = "form-produto.php";
            break;

        case 'produtolistar':
            $obj = new \LOJA\API\ProdutoListar;
            $lista = $obj->lista;
            $view = "lista-produto.php";
            break;

        case 'produtobuscar':
            $obj = new \LOJA\API\ProdutoBuscaNome;
            $lista = $obj->lista;
            $view = "lista-produto.php";
            break;
        
            case 'fretecalcular':

                $obj = new \LOJA\API\DepartamentoListar;
                $lista = $obj->lista;

                $obj = new \LOJA\API\CalcularFrete;
                $frete = $obj->frete;
                
                $view = "carrinho.php";
            break;
        
        case 'home':
            $obj = new \LOJA\API\DepartamentoListar;
            $lista = $obj->lista;

            $obj = new \LOJA\API\ProdutoListar;
            $lista2 = $obj->lista;

            $view = "home.php";
            break;


        case 'loginadm':
            $obj = new \LOJA\API\UsuarioLogar;
            $msg = $obj->msg;
            $view = "form-login-adm.php";
            break;

        case 'loginusuario':



            $obj = new \LOJA\API\DepartamentoListar;
            $lista = $obj->lista;
            
            $obj = new \LOJA\API\ClienteLogar($url);
            $msg = $obj->msg;
            $view = "form-login.php";
            break;

        case 'paineladm':
            $view = "painel-adm.php";
            break;

        case 'painellogoff':
            $obj = new \LOJA\API\UsuarioLogoff;
            $view = "form-login-adm.php";
            break;

        case 'carrinhoadicionar':

            $obj = new \LOJA\API\CarrinhoVisualizar;
            $obj = new \LOJA\API\DepartamentoListar;
            $lista = $obj->lista;
            $view = "carrinho.php";
            break;

        case 'carrinhoremover':

            $obj = new \LOJA\API\CarrinhoRemover;
            $obj = new \LOJA\API\DepartamentoListar;
            $lista = $obj->lista;
            $view = "carrinho.php";
            break;
        
        case 'produtoquantidade':
            $obj = new \LOJA\API\CarrinhoQuantidade;
            //header("location:".$url."/carrinho");
            break;  

        case 'carrinho':
            $obj = new \LOJA\API\DepartamentoListar;
            $lista = $obj->lista;
            $view = "carrinho.php";
            break;

        case 'painelcliente':
            $obj = new \LOJA\API\PedidoListar;
            $pedidos = $obj->lista;

            $view = "painel-cliente.php";
            break;

        case 'painelpedido':
            $obj = new \LOJA\API\PedidoVisualiza;
            $dados = $obj->dados;
            $produtos = $obj->produtos;
                
            $view = "visualiza-pedido.php";
            break;

        case 'pedidofinalizar':

            //\LOJA\includes\Seguranca::restritoUsuario();
            
            $obj = new \LOJA\API\PedidoCadastrar($url);
            $obj = new \LOJA\API\DepartamentoListar;
            $lista = $obj->lista;

            $view = "pagamento.php"; // PÁGINA LOGIN CLIENTE
            break;

        case 'pedidopagamento':

            //$obj = new \LOJA\API\DepartamentoListar;
            //$lista = $obj->lista;

            $obj = new \LOJA\API\PagamentoVisualizar;
            $pagamento = $obj->pagamento;
            
            $view = "pagamento.php"; // PÁGINA LOGIN CLIENTE
            break;

           
        default:
            echo "ok";
            $obj = new \LOJA\API\DepartamentoListar;
            $lista = $obj->lista;

            $obj = new \LOJA\API\ProdutoListar;
            $lista2 = $obj->lista;

            $view = "home.php";
            break;


    }

    include "View/{$view}";
   
?>

