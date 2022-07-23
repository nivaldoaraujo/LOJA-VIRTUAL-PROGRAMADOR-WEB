<?php include "view/header-loja.php" ?>
<h1>Login</h1>

<form method="post" action="<?php echo $url; ?>/login/usuario">

    <div class="row">
    <div class="col-md-4">
        <div class="input-group mb-3">
        
        <input type="text" name="email"  placeholder="usuario" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">

        </div>

        <div class="input-group mb-3">
       
        <input type="password" name="senha"  placeholder="senha" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">

        </div>
        <button class="btn btn-primary">Entrar</button>
        <a href="<?php echo $url; ?>/cliente/cadastrar">Cadastre-se</a>
    </div>
    </div>
</form>

<?php include "view/footer.php" ?>