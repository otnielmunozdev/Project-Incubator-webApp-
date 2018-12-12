<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Administración</title>
    <meta name="description" content="Aplicacion web de incubadora">
    <meta name="keywords" content="Encubadora, Incubadora, Huevos , Pollos">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0, minimum-scale=1.0" >
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="estilosadminincubadoras.css">
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
          Panel de Administración de Huevos Emplumados Sección de las Incubadoras
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#SecondNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="SecondNavbar">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            <form class="form1" action="adminCliente.php" method="get">
                 <?php $usuario = $_GET['user']; $contrasena = $_GET['pass']; 
                  echo '<input type="hidden" name="user" value='.$usuario.'>';
                  echo '<input type="hidden" name="pass" value='.$contrasena.'>';
                  ?>
                  <input type="submit" value="Clientes" class="nav-item" role="button" aria-pressed="true">
              </form>
            <!--<a class="nav-link" href="adminCliente.html">Clientes</a>-->
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
            <form class="form1" action="admin.php" method="get">
                 <?php $usuario = $_GET['user']; $contrasena = $_GET['pass']; 
                  echo '<input type="hidden" name="user" value='.$usuario.'>';
                  echo '<input type="hidden" name="pass" value='.$contrasena.'>';
                  ?>
                  <input type="submit" value="Salir" class="nav-item" role="button" aria-pressed="true">
              </form>
            <!--<a class="nav-link" href="admin.html">Salir</a>-->
            </li>
          </ul>
          <form class=" fomr-inline">
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

        <ul class="nav nav-pills mb-3 text-center fixed-bottom" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-Agregar-tab" data-toggle="pill" href="#pills-Agregar" role="tab" aria-controls="pills-Agregar" aria-selected="true">Agregar Incubadora</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-Mostrar-tab" data-toggle="pill" href="#pills-Mostrar" role="tab" aria-controls="pills-Mostrar" aria-selected="false" onclick="mostrarDatos('tablamostrarincubadora')">Mostrar Incubadora</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-Modificar-tab" data-toggle="pill" href="#pills-Modificar" role="tab" aria-controls="pills-Modificar" aria-selected="false" onclick="mostrarDatos('tablamodificarincubadora')">Modificar Incubadora</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-Eliminar-tab" data-toggle="pill" href="#pills-Eliminar" role="tab" aria-controls="pills-Eliminar" aria-selected="false" onclick="mostrarDatos('tablaeliminarincubadora')">Eliminar Incubadora</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-AgregarHuevo-tab" data-toggle="pill" href="#pills-AgregarHuevo" role="tab" aria-controls="pills-AgregarHuevo" aria-selected="false">Agregar Huevo a Incubadora</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-EstadoIncubadora-tab" data-toggle="pill" href="#pills-EstadoIncubadora" role="tab" aria-controls="pills-EstadoIncubadora" aria-selected="false" onclick="mostrarDatosHI( 'tablahuevoincubadora' )">Estado de la Incubadora</a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">

          <!--inicio del formulario Agregar incubadora-->
          <div class="tab-pane fade show active" id="pills-Agregar" role="tabpanel" aria-labelledby="pills-Agregar-tab">
            <form>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="tamanoincubadora">Tama&ntilde;o</label>
                  <input type="text" class="form-control" id="tamanoIncubadoraA" placeholder="Tama&ntilde;o de Incubadora">
                  <label for="capacidadmaxima">Capacidad M&aacute;xima</label>
                  <input type="text" class="form-control" id="capacidadMaximaA" placeholder="Capacidad M&aacute;xima">
                  <label for="coigoaceso">Codigo de acceso</label>
                  <input type="text" class="form-control" id="codigoAccesoA" placeholder="Codigo de acceso">
                  <br>
                  <?php $usuario = $_GET['user']; $contrasena = $_GET['pass']; 
                  echo '<input type="hidden" id="userA" value='.$usuario.'>';
                  echo '<input type="hidden" id="passA" value='.$contrasena.'>';
                  ?>
                  
                  <button type="button" class="btn btn-primary" id="agregarincubadora" onclick="agregarDatos( document.getElementById('userA').value, document.getElementById('passA').value, document.getElementById('tamanoIncubadoraA').value, document.getElementById('capacidadMaximaA').value, document.getElementById('codigoAccesoA').value )">Agregar Incubadora</button>
                </div>
                <div class="form-group col-md-6">
                  <div class="container">
                      <h1 class="display-2 text-center">Panel de Administración</h1>
                      <h2 class="display-3 text-center">(Incubadoras)</h2>
                  </div>

                </div>
              </div>

            </form>
          </div>
          <!--Fin del formulario Agregar incubadora-->

          <!--inicio del formulario Mostrar incubadora-->
          <div class="tab-pane fade" id="pills-Mostrar" role="tabpanel" aria-labelledby="pills-Mostrar-tab">
            <form>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="buscaridincubadoraselect">Buscar</label>
                  <select class="form-control" id="buscaridincubadoraselectV">
                    <option value="idincubadora">ID</option>
                    <option value="tamano">TAMANO</option>
                    <option value="capacidadmaxima">CAPACIDAD MAXIMA</option>
                    <option value="codigoacceso">CODIGO ACCESO</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="buscaridincubadora">Search</label>
                  <form class="form-inline">
                    <input type="text" class="form-control" placeholder="Search" id="buscaridincubadoraV">
                    <button class="btn btn-outline-success" type="button" id="buscaridincubadoraboton" onclick="buscarDato('tablamostrarincubadora', document.getElementById('buscaridincubadoraselectV').value, document.getElementById('buscaridincubadoraV').value)">Search</button>
                  </form>
                </div>
                <div class="form-group col-sm-9 ">
                  <table class="table table-bordered table-responsive-sm" style="background-color:rgba(64, 25, 66, 0.84);" id="tablamostrarincubadora">
                    
                    </table>
                </div>
              </div>
            </form>
          </div>
          <!--Fin del formulario Mostrar incubadora-->

          <!--inicio del formulario Modificar incubadora-->
          <div class="tab-pane fade" id="pills-Modificar" role="tabpanel" aria-labelledby="pills-Modificar-tab">
            <form>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="buscaridincubadoraselect">Buscar</label>
                  <select class="form-control" id="buscaridincubadoraselectM">
                    <option value="idincubadora">ID</option>
                    <option value="tamano">TAMANO</option>
                    <option value="capacidadmaxima">CAPACIDAD MAXIMA</option>
                    <option value="codigoacceso">CODIGO ACCESO</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="buscaridincubadora">Search</label>
                  <form class="form-inline">
                    <input type="text" class="form-control" placeholder="Search" id="buscaridincubadoraM">
                    <button class="btn btn-outline-success" type="button" id="buscaridincubadoraboton" onclick="buscarDato('tablamodificarincubadora', document.getElementById('buscaridincubadoraselectM').value, document.getElementById('buscaridincubadoraM').value); mostrarDatosModificar();">Search</button>
                  </form>
                </div>
                <div class="form-group col-md-3">
                  <input type="hidden" id="idIncubadoraM">
                  <label for="tamanoincubadora">Tama&ntilde;o</label>
                  <input type="text" class="form-control" id="tamanoM" placeholder="Tama&ntilde;o de Incubadora">
                  <label for="capacidadmaxima">Capacidad M&aacute;xima</label>
                  <input type="text" class="form-control" id="capacidadMaximaM" placeholder="Capacida M&aacute;xima">
                  <label for="codigoAccesoM">Codigo de acceso</label>
                  <input type="text" class="form-control" id="codigoAccesoM" placeholder="Codigo de acceso">
                  <label for="idHuevoselect">Huevo</label>
                  <select class="form-control" id="idHuevoselect">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                  <input type="button" name="" value="Modificar" class="btn btn-primary" style="margin:10px;" id="modificarincubadoraboton" onclick="modificarIncubadora()">
                </div>

                <div class="form-group col-sm-9 ">
                  <table class="table table-bordered table-responsive-sm" style="background-color:rgba(64, 25, 66, 0.84);" id="tablamodificarincubadora">
                    
                    </table>
                </div>
              </div>
            </form>
          </div>
          <!--Fin del formulario Modificar incubadora-->

          <!--inicio del formulario Eliminar incubadora-->
          <div class="tab-pane fade" id="pills-Eliminar" role="tabpanel" aria-labelledby="pills-Eliminar-tab">
            <form>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="buscaridincubadoraselect">Buscar</label>
                  <select class="form-control" id="buscaridincubadoraselectE">
                    <option value="idincubadora">ID</option>
                    <option value="tamano">TAMANO</option>
                    <option value="capacidadmaxima">CAPACIDAD MAXIMA</option>
                    <option value="codigoacceso">CODIGO ACCESO</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="buscaridincubadora">Search</label>
                  <form class="form-inline">
                    <input type="text" class="form-control" placeholder="Search" id="buscaridincubadoraE">
                    <button class="btn btn-outline-success" type="button" id="buscaridincubadoraboton" onclick="buscarDato('tablaeliminarincubadora', document.getElementById('buscaridincubadoraselectE').value, document.getElementById('buscaridincubadoraE').value); mostrarDatosEliminar();">Search</button>
                  </form>
                </div>
                <div class="form-group col-md-3">
                 <input type="hidden" id="idIncubadoraE">
                  <label for="tamanoincubadora">Tama&ntilde;o</label>
                  <input type="text" class="form-control" id="tamanoE" placeholder="Tama&ntilde;o de Incubadora">
                  <label for="capacidadmaxima">Capacidad M&aacute;xima</label>
                  <input type="text" class="form-control" id="capacidadMaximaE" placeholder="Capacida M&aacute;xima">
                  <label for="codigoAccesoM">Codigo de acceso</label>
                  <input type="text" class="form-control" id="codigoAccesoE" placeholder="Codigo de acceso">
                  <label for="idHuevoselect">Huevo</label>
                  <select class="form-control" id="idHuevoselect">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                  <input type="button" name="" value="Eliminar" class="btn btn-primary" style="margin:10px;" id="eliminarboton" onclick="eliminarIncubadora()">
                </div>

                <div class="form-group col-sm-9 ">
                  <table class="table table-bordered table-responsive-sm" style="background-color:rgba(64, 25, 66, 0.84);" id="tablaeliminarincubadora">
                    
                    </table>
                </div>
              </div>
            </form>
          </div>
          <!--Fin del formulario Eliminar incubadora-->

          <!--inicio del formulario Agregar huevo a incubadora-->
          <div class="tab-pane fade" id="pills-AgregarHuevo" role="tabpanel" aria-labelledby="pills-AgregarHuevo-tab">
            <form>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <form class="form-inline"></form>
                  
                  <label for="search"><strong>CLIENTE</strong></label>
                  <form class="form-inline">
                    <input type="text" class="form-control" placeholder="Buscar por ID" id="idCliente">
                    <button class="btn btn-outline-success" type="button" id="idcliente" onclick="getBusquedaC( 'idCliente',  document.getElementById('idCliente').value)">Search</button>
                  </form>
                  
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" id="nombre" placeholder="Nombre">
                  <label for="apellidopaterno">Apellido Paterno</label>
                  <input type="text" class="form-control" id="apellidoPaterno" placeholder="Apelllido Paterno">
                  <label for="apellidomaterno">Apellido Materno</label>
                  <input type="text" class="form-control" id="apellidoMaterno" placeholder="Apelllido Materno">
                  <label for="telefono">Tel&eacute;fono</label>
                  <input type="text" class="form-control" id="telefono" placeholder="Telefono">
                  <label for="direccion">Direcci&oacute;n</label>
                  <input type="text" class="form-control" id="direccion" placeholder="Direcci&oacute;n">
                  <label for="ingresocliente">Ingreso cliente</label>
                  <input type="text" class="form-control" id="ingresoCliente" name="diaIngreso" placeholder="Ingreso Cliente">
                  <input type="hidden" id="idcliente">
                  
                </div>
                <div class="form-group col-md-4">
                  <label for="buscarhuevos"><strong>HUEVOS</strong></label>
                  <form class="form-inline">
                    <input type="text" class="form-control" placeholder="Buscar por ID" id="idHuevo">
                    <button class="btn btn-outline-success" type="button" id="idhuevoboton" onclick="getBusqueda( 'idHuevo', document.getElementById('idHuevo').value )">Search</button>
                  </form>
                  
                  <label for="tiempoincubacion">Tiempo de incubacion</label>
                  <input type="text" class="form-control" id="tiempoIncubacion" placeholder="Tiempo incubación">
                  <label for="tipohuevo">Tipo huevo</label>
                  <input type="text" class="form-control" id="tipoHuevo" placeholder="Tipo de Huevo">
                  <label for="periodoincubacion">Periodo de incubacion</label>
                  <input type="text" class="form-control" id="periodoIncubacion" placeholder="Periodo de incubacion">
                  <label for="novueltasdias">Numero de vueltas por dia</label>
                  <input type="text" class="form-control" id="noVueltasDia" placeholder="Numero de vueltas por dia">
                  <label for="estacionano">Estacion del año</label>
                  <input type="text" class="form-control" id="estacionAno" placeholder="Estacion del año">
                  <label for="huemedadultimodia">Huemdad en los ultimos dias</label>
                  <input type="text" class="form-control" id="humedadUltimoDia" placeholder="Huemdad en los ultimos dias">
                  
                  <div class="form-group col-md-11">
                  <label for="buscarsensortemperatura">Buscar Sensor Temperatura</label>
                  <select class="form-control" id="tipoSensorT">
                    
                  </select>
                  </div>
                  
                  <label for="rangohuevomax">Rango Maximo de Temperatura</label>
                  <input type="text" class="form-control" id="rangoHuevoMaxT" placeholder="Rango Maximo de temperatura en C°">
                  <label for="rangohuevomin">Rango Minimo de Temperatura</label>
                  <input type="text" class="form-control" id="rangoHuevoMinT" placeholder="Rango Minimo de temperatura en C°">
                  
                  <div class="form-group col-md-11">
                  <label for="buscarsensorhumedad">Buscar Sensor Humedad</label>
                  <select class="form-control" id="tipoSensorH">
                    <option value="idHuevo">ID</option>
                    
                  </select>
                  </div>
                  
                  <label for="rangohuevomax">Rango Maximo de Humedad</label>
                  <input type="text" class="form-control" id="rangoHuevoMaxH" placeholder="Rango Maximo de humedad">
                  <label for="rangohuevomax">Rango Maximo de Humedad</label>
                  <input type="text" class="form-control" id="rangoHuevoMinH" placeholder="Rango Minimo de humedad">
                  
                </div>
                
                <div class="form-group col-md-4">
                  <form class="form-inline"></form>
                  
                  <label for="search"><strong>INCUBADORA</strong></label>
                  <form class="form-inline">
                    <input type="text" class="form-control" placeholder="Buscar por ID" id="idIncubadora">
                    <button class="btn btn-outline-success" type="button" id="idcliente" onclick="getBusquedaI( 'idIncubadora',  document.getElementById('idIncubadora').value)">Search</button>
                  </form>
                  
                  <label for="nohuevos">Numero de huevos</label>
                  <input type="text" class="form-control" id="noHuevos" placeholder="Numero de huevos">
                  <label for="tamano">Tamaño</label>
                  <input type="text" class="form-control" id="tamano" placeholder="Tamaño">
                  <label for="capacidadmaxima">Capacidad Maxima</label>
                  <input type="text" class="form-control" id="capacidadMaxima" placeholder="Capacidad Maxima">
                  <label for="codigoacceso">Codigo de Acceso</label>
                  <input type="text" class="form-control" id="codigoAcceso" placeholder="Codigo de Acceso">
                  
                  <div class="form-group col-md-3">
                    <input type="button" name="" value="Agregar" class="btn btn-primary" style="margin:10px;" id="agregarhuevoincubadoraboton" onclick="agregarHuevoIncubadora( document.getElementById('noHuevos').value, document.getElementById('idIncubadora').value, document.getElementById('idCliente').value, document.getElementById('idHuevo').value )">
                  </div>
                  
                </div>

              </div>
            </form>
          </div>
          <!--Fin del formulario Agregar huevo a incubadora-->


          <!--inicio del formulario Estado incubadora-->
          <div class="tab-pane fade" id="pills-EstadoIncubadora" role="tabpanel" aria-labelledby="pills-EstadoIncubadora-tab">
            <form>
              <div class="form-row">
                <div class="form-group col-md-5">
                  <label for="buscaridincubadoraselect">Buscar</label>
                  <select class="form-control" id="buscaridincubadoraselect">
                    <option value="idincubadora">ID</option>
                    <option value="tamano">TAMANO</option>
                    <option value="capacidadmaxima">CAPACIDAD MAXIMA</option>
                    <option value="codigoacceso">CODIGO ACCESO</option>
                  </select>
                </div>
                <div class="form-group col-md-5">
                  <label for="buscaridincubadora">Search</label>
                  <form class="form-inline">
                    <input type="text" class="form-control" placeholder="Search" id="buscaridincubadora">
                    <button class="btn btn-outline-success" type="button" id="buscaridincubadoraboton">Search</button>
                  </form>
                </div>
                <div class="form-group col-md-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="enUsocheckbox">
                    <label class="form-check-label" for="enUsocheckbox">
                      En Uso
                    </label>
                  </div>
                </div>
                <div class="form-group col-sm-8">
                  <table class="table table-bordered table-responsive-sm" style="background-color:rgba(64, 25, 66, 0.84);" id="tablahuevoincubadora">
                    </table>
                    
                </div>
              </div>
            </form>
          </div>
          <!--Fin del formulario Estado incubadora-->
        </div>
        </div>
    </div>
