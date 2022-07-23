<?php include "View/header-loja.php" ?>

<?php //echo $_SESSION['idpedido']; ?>
<h1 style="margin-bottom: 30px; margin-top: 30px;">Pagamento</h1>
<div class="row">
<div class="col-md-8">
<form class="form-horizontal">
<fieldset>



<!-- Multiple Radios -->
<div class="form-group">
  <label class="col-md-12 control-label" for="radios">Método de Pagamento</label>
  <div class="col-md-12">
  <div class="radio">
    <label for="radios-0">
      <input type="radio" name="radios" id="radios-0" value="1" checked="checked">
      Cartão de Crédito
    </label>
	</div>
  <div class="radio">
    <label for="radios-1">
      <input type="radio" name="radios" id="radios-1" value="2">
      Boleto
    </label>
	</div>
  </div>
</div>

</fieldset>
</form>

<form class="form-horizontal">
<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="numero">Número do Cartão</label>  
  <div class="col-md-12">
  <input id="numero" name="numero" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-12 control-label" for="bandeira">Bandeira</label>
  <div class="col-md-12">
    <select id="bandeira" name="bandeira" class="form-control">
      <option value="visa">VISA</option>
      <option value="mastercard">MASTERCARD</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="Efetuar Pagamento">Código Segurança</label>  
  <div class="col-md-12">
  <input id="Efetuar Pagamento" name="Efetuar Pagamento" type="text" placeholder="999" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="textinput">Data Validade</label>  
  <div class="col-md-12">
  <input id="textinput" name="textinput" type="text" placeholder="Mês" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="ano"></label>  
  <div class="col-md-12">
  <input id="ano" name="ano" type="text" placeholder="Ano" class="form-control input-md">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-12 control-label" for="singlebutton"></label>
  <div class="col-md-12">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Efetuar Pagamento</button>
  </div>
</div>

</fieldset>
</form>
</div>
<div class="col-md-4">
<h3>DADOS DO PEDIDO</h3>
<p>Total: R$ <?php echo $pagamento->getTotal(); ?> </p>
<p>Frete: R$ <?php echo $pagamento->getFrete(); ?>  </p>
<p>Entrega: <?php echo $pagamento->getDias(); ?>  dias</p>
</div>
</div>
<?php include "View/footer.php" ?>


               