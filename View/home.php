<?php include "View/header-loja.php" ?>

<div class="row">
    <?php foreach($lista2 as $produto) { 
        $link = "http://localhost/lojavirtual/carrinho/adicionar/".$produto['id'];
        ?>
    <div class="col-md-3 produto-item">
    <img width="100%" src="<?php echo $url; ?>/View/img/produtos/<?php echo $produto['imagem'] ?>">
        <p><?php echo $produto['nome'] ?></p>
        <p>R$ <?php echo number_format($produto['preco'],2,",","."); ?></p>
        <a href="<?php echo $url; ?>/carrinho/adicionar/<?php echo $produto['id']; ?>" class="btn btn-success">Comprar</a>
    </div>
    <?php } ?>
</div>



<?php include "View/footer.php" ?>


               