</header>


    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script>
        var obj, dbParam, xmlhttp, json;
        
        function agregarDatos( user, pass, tamano, capacidadMaxima, codigoAcceso ) {
            obj = { "user":"Andres", "pass":"1111" };
            dbParam = JSON.stringify(obj);

            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    json = this.responseText;
                    console.log("OK");
                    if(json == 1)   {
                        alert('Incubadora Agregada');
                    }
                    else    {
                        alert('Error');
                    }
                }
            };
            
            //xmlhttp.onreadystatechange = miFuncion;
            xmlhttp.open("GET", "php/agregarIncubadora.php?user=" + user+"&pass=" + pass + "&tamano=" + tamano + "&capacidadMaxima=" + capacidadMaxima + "&codigoAcceso=" + codigoAcceso, true);
            xmlhttp.send();
            document.getElementById('tamanoIncubadoraA').value = "";
            document.getElementById('capacidadMaximaA').value = "";
            document.getElementById('codigoAccesoA').value = "";
            
        }
        
        function getDatos(  )     {
            obj = { "user":"Andres", "pass":"1111" };
            dbParam = JSON.stringify(obj);

            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    json = JSON.parse(this.responseText);
                    console.log("OK");
                }
            };
            xmlhttp.open("GET", "php/mostrarIncubadora.php?x=" + dbParam, true);
            xmlhttp.send();
        }

        getDatos();
        function mostrarDatos( tabla ) {
            getDatos();
            var bandera = true;
            console.log(json);
            var tamano = json['incubadora'].length;
            var table = document.getElementById(tabla);
            
            var row;
            var cell1, cell2, cell3, cell4;

            if(table.rows.length != 0)  {
                for(var i = table.rows.length-1; i >= 0 ; i--) {
                    document.getElementById(tabla).deleteRow(i);
                }
            }
            
            
            for(var i = 0; i<tamano; i++) {
                
                row = table.insertRow(i);

                cell1 = row.insertCell(0);
                cell2 = row.insertCell(1);
                cell3 = row.insertCell(2);
                cell4 = row.insertCell(3);

                cell1.innerHTML = json['incubadora'][i]['idincubadora'];
                cell2.innerHTML = json['incubadora'][i]['tamano'];
                cell3.innerHTML = json['incubadora'][i]['capacidadmaxima'];
                cell4.innerHTML = json['incubadora'][i]['codigoacceso'];

            }

            row = table.insertRow(0);

            cell1 = row.insertCell(0);
            cell2 = row.insertCell(1);
            cell3 = row.insertCell(2);
            cell4 = row.insertCell(3);

            cell1.innerHTML = "ID";
            cell2.innerHTML = "TAMAÑO";
            cell3.innerHTML = "CAPACIDAD MAXIMA";
            cell4.innerHTML = "CODIGO ACCESO";
        }
        
        function getBusqueda( atributo, dato )     {
            obj = { "user":"Andres", "pass":"1111" };
            dbParam = JSON.stringify(obj);

            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    json = JSON.parse(this.responseText);
                    console.log("OK");
                }
                //document.getElementById("demo1").innerHTML = json['huevo']['movil'][0]['idHuevo'];
            };
            xmlhttp.open("GET", "php/buscarIncubadora.php?atributo=" + atributo+"&dato="+dato, true);
            xmlhttp.send();
        }
        
        function buscarDato( tabla, atributo, dato )   {
            getBusqueda(atributo, dato);
            var bandera = true;
            var tamano = json['incubadora'].length;
            var table = document.getElementById(tabla);
            
            var row;
            var cell1, cell2, cell3, cell4;

            if(table.rows.length != 0)  {
                for(var i = table.rows.length-1; i >= 0 ; i--) {
                    document.getElementById(tabla).deleteRow(i);
                }
            }
            
            
            for(var i = 0; i<tamano; i++) {
                
                row = table.insertRow(i);

                cell1 = row.insertCell(0);
                cell2 = row.insertCell(1);
                cell3 = row.insertCell(2);
                cell4 = row.insertCell(3);

                cell1.innerHTML = json['incubadora'][i]['idincubadora'];
                cell2.innerHTML = json['incubadora'][i]['tamano'];
                cell3.innerHTML = json['incubadora'][i]['capacidadmaxima'];
                cell4.innerHTML = json['incubadora'][i]['codigoacceso'];

            }

            row = table.insertRow(0);

            cell1 = row.insertCell(0);
            cell2 = row.insertCell(1);
            cell3 = row.insertCell(2);
            cell4 = row.insertCell(3);

            cell1.innerHTML = "ID";
            cell2.innerHTML = "TAMAÑO";
            cell3.innerHTML = "CAPACIDAD MAXIMA";
            cell4.innerHTML = "CODIGO ACCESO";
            
        }
        
        function getModificar( idIncubadora, tamano, capacidadMaxima, codigoAcceso )     {
            obj = { "user":"Andres", "pass":"1111" };
            dbParam = JSON.stringify(obj);

            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    json = this.responseText;
                    console.log(json);
                    if(json == 1)   {
                        alert('Incubadora Modificada');
                        mostrarDatos("tablamodificarincubadora");
                    }
                    else    {
                        alert('Error');
                    }
                }
                //document.getElementById("demo1").innerHTML = json['huevo']['movil'][0]['idHuevo'];
            };
            //console.log(tipoHuevo);
            xmlhttp.open("GET", "php/modificarIncubadora.php?idIncubadora=" + idIncubadora + "&tamano=" + tamano + "&capacidadMaxima=" + capacidadMaxima + "&codigoAcceso=" + codigoAcceso, true);
            xmlhttp.send();
        }
        
        function mostrarDatosModificar()    {
            
            var idIncubadora, tamano, capacidadMaxima, codigoAcceso;
            
            idIncubadora = document.getElementById("tablamodificarincubadora").rows[1].cells[0].innerHTML;
            tamano = document.getElementById("tablamodificarincubadora").rows[1].cells[1].innerHTML;
            capacidadMaxima = document.getElementById("tablamodificarincubadora").rows[1].cells[2].innerHTML;
            codigoAcceso = document.getElementById("tablamodificarincubadora").rows[1].cells[3].innerHTML;
            
            
            document.getElementById('idIncubadoraM').value = idIncubadora;
            document.getElementById('tamanoM').value = tamano;
            document.getElementById('capacidadMaximaM').value = capacidadMaxima;
            document.getElementById('codigoAccesoM').value = codigoAcceso;
            
            //modificarHuevo( idHuevo, tipoHuevo, periodoIncubacion, noVueltasDia, estacionAno, humedadUltimoDia, tiempoIncubacion );
            
        }
        
        function modificarIncubadora(  )   {
            
            var idIncubadora = document.getElementById('idIncubadoraM').value;
            var tamano = document.getElementById('tamanoM').value;
            var capacidadMaxima = document.getElementById('capacidadMaximaM').value;
            var codigoAcceso = document.getElementById('codigoAccesoM').value;
            
            //console.log(tipoHuevo);
            
            getModificar( idIncubadora, tamano, capacidadMaxima, codigoAcceso );
            
            document.getElementById('idIncubadoraM').value = "";
            document.getElementById('tamnoM').value = "";
            document.getElementById('capacidadMaximaM').value = "";
            document.getElementById('codigoAccesoM').value = "";
            
        }
        
        function mostrarDatosEliminar()    {
            
            var idIncubadora, tamano, capacidadMaxima, codigoAcceso;
            
            idIncubadora = document.getElementById("tablaeliminarincubadora").rows[1].cells[0].innerHTML;
            tamano = document.getElementById("tablaeliminarincubadora").rows[1].cells[1].innerHTML;
            capacidadMaxima = document.getElementById("tablaeliminarincubadora").rows[1].cells[2].innerHTML;
            codigoAcceso = document.getElementById("tablaeliminarincubadora").rows[1].cells[3].innerHTML;
            
            document.getElementById('idIncubadoraE').value = idIncubadora;
            document.getElementById('tamanoE').value = tamano;
            document.getElementById('capacidadMaximaE').value = capacidadMaxima;
            document.getElementById('codigoAccesoE').value = codigoAcceso;
            
            //modificarHuevo( idHuevo, tipoHuevo, periodoIncubacion, noVueltasDia, estacionAno, humedadUltimoDia, tiempoIncubacion );
            
        }
        
        function getElimina( idIncubadora )     {
            obj = { "user":"Andres", "pass":"1111" };
            dbParam = JSON.stringify(obj);

            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    json = JSON.parse(this.responseText);
                    console.log(json);
                    if(json == 1)   {
                        alert('Incubadora Eliminado');
                        mostrarDatos("tablaeliminarincubadora");
                    }
                    else    {
                        alert('Error');
                    }
                }
                //document.getElementById("demo1").innerHTML = json['huevo']['movil'][0]['idHuevo'];
            };
            xmlhttp.open("GET", "php/eliminarIncubadora.php?idIncubadora=" + idIncubadora, true);
            xmlhttp.send();
        }
        
        function eliminarIncubadora(  )   {
            
            var idIncubadora = document.getElementById('idIncubadoraE').value;
            
            getElimina( idIncubadora );
            
            document.getElementById('idIncubadoraE').value = "";
            document.getElementById('tamanoE').value = "";
            document.getElementById('capacidadMaximaE').value = "";
            document.getElementById('codigoAccesoE').value = "";
            
        }
        
        var idSensor = [];
        
        function getBusqueda( atributo, dato )     {
            obj = { "user":"Andres", "pass":"1111" };
            dbParam = JSON.stringify(obj);
            
            var idHuevo, tipoHuevo, periodoIncubacion, noVueltasDia, estacionAno, humedadUltimoDia, tiempoIncubacion, rangoHuevoMaxT, rangoHuevoMinT, rangoHuevoMaxH, rangoHuevoMinH, tipoSensorT, tipoSensorH;
            
            var sensorT = document.getElementById("tipoSensorT");
            var sensorH = document.getElementById('tipoSensorH');

            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    json = JSON.parse(this.responseText);
                    
                    var tamano = json['huevo']['movil'].length;

                    if(idSensor.length != 0)    {
                        for(var i = idSensor.length-1; i >= 0; i--) {
                            idSensor.pop();
                        }
                    }
                    console.log(json);

                    if(json['huevo']['movil'].length == json['huevo']['web'].length)    {
                        for(var i = 0; i<tamano; i++) {
                            if(json['huevo']['web'][i]['idhuevo'] == json['huevo']['movil'][i]['idHuevo'])  {

                                idHuevo = json['huevo']['movil'][i]['idHuevo'];
                                console.log(i + ": " + idHuevo);
                                tipoHuevo = json['huevo']['movil'][i]['tipoHuevo'];
                                periodoIncubacion = json['huevo']['movil'][i]['periodoIncubacion'];
                                noVueltasDia = json['huevo']['movil'][i]['noVueltasDia'];
                                estacionAno = json['huevo']['movil'][i]['estacionAno'];
                                humedadUltimoDia = json['huevo']['movil'][i]['humedadUltimoDia'];
                                tiempoIncubacion = json['huevo']['web'][i]['tiempoincubacion'];
                                if(i == 0)  {
                                    tipoSensorT = json['huevo']['movil'][i]['tipoSensor'];
                                    rangoHuevoMaxT = json['huevo']['movil'][i]['rangoHuevoMax'];
                                    rangoHuevoMinT = json['huevo']['movil'][i]['rangoHuevoMin'];
                                }
                                else if(i == 1)    {
                                    tipoSensorH = json['huevo']['movil'][i]['tipoSensor'];
                                    rangoHuevoMaxH = json['huevo']['movil'][i]['rangoHuevoMax'];
                                    rangoHuevoMinH = json['huevo']['movil'][i]['rangoHuevoMin'];
                                }
                                idSensor.push(json['huevo']['movil'][i]['idSensor']);
                            }
                            else    {
                                i = tamano;
                                console.log("Error");
                            }
                        }
                    }
                    else    {
                        console.log("Error");
                    }
                    console.log("F: " + idHuevo);
                    
                    document.getElementById('idHuevo').value = idHuevo;
                    document.getElementById('tipoHuevo').value = tipoHuevo;
                    document.getElementById('periodoIncubacion').value = periodoIncubacion;
                    document.getElementById('noVueltasDia').value = noVueltasDia;
                    document.getElementById('estacionAno').value = estacionAno;
                    document.getElementById('humedadUltimoDia').value = humedadUltimoDia;
                    document.getElementById('tiempoIncubacion').value = tiempoIncubacion;
                    sensorT.options[0] = new Option(tipoSensorT + ": " + idSensor[0], idSensor[0],"0");
                    //sensorT.options[2] = new Option("AAA" + ": " + "BBB", 2,"1");
                    //sensorT.selectedIndex=2;
                    document.getElementById('rangoHuevoMaxT').value = rangoHuevoMaxT;
                    document.getElementById('rangoHuevoMinT').value = rangoHuevoMinT;

                    sensorH.options[0] = new Option(tipoSensorH + ": " + idSensor[1], idSensor[1],"0");
                    //sensorT.selectedIndex=0;
                    document.getElementById('rangoHuevoMaxH').value = rangoHuevoMaxH;
                    document.getElementById('rangoHuevoMinH').value = rangoHuevoMinH;
                }
                //document.getElementById("demo1").innerHTML = json['huevo']['movil'][0]['idHuevo'];
            };
            xmlhttp.open("GET", "php/buscarHuevo.php?atributo=" + atributo+"&dato="+dato, true);
            xmlhttp.send();
        }
        
        function getBusquedaC( atributo, dato )     {
            obj = { "user":"Andres", "pass":"1111" };
            dbParam = JSON.stringify(obj);
            
            var idCliente, nombre, apellidoPaterno, apellidoMaterno, telefono, direccion, ingresoCliente;

            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    json = JSON.parse(this.responseText);
                    
                    var tamano = json['cliente'].length;
                    console.log(json);

                    for(var i = 0; i<tamano; i++) {

                        idCliente = json['cliente'][i]['idcliente'];
                        //console.log(i + ": " + idHuevo);
                        nombre = json['cliente'][i]['nombre'];
                        apellidoPaterno = json['cliente'][i]['apellidopaterno'];
                        apellidoMaterno = json['cliente'][i]['apellidomaterno'];
                        console.log(apellidoMaterno);
                        telefono = json['cliente'][i]['telefono'];
                        direccion = json['cliente'][i]['domicilio'];
                        ingresoCliente = json['cliente'][i]['diaingreso'];
                        
                    }
                    //console.log("F: " + idHuevo);
                    
                    document.getElementById('idCliente').value = idCliente;
                    document.getElementById('nombre').value = nombre;
                    document.getElementById('apellidoPaterno').value = apellidoPaterno;
                    document.getElementById('apellidoMaterno').value = apellidoMaterno;
                    document.getElementById('telefono').value = telefono;
                    document.getElementById('direccion').value = direccion;
                    document.getElementById('ingresoCliente').value = ingresoCliente;
                    
                }
                //document.getElementById("demo1").innerHTML = json['huevo']['movil'][0]['idHuevo'];
            };
            xmlhttp.open("GET", "php/buscarCliente2.php?atributo=" + atributo+"&dato="+dato, true);
            xmlhttp.send();
        }
        
        function getBusquedaI( atributo, dato )     {
            obj = { "user":"Andres", "pass":"1111" };
            dbParam = JSON.stringify(obj);
            
            var idIncubadora, tamanoI, capacidadMaxima, codigoAcceso;

            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    json = JSON.parse(this.responseText);
                    
                    var tamano = json['incubadora'].length;
                    console.log(json);

                    for(var i = 0; i<tamano; i++) {

                        idIncubadora = json['incubadora'][i]['idincubadora'];
                        //console.log(i + ": " + idHuevo);
                        tamanoI = json['incubadora'][i]['tamano'];
                        capacidadMaxima = json['incubadora'][i]['capacidadmaxima'];
                        codigoAcceso = json['incubadora'][i]['codigoacceso'];
                        //console.log(apellidoMaterno);
                        
                    }
                    //console.log("F: " + idHuevo);
                    
                    document.getElementById('idIncubadora').value = idIncubadora;
                    document.getElementById('tamano').value = tamanoI;
                    document.getElementById('capacidadMaxima').value = capacidadMaxima;
                    document.getElementById('codigoAcceso').value = codigoAcceso;
                    
                }
                //document.getElementById("demo1").innerHTML = json['huevo']['movil'][0]['idHuevo'];
            };
            xmlhttp.open("GET", "php/buscarIncubadora.php?atributo=" + atributo+"&dato="+dato, true);
            xmlhttp.send();
        }
        
        function agregarHuevoIncubadora( noHuevos, idIncubadora, idCliente, idHuevo )  {
            obj = { "user":"Andres", "pass":"1111" };
            dbParam = JSON.stringify(obj);

            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    json = this.responseText;
                    console.log("OK");
                    if(json == 1)   {
                        alert('Huevo Agregado a Incubadora');
                    }
                    else    {
                        alert('Error');
                    }
                }
            };
            
            //xmlhttp.onreadystatechange = miFuncion;
            console.log("php/agregarHuevoIncubadora.php?noHuevos=" + noHuevos +"&idIncubadora=" + idIncubadora + "&idCliente=" + idCliente + "&idHuevo=" + idHuevo)
            xmlhttp.open("GET", "php/agregarHuevoIncubadora.php?noHuevos=" + noHuevos +"&idIncubadora=" + idIncubadora + "&idCliente=" + idCliente + "&idHuevo=" + idHuevo, true);
            xmlhttp.send();
            
            document.getElementById('idIncubadora').value = "";
            document.getElementById('tamano').value = "";
            document.getElementById('capacidadMaxima').value = "";
            document.getElementById('codigoAcceso').value = "";
            
            document.getElementById('idCliente').value = "";
            document.getElementById('nombre').value = "";
            document.getElementById('apellidoPaterno').value = "";
            document.getElementById('apellidoMaterno').value = "";
            document.getElementById('telefono').value = "";
            document.getElementById('direccion').value = "";
            document.getElementById('ingresoCliente').value = "";
            
            document.getElementById('idHuevo').value = "";
            document.getElementById('tipoHuevo').value = "";
            document.getElementById('periodoIncubacion').value = "";
            document.getElementById('noVueltasDia').value = "";
            document.getElementById('estacionAno').value = "";
            document.getElementById('humedadUltimoDia').value = "";
            document.getElementById('tiempoIncubacion').value = "";
            //sensorT.options[0] = new Option(tipoSensorT + ": " + idSensor[0], idSensor[0],"0");
            //sensorT.options[2] = new Option("AAA" + ": " + "BBB", 2,"1");
            //sensorT.selectedIndex=2;
            document.getElementById("tipoSensorT").value = "";
            
            document.getElementById('rangoHuevoMaxT').value = "";
            document.getElementById('rangoHuevoMinT').value = "";

            //sensorH.options[0] = new Option(tipoSensorH + ": " + idSensor[1], idSensor[1],"0");
            //sensorT.selectedIndex=0;
            document.getElementById('tipoSensorH').value = "";
            document.getElementById('rangoHuevoMaxH').value = "";
            document.getElementById('rangoHuevoMinH').value = "";
            
        }
        
        function getDatosHI(  )     {
            obj = { "user":"Andres", "pass":"1111" };
            dbParam = JSON.stringify(obj);

            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    json = JSON.parse(this.responseText);
                    console.log("OK");
                }
            };
            xmlhttp.open("GET", "php/mostrarHuevoIncubadora.php?x=" + dbParam, true);
            xmlhttp.send();
        }

        getDatosHI();
        function mostrarDatosHI( tabla ) {
            getDatosHI();
            var bandera = true;
            console.log(json);
            var tamano = json['incubadora'].length;
            var table = document.getElementById(tabla);
            
            var row;
            var cell1, cell2, cell3, cell4, cell5, cell6, cell7;

            if(table.rows.length != 0)  {
                for(var i = table.rows.length-1; i >= 0 ; i--) {
                    document.getElementById(tabla).deleteRow(i);
                }
            }
            
            
            for(var i = 0; i<tamano; i++) {
                
                row = table.insertRow(i);

                cell1 = row.insertCell(0);
                cell2 = row.insertCell(1);
                cell3 = row.insertCell(2);
                cell4 = row.insertCell(3);
                cell5 = row.insertCell(4);
                cell6 = row.insertCell(5);
                cell7 = row.insertCell(6);

                cell1.innerHTML = json['incubadora'][i]['idincubadora'];
                cell2.innerHTML = json['incubadora'][i]['tamano'];
                cell3.innerHTML = json['incubadora'][i]['capacidadmaxima'];
                cell4.innerHTML = json['incubadora'][i]['codigoacceso'];
                cell5.innerHTML = json['incubadora'][i]['diaregistro'];
                cell6.innerHTML = json['incubadora'][i]['nohuevos'];
                cell7.innerHTML = json['incubadora'][i]['idhuevo'];

            }

            row = table.insertRow(0);

            cell1 = row.insertCell(0);
            cell2 = row.insertCell(1);
            cell3 = row.insertCell(2);
            cell4 = row.insertCell(3);
            cell5 = row.insertCell(4);
            cell6 = row.insertCell(5);
            cell7 = row.insertCell(6);

            cell1.innerHTML = "ID";
            cell2.innerHTML = "TAMAÑO";
            cell3.innerHTML = "CAPACIDAD MAXIMA";
            cell4.innerHTML = "CODIGO ACCESO";
            cell5.innerHTML = "DIA REGISTRO";
            cell6.innerHTML = "NUMERO DE HUEVOS";
            cell7.innerHTML = "ID HUEVO";
        }
        
    </script>


  </body>
</html>
