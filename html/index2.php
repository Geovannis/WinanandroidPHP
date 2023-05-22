<?php global $db;
include 'conexion.php';?>
<?php
global $funciones;
include 'metodoPHP.php';?>
<?php $visita=asig_Contadorview();?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
<title>WinAndroid</title>
<!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="assets/css/sticky-footer-navbar.css" rel="stylesheet">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />

  </head>

  <body>

    <header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="index.php">TALLER WINANDROID - VENEZUELA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
           
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
            </li>  
                     
          </ul>
          
        </div>
      </nav>
    </header>

    <!-- Begin page content -->

<div class="container">
 <h4 class="mt-5">Buscador avanzado de accesorios de moviles con los que contamos</h4>
 <hr>

<div class="row">
  <div class="col-12 col-md-12">
<!-- Contenido -->

<ul class="list-group">
  <li class="list-group-item">
<form method="post">
  <div class="form-row align-items-center">
    <div class="col-auto">
      <label class="sr-only" for="inlineFormInput">Curso</label>
      <input required name="PalabraClave" type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Ingrese Marca o Modelo">  
      <input name="buscar" type="hidden" class="form-control mb-2" id="inlineFormInput" value="v">
    </div>
   <script>
       <?php function accion(){
           global $visita;
           echo $visita;
       }
       ?>
   </script>
    <div class="col-auto">
      <button type="submit" class="btn btn-primary mb-3" onclick="">Buscar Ahora</button>
    </div>
  </div>
</form>
  </li>

</ul>

<?php

 if(!empty($_POST))
{
      $aKeyword = explode(" ", $_POST['PalabraClave']);
      $query ="SELECT  producto, cantidad, precio FROM stock WHERE producto like '%" . $aKeyword[0] . "%' AND cantidad <> 0";
      
     for($i = 1; $i < count($aKeyword); $i++) {
        if(!empty($aKeyword[$i])) {
            $query .= " OR precio like '%" . $aKeyword[$i] . "%'";
        }
      }

    /** @var TYPE_NAME $db */
    $result = $db->query($query);
     echo "<br>Has buscado la palabra clave:<b> ". $_POST['PalabraClave']."</b>";
                     
     if(mysqli_num_rows($result) > 0) {
        $row_count=0;
        echo "<br><br>Resultados encontrados: ";
        echo "<br><table class='table table-striped'>";
echo "<tr><th>#</th><th>Producto</th><th>Cantidad</th><th>Precio</th></tr>";  
        While($row = $result->fetch_assoc()) {   
            $row_count++;
                                   
            echo "<tr><td>".$row_count." </td><td>". $row['producto'] . "</td><td >". $row['cantidad'] . "</td><td>". $row['precio'] . "</td></tr>";
        }
        echo "</table>";
	
    }
    else {
        echo "<br>Resultados encontrados: Ninguno";
		
    }
}
 
?>

<!-- Fin Contenido --> 
</div>
</div><!-- Fin row -->
</div><!-- Fin container -->
    <footer class="footer">
      <div class="container">
        <span class="text-muted"><p>Unete a nuestro <a href="https://chat.whatsapp.com/HIPZ1XB7cm9LGa8TCEEEXW" target="_blank">Grupo de Whatsapp</a></p></span>



      </div>



    </footer>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    </body>
</html>
