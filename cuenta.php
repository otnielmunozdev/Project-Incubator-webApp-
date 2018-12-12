
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/bootstrap.css">

<title>Home</title>
<link rel="icon" href="img/logo.ico">
<style>
  body {
      font-family: 'Lato', sans-serif;
      background-color: rgb(0, 0, 0);

  }

  .overlay {
      height: 100%;
      width: 0;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: rgb(0,0,0);
      background-color: rgba(0,0,0, 0.9);
      overflow-x: hidden;
      transition: 0.5s;
  }

  .overlay-content {
      position: relative;
      top: 25%;
      width: 100%;
      text-align: center;
      margin-top: 30px;
  }

  .overlay a {
      padding: 8px;
      text-decoration: none;
      font-size: 36px;
      color: #818181;
      display: block;
      transition: 0.3s;
  }

  .overlay a:hover, .overlay a:focus {
      color: #f1f1f1;
  }

  .overlay .closebtn {
      position: absolute;
      top: 20px;
      right: 45px;
      font-size: 60px;
  }

  @media screen and (max-height: 450px) {
    .overlay a {font-size: 20px}
    .overlay .closebtn {
      font-size: 40px;
      top: 15px;
      right: 35px;
    }
  }
  #menuderecho{
    margin-top: 40px;
    width: 50%;
    color: rgb(255, 255, 255);

  }
  #myNav{
    margin-top: 40px;
  }
  section .container {
    color:#ffffff;
  }




</style>
</head>

<?php $codigo = $_GET['codigo'];
        require_once ("php\conexion.php");
        $conexion = conectarBD();
        require_once('validarUsuarioC.php');
        validaUsuarioC($codigo, $conexion);
    ?>

