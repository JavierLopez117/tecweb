<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TECFLIX</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/estilos.css">
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
          data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../dashboard.php">TECFLIX</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav pull-right">
            <li>
                <li class="active"></li>
              <a href="../peliculas/index.php" class="btn">Peliculas </a>
            </li> 
            <li class="dropdown">
              <a href="#" class="dropdpwn-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
              aria-expanded="false"> admin <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Cerrar sesion</a></li>
              </ul>
            </li>
          </ul>



        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container" id="main">
      <div class="row">
        <div class="col-md-12">
          <div class="pull-right">
            <a href="form_registrar.php" class="btn btn-primary">
              <span class="glyphicon glyphicon-plus"></span>Nuevo</a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <fieldset>
            <legend>Lista de Peliculas</legend>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Titulo</th>
                  <th>Categoria</th>
                  <th class="text-center">imagen</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php

                require '../../vendor/autoload.php';
                $pelicula = new tecweb\Pelicula;
                $info_pelicula = $pelicula->mostar();
                 $cantidad = count($info_pelicula);
                if ($cantidad > 0){
                  $c=0;
                  for ($x =0; $x <$cantidad; $x++){
                    $c++;
                    $item = $info_pelicula[$x];
                ?>

                <tr>
                <td><?php print $c?></td>
                <td><?php print $item["titulo"]?></td>
                <td><?php print $item["nombre"]?></td>
                  <td class="text-center">
                    <?php
                    $imagen ='../../img/'.$item["imagen"];
                    if(file_exists($imagen)){
                    ?>
                      <img src="<?php print $imagen; ?>"  width="50">
                    <?php } else{?>
                      sin imagen
                  <?php }?>    
                  </td>
                  <td class="text-center">
                        <a href="../acciones.php?id=<?php print $item['id']?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>
                        <a href="form_actualizar.php?id=<?php print $item['id']  ?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                      </td>
                  </td>
                  </tr>
                  <?php
                    }
                  }

                  else{
                
                   
                  ?>
                  <tr>
                    <td colspan="6">SIN RESULTADOS
                  </tr>
                <?php }?>   
              </tbody>
            </table>
          </fieldset>
        </div>
      </div>


    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../../assets/js/jquery.min.js"></script>
    <script src="../../../assets/js/bootstrap.min.js"></script>

  </body>
</html>
