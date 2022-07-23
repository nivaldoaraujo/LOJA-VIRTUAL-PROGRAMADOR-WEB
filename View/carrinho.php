<?php include "view/header-loja.php" ?>

<div class="row">
    <?php
        $carrinho = $_SESSION['carrinho'];
        
         if(is_null($carrinho) || empty($carrinho->getItems())){
            // Inicio HTML
            ?>
                <p>Seu Carrinho está vazio</p>

            <?php
            // Fim HTML
        }else{

            foreach ($carrinho->getItems() as $item){
                $produto = $item->getProduto();
                $link = "{$url}/carrinho/remover/".$produto->getId();
             
                // Inicio HTML
            ?>

                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-2"><img width="100%" src="<?php echo $url.'/View/img/produtos/'.$produto->getImagem(); ?>"></div>
                        <div class="col-md-3">
                        <p><?php echo $produto->getNome(); ?></p>
                        <a href="<?php echo $link; ?>" class="btn btn-danger">Remover</a>
                        
                        </div>
                        
                        
                        
                        <div class="col-md-4">
                        <form method="post" action="<?php echo $url ?>/produto/quantidade">
                        
                            <input type="number" name="quantidade" value="<?php echo $item->getQuantidade(); ?>" style="width: 35px;"/>
                            <input type="submit" style="btn btn-warning" value="Atualizar" />
                            </form>
                        </div>


                        
                        
                    </div>
                </div>

     <?php   
     // Fim HTML
            }
        }
    ?>

<div class="col-md-4">
<form method="post" action="<?php echo $url; ?>/frete/calcular">
        <label>Frete</label>
        <input type="text" size="20" name="cep" />
        <button>Calular</button>
    </form>

    <?php
        if(isset($_POST['cep'])){
            echo "<p>Preço: R$ ".$frete->getValor()."</p>";
            echo "<p>Entrega: R$ ".$frete->getPrazoEntrega()." dias</p>";
            echo '<a href="'.$url.'/pedido/finalizar" class="btn btn-success">Finalizar</a>';
        }else{
            echo "<p>Insira o CEP</p>";
            echo '<a href="'.$url.'/pedido/finalizar" class="btn btn-success disabled">Finalizar</a>';
        }
    ?>

    
</div>

</div>
<?php include "view/footer.php" ?>


               