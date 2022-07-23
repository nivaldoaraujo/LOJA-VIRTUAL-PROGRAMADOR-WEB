<?php include "view/header.php" ?>

<table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">ID</th>
                    <th scope="col">NOME</th>
                    <th scope="col">PRECO</th>
               
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($lista as $produto) { ?>
                <tr>
                    <td><img width="50" src="<?php echo $url; ?>/View/img/produtos/<?php echo $produto['imagem'] ?>"></td>
                    <td scope="row"><?php echo $produto['pk_produto'] ?></th>
         
                    <td><?php echo $produto['nome'] ?></td>
                    <td>R$ <?php echo number_format($produto['preco'],2,",","."); ?></td>
                    
                </tr>  
                <?php } ?>
            </tbody>
        </table>
        <?php include "view/footer.php" ?>