<body>


  <div id="myNav" class="overlay">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div class="overlay-content">
            <form class="form2" action="informacion.php" method="get">
                 <?php $codigo = $_GET['codigo'];
                  echo '<input type="hidden" name="codigo" value='.$codigo.'>';
                  ?>
                  <input type="submit" value="Informacion" class="display-4 text-center" role="button" aria-pressed="true">
                  <!--<a href="" type="submit"><i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> Informaci&oacute;n</a>-->
            </form>
      <a href="index.html" class="btn-exit-system"> Salir <br> <i class="zmdi zmdi-power"></i></a>
    </div>
  </div>

    <div  id="menuderecho">
      <span style="font-size:30px;cursor:pointer" onclick="openNav()" >&#9776; Menu</span>
    </div>

    <!-- Content page-->
  	<section class="container" >
      <div class="dark-overlay">

      </div>
  		<!-- Content page -->
  		<div class="container-fluid">
  			<div class="page-header ">
  			  <h1 class="text-titles text-center" style="color:rgb(208, 156, 22);">Informaci&oacute;n del Cliente</h1>
  			</div>
      </div>

  <div class="container card-body  text-center" style="border-radius:20px; background: -moz-linear-gradient(left, rgba(183,222,237,0.6) 0%, rgba(167,218,237,0.6) 2%, rgba(113,206,239,0.6) 9%, rgba(33,180,226,0.6) 55%, rgba(183,222,237,0.6) 99%, rgba(183,222,237,0.6) 100%);">
      <div class="datos">
      
      <?php                 
                      require_once ("php\conexion.php");
                      $codigo = $_GET['codigo'];

                      $conexion = conectarBD();
                      $conexion2  = conectarBD();
                      if( $_GET['codigo'] )  {

                          $sql = "SELECT * FROM agregar_huevo WHERE idIncubadora = ".$codigo." ";

                          $rs = mysqli_query( $conexion, $sql );
                          if( $rs )   {

                            $sql2 = "SELECT  agregar_huevo.idCliente, agregar_huevo.idIncubadora , cliente.nombre, cliente.domicilio,cliente.telefono, cliente.diaIngreso , 
                            cliente.idCliente FROM agregar_huevo INNER JOIN cliente  ON agregar_huevo.idCliente = cliente.idCliente  
                            WHERE agregar_huevo.idIncubadora = ".$codigo." ";
                            $ok2 = true;
                            $rs2 = mysqli_query( $conexion2, $sql2 );

                            if( $rs2 )   {
                              while($mostrar = mysqli_fetch_array($rs2)){
                                echo "<span>Nombre: </span>";
                                echo $mostrar['nombre']; echo "<br><br>";
                                echo "<span>Domicilio: </span>";
                                echo $mostrar['domicilio']; echo "<br><br>";
                                echo "<span>Telefono: </span>";
                                echo $mostrar['telefono']; echo "<br><br>";
                                echo "<span>Dia de Ingreso: </span>";
                                echo $mostrar['diaIngreso']; echo "<br><br>";
                                
                              }
                            }
                            else 
                            {echo("No se puede ejecutar la consulta");}
                          }
                          else{
                              echo("No se puede ejecutar la consulta");
                              $ok = false;
                              $ok2 = false;
                            }
                      }
                    ?>

  	
     
                
                 
                     <!--span>Nombre:</span><br><br-->
                     <!--span>Domicilio: <?php //echo $mostrar['domicilio']?></span><br><br-->
                     <!--span>Telefono: <?php //echo $mostrar['telefono']?></span><br><br-->
                     <!--span>Fecha de Ingreso: <?php //echo $mostrar['diaIngreso']?> </span><br><br-->
              </div>
  			
        </div>



  		<!-- Content page -->
  		<div class="container-fluid">
  			<div class="page-header">
  			  <h1 class="text-titles text-center" style="color:rgb(208, 156, 22);">Informaci&oacute;n de la Incubadora</h1>
  			</div>
  		</div>

  	<div class="container card-body text-center" style="border-radius:20px; background: -moz-linear-gradient(left, rgba(193,70,161,0.6) 3%, rgba(193,70,161,0.6) 14%, rgba(168,0,119,0.6) 53%, rgba(203,96,179,0.6) 97%, rgba(219,54,164,0.6) 100%);">
  			<div class="datos">
        <?php                 
                      require_once ("php\conexion.php");
                      require_once ("php\conexionMovil.php");
                      $codigo = $_GET['codigo'];

                      $conexion = conectarBD();
                      $conexion2  = conectarBD();
                      $conexion3  = conectarBDM();
                      $conexion4 = conectarBDM();
                      if( $_GET['codigo'] )  {

                          $sql = "SELECT * FROM agregar_huevo WHERE idIncubadora = ".$codigo." ";

                          $rs = mysqli_query( $conexion, $sql );
                          if( $rs )   {

                            $sql2 = "SELECT agregar_huevo.idHuevo, huevo.humedadUltimoDia, huevo.tipoHuevo, huevo.idHuevo 
                            FROM  incubadora.agregar_huevo
                            INNER JOIN  proyectosd.huevo  ON huevo.idHuevo=agregar_huevo.idHuevo 
                            WHERE agregar_huevo.idIncubadora = ".$codigo."  ";

                            $sql3 = "SELECT agregar_huevo.idHuevo, rango_huevo.temperaturaActual, rango_huevo.temperaturaRecomendada,
                            rango_huevo.humedadRecomendada , rango_huevo.idHuevo FROM  incubadora.agregar_huevo 
                            INNER JOIN  proyectosd.rango_huevo  ON agregar_huevo.idHuevo=rango_huevo.idHuevo 
                            WHERE agregar_huevo.idIncubadora = ".$codigo." ORDER BY idRangoHuevo DESC LIMIT 0,1 ";
                            
                            $ok2 = true;
                            $rs2 = mysqli_query( $conexion3, $sql2 );
                            $rs3 = mysqli_query($conexion3,$sql3);

                            if( $rs2 && $rs3)   {
                              while($mostrar = mysqli_fetch_array($rs2)){
                               
                                echo "<span>Humedad Actual: </span>";
                                echo $mostrar['humedadUltimoDia']; echo "<br><br>";
                                echo "<span>Tipo de Huevo: </span>";
                                echo $mostrar['tipoHuevo']; echo "<br><br>";
                                
                                
                              }

                              while($mostrar2 = mysqli_fetch_array($rs3)){
                                echo "<span>Temperatura Actual: </span>";
                                echo $mostrar2['temperaturaActual']; echo "<br><br>";
                                echo "<span>Temperatura Recomendada: </span>";
                                echo $mostrar2['temperaturaRecomendada']; echo "<br><br>";
                                echo "<span>Humedad Recomendada: </span>";
                                echo $mostrar2['humedadRecomendada']; echo "<br><br>";
                                
                                
                              }
                            }
                            else 
                            {echo("No se puede ejecutar la consulta");}
                          }
                          else{
                              echo("No se puede ejecutar la consulta");
                              $ok = false;
                              $ok2 = false;
                            }
                      }
                    ?>
  				<!--span>Estado:</span><br><br>
  				<span>Temperatura Actual:</span><br><br>
  				<span>Temperatura recomendada:</span><br><br>
  				<span>Humedad Actual:</span><br><br>
  				<span>Humedad recomendada:</span><br><br>
  				<span>Tipo de Huevo: </span><br><br-->
  			</div>
  		</div>
  		</section>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
    function openNav() {
      document.getElementById("myNav").style.width = "100%";
    }

    function closeNav() {
      document.getElementById("myNav").style.width = "0%";
    }
    </script>


</body>
</html>
