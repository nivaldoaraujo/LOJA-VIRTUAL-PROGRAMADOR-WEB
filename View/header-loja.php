<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="includes/fontawesome/css/all.css" rel="stylesheet">
    <title>Hello, world!</title>
    <style>
        .topo{
            height: 100px;
            background-color: black;
            padding: 15px;
        }

        .topo .user{
            color: #fff;
            padding-top: 20px;
        }
        .topo .busca{

            padding-top: 20px;
        }
    </style>
  </head>
  <body>

  <div class="topo">
        <div class="row">
        <div class="col-md-2"><img src="View/img/logo.png" width="100"></div>
        <div class="col-md-7 busca">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-search fa"></i></span>
            </div>
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
            </div>
                    </div>
        <div class="col-md-3 user">
            <i class="fas fa-user-circle fa"></i> Login
            <i class="fas fa-shopping-cart fa"></i> Carrinho
            
            </div>
        
        </div>
        
  </div>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Departamento</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <?php foreach($lista as $departamento) { ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $departamento['pk_departamento'] ?>"><?php echo $departamento['nome'] ?></a>
        </li>
        <?php } ?>
    </ul>
  </div>
</nav>

<div class="container">
