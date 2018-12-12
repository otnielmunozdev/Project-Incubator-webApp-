<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title> Administración</title>
    <meta name="description" content="Aplicacion web de incubadora">
    <meta name="keywords" content="Encubadora, Incubadora, Huevos , Pollos">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0, minimum-scale=1.0" >
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="estilosadmin.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="icon" href="img/logo.ico">
  </head>

  <!-- Validar si el usuario existe -->
  <?php $usuario = $_GET['user']; $contrasena = $_GET['pass'];
      require_once ("php\conexion.php");
      $conexion = conectarBD();
      require_once('validaUsuario.php');
      validaUsuario($usuario, $contrasena, $conexion);
  ?>
  <body>
   
    <!--Navegacion-->
    <nav class=" navbar navbar-expand-md navbar-dark bg-dark fixed-top text-center" id="menu">

      <div class="container">
        <a href="/" class="navbar-brand">
          <img src="img/huevos.png" alt="Huevos Emplumados" width="50px" class="d-inline-block align-top" >
          Panel de Administración de Huevos Emplumados
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#SecondNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="SecondNavbar">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="login.html">Salir</a></li>
          </ul>
          <form class="form-inline">
          <!--  <input type="text" class="form-control" placeholder="Search">
            <button class="btn btn-outline-success" type="button">Search</button>-->
          </form>
        </div>

      </div>
    </nav>


    <!--Fin Navegacion-->

    <header id="home-seccion" class="img-fluid">
      <div class="dark-overlay">
        <div class="p-4">
          <i class="fas fa-certificate"></i>
        </div>
        <div class="container">
          <div class="imagen" id="dos">
              <form class="form2" action="adminCliente.php" method="get">
                 <?php $usuario = $_GET['user']; $contrasena = $_GET['pass']; 
                  echo '<input type="hidden" name="user" value='.$usuario.'>';
                  echo '<input type="hidden" name="pass" value='.$contrasena.'>';
                  ?>
                  <input type="submit" value="Cliente" class="display-4 text-center" role="button" aria-pressed="true" >
              </form>
              <!--<a href="adminCliente.html" class="display-1 text-center"><h1 class="display-4 text-center">Cliente</h1></a>-->
          </div>
          <div class="imagen" id="uno">
              <form class="form2" action="adminIncubadora.php" method="get">
                  <?php $usuario = $_GET['user']; $contrasena = $_GET['pass']; 
                  echo '<input type="hidden" name="user" value='.$usuario.'>';
                  echo '<input type="hidden" name="pass" value='.$contrasena.'>';
                  ?>
                  <input type="submit" value="Incubadora" class="display-4 text-center" role="button" aria-pressed="true">
              </form>
           
            <!--<a href="adminIncubadora.php" class="display-1 text-center"><h1 class="display-4 text-center">Incubadoras</h1></a>-->
          </div>
          </div>
        </div>
    </header>


    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
    <?Php
    
    ?>
</html>

