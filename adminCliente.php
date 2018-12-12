<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Administración</title>
    <meta name="description" content="Aplicacion web de incubadora">
    <meta name="keywords" content="Encubadora, Incubadora, Huevos , Pollos">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0, minimum-scale=1.0" >
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="estilosadminclientes.css">
    <link rel="stylesheet" href="css/animate.css">
    <llink rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
          Panel de Administración de Huevos Emplumados Sección de los Clientes
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#SecondNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="SecondNavbar">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            <form class="form1" action="adminIncubadora.php" method="get">
                 <?php $usuario = $_GET['user']; $contrasena = $_GET['pass']; 
                  echo '<input type="hidden" name="user" value='.$usuario.'>';
                  echo '<input type="hidden" name="pass" value='.$contrasena.'>';
                  ?>
                  <input type="submit" value="Incubadoras" class="nav-item" role="button" aria-pressed="true">
              </form>
            <!--<a class="nav-link" href="adminIncubadora.html">Incubadora</a>-->
            </li>
            <li class="nav-item">
            <form class="form1" action="adminHuevo.php" method="get">
                 <?php $usuario = $_GET['user']; $contrasena = $_GET['pass']; 
                  echo '<input type="hidden" name="user" value='.$usuario.'>';
                  echo '<input type="hidden" name="pass" value='.$contrasena.'>';
                  ?>
                  <input type="submit" value="Huevos" class="nav-item" role="button" aria-pressed="true">
              </form>
            <!--<a class="nav-link" href="adminHuevo.html">Huevos</a>-->
            </li>
            <li class="nav-item">
            <form class="form1" action="adminSensor.php" method="get">
                 <?php $usuario = $_GET['user']; $contrasena = $_GET['pass']; 
                  echo '<input type="hidden" name="user" value='.$usuario.'>';
                  echo '<input type="hidden" name="pass" value='.$contrasena.'>';
                  ?>
                  <input type="submit" value="Sensor" class="nav-item" role="button" aria-pressed="true">
              </form>
            <!--<a class="nav-link" href="adminIncubadora.html">Incubadoras</a>-->
            </li>
            <li class="nav-item">
            <form class="form2" action="admin.php" method="get">
                 <?php $usuario = $_GET['user']; $contrasena = $_GET['pass']; 
                  echo '<input type="hidden" name="user" value='.$usuario.'>';
                  echo '<input type="hidden" name="pass" value='.$contrasena.'>';
                  ?>
                  <input type="submit" value="Salir" class="nav-item" role="button" aria-pressed="true">
              </form>
            <!--<a class="nav-link" href="admin.html">Salir</a>-->
            </li>
          </ul>
          <form class=" form-inline">
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

        <ul class="nav nav-pills mb-3 text-center fixed" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-AgregarCliente-tab" data-toggle="pill" href="#pills-AgregarCliente" role="tab" aria-controls="pills-AgregarCliente" aria-selected="true">Agregar Cliente</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-MostrarCliente-tab" data-toggle="pill" href="#pills-MostrarCliente" role="tab" aria-controls="pills-MostrarCliente" aria-selected="false">Mostrar Cliente</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-ModificarCliente-tab" data-toggle="pill" href="#pills-ModificarCliente" role="tab" aria-controls="pills-ModificarCliente" aria-selected="false">Modificar Cliente</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-EliminarCliente-tab" data-toggle="pill" href="#pills-EliminarCliente" role="tab" aria-controls="pills-EliminarCliente" aria-selected="false">Eliminar Cliente</a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">

          <!--inicio del formulario Agregar cliente-->
          <div class="tab-pane fade show active" id="pills-AgregarCliente" role="tabpanel" aria-labelledby="pills-AgregarCliente-tab">
            <form action="php\agregarCliente.php" method="get">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" name="nombreCliente" placeholder="Nombre">
                  <label for="apellidopaterno">Apellido Paterno</label>
                  <input type="text" class="form-control" name="apellidoPaterno" placeholder="Apelllido Paterno">
                  <label for="apellidomaterno">Apellido Materno</label>
                  <input type="text" class="form-control" name="apellidoMaterno" placeholder="Apelllido Materno">
                  <label for="telefono">Tel&eacute;fono</label>
                  <input type="text" class="form-control" name="telefono" placeholder="Telefono">
                  <label for="direccion">Direcci&oacute;n</label>
                  <input type="text" class="form-control" name="direccion" placeholder="Direcci&oacute;n">
                  <?php $usuario = $_GET['user']; $contrasena = $_GET['pass']; 
                    echo '<input type="hidden" name="user" value='.$usuario.'>';
                    echo '<input type="hidden" name="pass" value='.$contrasena.'>';
                  ?>
                  <input type="submit" name="" value="Agregar Cliente" class="btn btn-primary" style="margin:10px;" id="agregarclienteboton">
                </div>
                <div class="form-group col-md-6">
                  <div class="container">
                      <h1 class="display-2 text-center">Panel de Administración</h1>
                      <h2 class="display-3 text-center">(Clientes)</h2>
                  </div>

              </div>
              </div>
            </form>
          
          </div>
          <!--Fin del formulario Agregar cliente-->

          <!--inicio del formulario Mostrar cliente-->
          <div class="tab-pane fade" id="pills-MostrarCliente" role="tabpanel" aria-labelledby="pills-MostrarCliente-tab">
            <form class="form-inline">
              <div class="form-row">
                <div class="form-group col-md-6">
                 <form  action="" id="buscarCliente" method="get">
                  <label for="buscaridclienteselect">Buscar</label>
                  <select class="form-control" id="buscaridclienteselect" name="buscarCliente">
                    <option value="idcliente">ID</option>
                    <option value="nombre">NOMBRE</option>
                    <option value="apellidopaterno">APELLIDO PATERNO</option>
                    <option value="apellidomaterno">APELLIDO MATERNO</option>
                    <option value="telefono">TELÉFONO</option>
                    <option value="domicilio">DIRECCIÓN</option>
                    <option value="diaingreso">INGRESO CLIENTE</option>
                  </select>
                    <input type="text" class="form-control" placeholder="Dato que desea buscar" name="datoBuscar" id="datoBuscarCliente">
                    <?php $usuario = $_GET['user']; $contrasena = $_GET['pass']; 
                        $etiqueta = true;
                        echo '<input type="hidden" name="etiquetaMostrar" value='.$etiqueta.'>';   
                        echo '<input type="hidden" name="user" value='.$usuario.'>';
                        echo '<input type="hidden" name="pass"  value='.$contrasena.'>';
                    ?>
                    <button class="btn btn-outline-success" type="submit" id="buscaridclienteboton">Buscar</button>
                 </form>
                 <form  action="" id="mostrarClienteF" method="get">
                    <?php $usuario = $_GET['user']; $contrasena = $_GET['pass']; 
                        $etiqueta = true;
                        echo '<input type="hidden" name="etiquetaMostrar2" value='.$etiqueta.'>';
                        echo '<input type="hidden" name="user" value='.$usuario.'>';
                        echo '<input type="hidden" name="pass"  value='.$contrasena.'>';
                    ?>
                     <button class="btn btn-outline-success" type="submit" id="buscaridclientebotonCancelar">Cancelar Busqueda</button>
                 </form>
                </div>
                <div class="form-group col-sm-12 ">
                  <table class="table table-bordered table-responsive-sm" style="background-color:rgba(64, 25, 66, 0.84);" id="tablamostrarcliente">
                    <!--<thead>-->
                    
                    <?php
                      require_once ("php\conexion.php");
                      $conexion = conectarBD();
                      if( @$_GET['etiquetaMostrar'] )  {
                          //$usuario = $_GET['user'];
                          //$contrasena = $_GET['pass'];
                          $buscarCliente = $_GET['buscarCliente'];
                          $datoBuscar = $_GET['datoBuscar'];
                          $sql = "SELECT * FROM cliente WHERE ".$buscarCliente." = '".$datoBuscar."' and valido=true";
                          $ok = true;
                          $rs = pg_query( $conexion, $sql );
                          if( $rs )   {
                              if( pg_num_rows($rs) > 0 ) {
                                  echo "<tr>
                                  <th>ID</th>
                                  <th>NOMBRE</th>
                                  <th>APELLIDO PATERNO</th>
                                  <th>APELLIDO MATERNO</th>
                                  <th>TEL&Eacute;FONO</th>
                                  <th>DIRECCI&Oacute;N</th>
                                  <th>INGRESO CLIENTE</th>
                                  </tr>";
                                  //$json;
                                  //$obj = pg_fetch_object($rs);
                                  while( $obj = pg_fetch_object($rs) )    {
                                      echo "<tr>
                                      <th>".$obj->idcliente."</th>
                                      <th>".$obj->nombre."</th>
                                      <th>".$obj->apellidopaterno."</th>
                                      <th>".$obj->apellidomaterno."</th>
                                      <th>".$obj->telefono."</th>
                                      <th>".$obj->domicilio."</th>
                                      <th>".$obj->diaingreso."</th>
                                      </tr>";
                                      //$json['cliente'][] = $obj;
                                  }
                                  //echo json_encode($json);
                                  //return json_encode($json);
                              }
                              else
                                  echo "<p>No se encontraron personas</p>";
                          }
                          else
                              $ok = false;
                          echo '<script>var elemento = document.getElementById("pills-MostrarCliente-tab"); elemento.className = "nav-link active";';
                          echo 'var elemento2 = document.getElementById("pills-AgregarCliente-tab"); elemento2.className = "nav-link";';
                          echo 'var elemento3 = document.getElementById("pills-MostrarCliente"); elemento3.className = "tab-pane fade show active";';
                          echo 'var elemento4 = document.getElementById("pills-AgregarCliente"); elemento4.className = "tab-pane fade";</script>';
                      } else    {
                          require_once ("php\mostrarCliente.php");
                          mostrarCliente($conexion);
                      }
                    ?>
                    
                    <?php
                      require_once ("php\conexion.php");
                      $conexion = conectarBD();
                      if( @$_GET['etiquetaMostrar2'] )    {
                          $bandera = $_GET['etiquetaMostrar2'];
                          //require_once ("php\mostrarCliente.php");
                          //mostrarCliente($conexion);
                          echo '<script>var elemento = document.getElementById("pills-MostrarCliente-tab"); elemento.className = "nav-link active";';
                          echo 'var elemento2 = document.getElementById("pills-AgregarCliente-tab"); elemento2.className = "nav-link";';
                          echo 'var elemento3 = document.getElementById("pills-MostrarCliente"); elemento3.className = "tab-pane fade show active";';
                          echo 'var elemento4 = document.getElementById("pills-AgregarCliente"); elemento4.className = "tab-pane fade";</script>';
                      }
                      ?>
                    
                    </table>
                </div>
              </div>
            </form>
          </div>
          <!--Fin del formulario Mostrar cliente-->

          <!--inicio del formulario Modificar cliente-->
          <div class="tab-pane fade" id="pills-ModificarCliente" role="tabpanel" aria-labelledby="pills-ModificarCliente-tab">
            <form>
              <div class="form-row">
                <div class="form-group col-md-3">
                 <form action="" id="buscarModificarCliente" method="GET">
                  <label for="buscaridclienteselect">Buscar</label>
                  <select class="form-control" id="buscaridclienteselect" name="buscarCliente">
                    <option value="idcliente">ID</option>
                    <option value="nombre">NOMBRE</option>
                    <option value="apellidopaterno">APELLIDO PATERNO</option>
                    <option value="apellidomaterno">APELLIDO MATERNO</option>
                    <option value="telefono">TELÉFONO</option>
                    <option value="domicilio">DIRECCIÓN</option>
                    <option value="diaingreso">INGRESO CLIENTE</option>
                  </select>
                    <input type="text" class="form-control" placeholder="Dato que desea buscar" name="datoBuscar" id="datoBuscarCliente">
                    <?php $usuario = $_GET['user']; $contrasena = $_GET['pass']; 
                        $etiqueta = true;
                        echo '<input type="hidden" name="etiquetaModificar" value='.$etiqueta.'>';
                        echo '<input type="hidden" name="user" value='.$usuario.'>';
                        echo '<input type="hidden" name="pass"  value='.$contrasena.'>';
                    ?>
                    <button class="btn btn-outline-success" type="submit" id="buscaridclienteboton">Buscar</button>
                 </form>
                 
                 
                 
                </div>
                

               <form action="php\modificarCliente.php" id="ModificarCliente" method="get">
                <!--<div class="form-group col-md-6">-->
                  <label for="nombreModificar">Nombre</label>
                  <input type="text" class="form-control" id="nombreclienteModificar" name="nombre" placeholder="Nombre">
                  <label for="apellidopaternoModificar">Apellido Paterno</label>
                  <input type="text" class="form-control" id="apellidopaternoModificar" name="apellidoPaterno" placeholder="Apelllido Paterno">
                  <label for="apellidomaternoModificar">Apellido Materno</label>
                  <input type="text" class="form-control" id="apellidomaternoModificar" name="apellidoMaterno" placeholder="Apelllido Materno">
                <!--</div>
                <div class="form-group col-md-6">-->
                  <label for="telefonoModificar">Tel&eacute;fono</label>
                  <input type="text" class="form-control" id="telefonoModificar" name="telefono" placeholder="Telefono">
                  <label for="direccionModificar">Direcci&oacute;n</label>
                  <input type="text" class="form-control" id="direccionModificar" name="domicilio" placeholder="Direcci&oacute;n">
                  <label for="ingresohuevosmodificar">Ingreso cliente</label>
                  <input type="text" class="form-control" id="ingresoclientemodificar" name="diaIngreso" placeholder="Ingreso Cliente">
                  <input type="hidden" id="idclientemodificar" name="idCliente" ><br>
                  <?php $usuario = $_GET['user']; $contrasena = $_GET['pass']; 
                        echo '<input type="hidden" name="user" value='.$usuario.'>';
                        echo '<input type="hidden" name="pass"  value='.$contrasena.'>';
                    ?>
                  <input type="submit" name="" value="Modificar" class="btn btn-primary" style="margin:10px;" id="ModificarClienteboton">
                <!--</div>-->
               </form>
                

                <div class="form-group col-sm-12 ">
                  <table class="table table-bordered table-responsive-sm" style="background-color:rgba(64, 25, 66, 0.84);" id="tablamostrarcliente">
                    <!--<thead>-->
                    
                    <?php
                      
                      require_once ("php\conexion.php");
                      $conexion = conectarBD();
                      if( $_GET['etiquetaModificar'] )  {
                          
                          //$usuario = $_GET['user'];
                          //$contrasena = $_GET['pass'];
                          $buscarCliente = $_GET['buscarCliente'];
                          $datoBuscar = $_GET['datoBuscar'];
                          $sql = "SELECT * FROM cliente WHERE ".$buscarCliente." = '".$datoBuscar."' and valido=true";
                          $ok = true;
                          $rs = pg_query( $conexion, $sql );
                          if( $rs )   {
                              if( pg_num_rows($rs) > 0 ) {
                                  echo "<tr>
                                  <th>ID</th>
                                  <th>NOMBRE</th>
                                  <th>APELLIDO PATERNO</th>
                                  <th>APELLIDO MATERNO</th>
                                  <th>TEL&Eacute;FONO</th>
                                  <th>DIRECCI&Oacute;N</th>
                                  <th>INGRESO CLIENTE</th>
                                  </tr>";
                                  //$json;
                                  //$obj = pg_fetch_object($rs);
                                  while( $obj = pg_fetch_object($rs) )    {
                                      echo "<tr>
                                      <th>".$obj->idcliente."</th>
                                      <th>".$obj->nombre."</th>
                                      <th>".$obj->apellidopaterno."</th>
                                      <th>".$obj->apellidomaterno."</th>
                                      <th>".$obj->telefono."</th>
                                      <th>".$obj->domicilio."</th>
                                      <th>".$obj->diaingreso."</th>
                                      </tr>";
                                      echo '<script>';
                                      echo 'document.getElementById("nombreclienteModificar").value = "'.$obj->nombre.'";';
                                      echo 'document.getElementById("apellidopaternoModificar").value = "'.$obj->apellidopaterno.'";';
                                      echo 'document.getElementById("apellidomaternoModificar").value = "'.$obj->apellidomaterno.'";';
                                      echo 'document.getElementById("telefonoModificar").value = "'.$obj->telefono.'";';
                                      echo 'document.getElementById("direccionModificar").value = "'.$obj->domicilio.'";';
                                      echo 'document.getElementById("ingresoclientemodificar").value = "'.$obj->diaingreso.'";';
                                      echo 'document.getElementById("idclientemodificar").value = "'.$obj->idcliente.'";';
                                      echo '</script>';
                                      //$json['cliente'][] = $obj;
                                  }
                                  //echo json_encode($json);
                                  //return json_encode($json);
                              }
                              else
                                  echo "<p>No se encontraron personas</p>";
                          }
                          else
                              $ok = false;
                          echo '<script>var elemento = document.getElementById("pills-ModificarCliente-tab"); elemento.className = "nav-link active";';
                          echo 'var elemento2 = document.getElementById("pills-AgregarCliente-tab"); elemento2.className = "nav-link";';
                          echo 'var elemento3 = document.getElementById("pills-ModificarCliente"); elemento3.className = "tab-pane fade show active";';
                          echo 'var elemento4 = document.getElementById("pills-AgregarCliente"); elemento4.className = "tab-pane fade";</script>';
                      } else    {
                          require_once ("php\mostrarCliente.php");
                          mostrarCliente($conexion);
                      }
                      
                    ?>
                    
                    <?php
                      require_once ("php\conexion.php");
                      $conexion = conectarBD();
                      if( @$_GET['etiquetaModificar2'] )    {
                          $bandera = $_GET['etiquetaModificar2'];
                          //require_once ("php\mostrarCliente.php");
                          //mostrarCliente($conexion);
                          echo '<script>var elemento = document.getElementById("pills-ModificarCliente-tab"); elemento.className = "nav-link active";';
                          echo 'var elemento2 = document.getElementById("pills-AgregarCliente-tab"); elemento2.className = "nav-link";';
                          echo 'var elemento3 = document.getElementById("pills-ModificarCliente"); elemento3.className = "tab-pane fade show active";';
                          echo 'var elemento4 = document.getElementById("pills-AgregarCliente"); elemento4.className = "tab-pane fade";</script>';
                      }
                      ?>
                    
                    <!--<tr>
                      <th>ID</th>
                      <th>NOMBRE</th>
                      <th>APELLIDO PATERNO</th>
                      <th>APELLIDO MATERNO</th>
                      <th>TEL&Eacute;FONO</th>
                      <th>NO. HUEVOS</th>
                      <th>INGRESO HUEVOS</th>
                      <th>DIRECCI&Oacute;N</th>
                    </tr>-->
                    </table>
                </div>
              </div>
            </form>
          </div>
          <!--Fin del formulario Modificar cliente-->

          <!--inicio del formulario Eliminar cliente-->
          <div class="tab-pane fade" id="pills-EliminarCliente" role="tabpanel" aria-labelledby="pills-EliminarCliente-tab">
            <form>
              <div class="form-row">
                <div class="form-group col-md-3">
                 <form action="" id="buscarEliminarCliente" method="GET">
                  <label for="buscaridclienteselect">Buscar</label>
                  <select class="form-control" id="buscarclienteselect" name="buscarCliente">
                    <option value="idcliente">ID</option>
                    <option value="nombre">NOMBRE</option>
                    <option value="apellidopaterno">APELLIDO PATERNO</option>
                    <option value="apellidomaterno">APELLIDO MATERNO</option>
                    <option value="telefono">TELÉFONO</option>
                    <option value="domicilio">DIRECCIÓN</option>
                    <option value="diaingreso">INGRESO CLIENTE</option>
                  </select>
                    <input type="text" class="form-control" placeholder="Dato que desea buscar" name="datoBuscar" id="datoBuscarCliente">
                    <?php $usuario = $_GET['user']; $contrasena = $_GET['pass']; 
                        $etiqueta = true;
                        echo '<input type="hidden" name="etiquetaEliminar" value='.$etiqueta.'>';
                        echo '<input type="hidden" name="user" value='.$usuario.'>';
                        echo '<input type="hidden" name="pass"  value='.$contrasena.'>';
                    ?>
                    <button class="btn btn-outline-success" type="submit" id="buscaridclienteboton">Buscar</button>
                 </form>
                </div>

                <form action="php\eliminarCliente.php" id="EliminarCliente" method="get">
                <!--<div class="form-group col-md-6">-->
                  <label for="nombreModificar">Nombre</label>
                  <input type="text" class="form-control" id="nombreclienteEliminar" name="nombre" placeholder="Nombre">
                  <label for="apellidopaternoModificar">Apellido Paterno</label>
                  <input type="text" class="form-control" id="apellidopaternoEliminar" name="apellidoPaterno" placeholder="Apelllido Paterno">
                  <label for="apellidomaternoModificar">Apellido Materno</label>
                  <input type="text" class="form-control" id="apellidomaternoEliminar" name="apellidoMaterno" placeholder="Apelllido Materno">
                <!--</div>
                <div class="form-group col-md-6">-->
                  <label for="telefonoModificar">Tel&eacute;fono</label>
                  <input type="text" class="form-control" id="telefonoEliminar" name="telefono" placeholder="Telefono">
                  <label for="direccionModificar">Direcci&oacute;n</label>
                  <input type="text" class="form-control" id="direccionEliminar" name="domicilio" placeholder="Direcci&oacute;n">
                  <label for="ingresohuevosmodificar">Ingreso cliente</label>
                  <input type="text" class="form-control" id="ingresoclienteEliminar" name="diaIngreso" placeholder="Ingreso Cliente">
                  <input type="hidden" id="idclienteEliminar" name="idCliente" ><br>
                  <?php $usuario = $_GET['user']; $contrasena = $_GET['pass']; 
                        echo '<input type="hidden" name="user" value='.$usuario.'>';
                        echo '<input type="hidden" name="pass"  value='.$contrasena.'>';
                    ?>
                  <input type="submit" name="" value="Eliminar" class="btn btn-primary" style="margin:10px;" id="EliminarClienteboton">
                <!--</div>-->
               </form>

                <div class="form-group col-sm-12 ">
                  <table class="table table-bordered table-responsive-sm" style="background-color:rgba(64, 25, 66, 0.84);" id="tablamostrarcliente">
                    
                    <?php
                      
                      require_once ("php\conexion.php");
                      $conexion = conectarBD();
                      if( $_GET['etiquetaEliminar'] )  {
                          
                          //$usuario = $_GET['user'];
                          //$contrasena = $_GET['pass'];
                          $buscarCliente = $_GET['buscarCliente'];
                          $datoBuscar = $_GET['datoBuscar'];
                          $sql = "SELECT * FROM cliente WHERE ".$buscarCliente." = '".$datoBuscar."' and valido=true";
                          $ok = true;
                          $rs = pg_query( $conexion, $sql );
                          if( $rs )   {
                              if( pg_num_rows($rs) > 0 ) {
                                  echo "<tr>
                                  <th>ID</th>
                                  <th>NOMBRE</th>
                                  <th>APELLIDO PATERNO</th>
                                  <th>APELLIDO MATERNO</th>
                                  <th>TEL&Eacute;FONO</th>
                                  <th>DIRECCI&Oacute;N</th>
                                  <th>INGRESO CLIENTE</th>
                                  </tr>";
                                  //$json;
                                  //$obj = pg_fetch_object($rs);
                                  while( $obj = pg_fetch_object($rs) )    {
                                      echo "<tr>
                                      <th>".$obj->idcliente."</th>
                                      <th>".$obj->nombre."</th>
                                      <th>".$obj->apellidopaterno."</th>
                                      <th>".$obj->apellidomaterno."</th>
                                      <th>".$obj->telefono."</th>
                                      <th>".$obj->domicilio."</th>
                                      <th>".$obj->diaingreso."</th>
                                      </tr>";
                                      echo '<script>';
                                      echo 'document.getElementById("nombreclienteEliminar").value = "'.$obj->nombre.'";';
                                      echo 'document.getElementById("apellidopaternoEliminar").value = "'.$obj->apellidopaterno.'";';
                                      echo 'document.getElementById("apellidomaternoEliminar").value = "'.$obj->apellidomaterno.'";';
                                      echo 'document.getElementById("telefonoEliminar").value = "'.$obj->telefono.'";';
                                      echo 'document.getElementById("direccionEliminar").value = "'.$obj->domicilio.'";';
                                      echo 'document.getElementById("ingresoclienteEliminar").value = "'.$obj->diaingreso.'";';
                                      echo 'document.getElementById("idclienteEliminar").value = "'.$obj->idcliente.'";';
                                      echo '</script>';
                                      //$json['cliente'][] = $obj;
                                  }
                                  //echo json_encode($json);
                                  //return json_encode($json);
                              }
                              else
                                  echo "<p>No se encontraron personas</p>";
                          }
                          else
                              $ok = false;
                          echo '<script>var elemento = document.getElementById("pills-EliminarCliente-tab"); elemento.className = "nav-link active";';
                          echo 'var elemento2 = document.getElementById("pills-AgregarCliente-tab"); elemento2.className = "nav-link";';
                          echo 'var elemento3 = document.getElementById("pills-EliminarCliente"); elemento3.className = "tab-pane fade show active";';
                          echo 'var elemento4 = document.getElementById("pills-AgregarCliente"); elemento4.className = "tab-pane fade";</script>';
                      } else    {
                          require_once ("php\mostrarCliente.php");
                          mostrarCliente($conexion);
                      }
                      
                    ?>
                    
                    <?php
                      require_once ("php\conexion.php");
                      $conexion = conectarBD();
                      if( @$_GET['etiquetaEliminar2'] )    {
                          $bandera = $_GET['etiquetaEliminar2'];
                          //require_once ("php\mostrarCliente.php");
                          //mostrarCliente($conexion);
                          echo '<script>var elemento = document.getElementById("pills-EliminarCliente-tab"); elemento.className = "nav-link active";';
                          echo 'var elemento2 = document.getElementById("pills-AgregarCliente-tab"); elemento2.className = "nav-link";';
                          echo 'var elemento3 = document.getElementById("pills-EliminarCliente"); elemento3.className = "tab-pane fade show active";';
                          echo 'var elemento4 = document.getElementById("pills-AgregarCliente"); elemento4.className = "tab-pane fade";</script>';
                      }
                      ?>
                    </table>
                </div>
              </div>
            </form>
          </div>
          <!--Fin del formulario Eliminar cliente-->
        </div>
        </div>
    </div>
</header>

    <?php
      // Sale mensaje a recargar
      $opcion = @$_GET['opcion'];
      if($opcion == 1)  {
          echo "<script>";
          echo "alert('Cliente agregado');";
          echo "</script>";
      } else if($opcion == 2)   {
          echo "<script>";
          echo "alert('Cliente modificado');";
          echo "</script>";
          /*echo 'var elemento = document.getElementById("pills-MostrarCliente-tab"); elemento.className = "nav-link active";';
          echo 'var elemento2 = document.getElementById("pills-AgregarCliente-tab"); elemento2.className = "nav-link";';
          echo 'var elemento3 = document.getElementById("pills-MostrarCliente"); elemento3.className = "tab-pane fade show active";';
          echo 'var elemento4 = document.getElementById("pills-AgregarCliente"); elemento4.className = "tab-pane fade";';*/
          
      } else if($opcion == 3)   {
          echo "<script>";
          echo "alert('Cliente eliminado');";
          echo "</script>";
          
      } else if($opcion == -1)   {
          echo "<script>";
          echo "alert('Error en la consulta');";
          //echo 'open(document.getElementById("pills-MostrarCliente-tab"));';
          echo "</script>";
          
      }
      ?>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
