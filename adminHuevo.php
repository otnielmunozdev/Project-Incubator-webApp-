<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Administración</title>
    <meta name="description" content="Aplicacion web de incubadora">
    <meta name="keywords" content="Encubadora, Incubadora, Huevos , Pollos">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0, minimum-scale=1.0" >
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="estilosadminhuevos.css">
    <link rel="stylesheet" href="css/animate.css">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
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

  <body onload="cargarSensor('Humedad', 'tipoSensorH'); cargarSensor('Temperatura', 'tipoSensorT');">

    <!--Navegacion-->
    <nav class=" navbar navbar-expand-md navbar-dark bg-dark fixed-top text-center" id="menu">

      <div class="container">
        <a href="/" class="navbar-brand">
          <img src="img/huevos.png" alt="Huevos Emplumados" width="50px" class="d-inline-block align-top" >
          Panel de Administración de Huevos Emplumados Sección de las Huevos
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
            <form class="form1" action="adminIncubadora.php" method="get">
                 <?php $usuario = $_GET['user']; $contrasena = $_GET['pass']; 
                  echo '<input type="hidden" name="user" value='.$usuario.'>';
                  echo '<input type="hidden" name="pass" value='.$contrasena.'>';
                  ?>
                  <input type="submit" value="Incubadoras" class="nav-item" role="button" aria-pressed="true">
              </form>
            <!--<a class="nav-link" href="adminIncubadora.html">Incubadoras</a>-->
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
            <a class="nav-link active" id="pills-AgregarHuevo-tab" data-toggle="pill" href="#pills-AgregarHuevo" role="tab" aria-controls="pills-AgregarHuevo" aria-selected="true" onclick="cargarSensor('Temperatura', 'tipoSensorT')">Agregar Huevo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-MostrarHuevo-tab" data-toggle="pill" href="#pills-MostrarHuevo" role="tab" aria-controls="pills-MostrarHuevo" aria-selected="false" onclick="mostrarDatos('tablamostrarhuevos')">Mostrar Huevo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-ModificarHuevo-tab" data-toggle="pill" href="#pills-ModificarHuevo" role="tab" aria-controls="pills-ModificarHuevo" aria-selected="false" onclick="mostrarDatos('tablamodificarhuevos')">Modificar Huevo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-EliminarHuevo-tab" data-toggle="pill" href="#pills-EliminarHuevo" role="tab" aria-controls="pills-EliminarHuevo" aria-selected="false" onclick="mostrarDatos('tablaeliminarhuevos')">Eliminar Huevo</a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">

          <!--inicio del formulario Agregar incubadora-->
          <div class="tab-pane fade show active" id="pills-AgregarHuevo" role="tabpanel" aria-labelledby="pills-AgregarHuevo-tab">
            <form action="php\agregarHuevo.php" method="get">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="tiempoincubacion">Tiempo de incubacion</label>
                  <input type="text" class="form-control" name="tiempoIncubacion" placeholder="Tiempo incubación">
                  <label for="tipohuevo">Tipo huevo</label>
                  <input type="text" class="form-control" name="tipoHuevo" placeholder="Tipo de Huevo">
                  <label for="periodoincubacion">Periodo de incubacion</label>
                  <input type="text" class="form-control" name="periodoIncubacion" placeholder="Periodo de incubacion">
                  <label for="novueltasdias">Numero de vueltas por dia</label>
                  <input type="text" class="form-control" name="noVueltasDia" placeholder="Numero de vueltas por dia">
                  <label for="estacionano">Estacion del año</label>
                  <input type="text" class="form-control" name="estacionAno" placeholder="Estacion del año">
                  <label for="huemedadultimodia">Huemdad en los ultimos dias</label>
                  <input type="text" class="form-control" name="humedadUltimoDia" placeholder="Huemdad en los ultimos dias">
                  
                  <div class="form-group col-md-11">
                  <label for="buscarsensortemperatura">Buscar Sensor Temperatura</label>
                  <select class="form-control" id="tipoSensorT" name="idTipoSensorT">
                    <option value="idHuevo">ID</option>
                    
                  </select>
                  </div>
                  
                  <label for="rangohuevomax">Rango Maximo de Temperatura</label>
                  <input type="text" class="form-control" name="rangoHuevoMaxT" placeholder="Rango Maximo de temperatura en C°">
                  <label for="rangohuevomin">Rango Minimo de Temperatura</label>
                  <input type="text" class="form-control" name="rangoHuevoMinT" placeholder="Rango Minimo de temperatura en C°">
                  
                  <div class="form-group col-md-11">
                  <label for="buscarsensorhumedad">Buscar Sensor Humedad</label>
                  <select class="form-control" id="tipoSensorH" name="idTipoSensorH">
                    <option value="idHuevo">ID</option>
                    
                  </select>
                  </div>
                  
                  <label for="rangohuevomax">Rango Maximo de Humedad</label>
                  <input type="text" class="form-control" name="rangoHuevoMaxH" placeholder="Rango Maximo de humedad">
                  <label for="rangohuevomax">Rango Maximo de Humedad</label>
                  <input type="text" class="form-control" name="rangoHuevoMinH" placeholder="Rango Minimo de humedad">
                  
                  <?php $usuario = $_GET['user']; $contrasena = $_GET['pass']; 
                  echo '<input type="hidden" name="user" value='.$usuario.'>';
                  echo '<input type="hidden" name="pass" value='.$contrasena.'>';
                  ?>
                  <!--<input type="submit" value="Cliente" class="display-4 text-center" role="button" aria-pressed="true">-->
                  <br>
                  <button type="submit" class="btn btn-primary" id="agregarhuevoboton">Agregar Huevo</button> <br>
                </div>
                <div class="form-group col-md-6">
                  <div class="container">
                      <h1 class="display-2 text-center">Panel de Administración</h1>
                      <h2 class="display-3 text-center">(Huevos)</h2>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <!--Fin del formulario Agregar incubadora-->

          <!--inicio del formulario Mostrar incubadora-->
          <div class="tab-pane fade" id="pills-MostrarHuevo" role="tabpanel" aria-labelledby="pills-MostrarHuevo-tab">
            <form>
              <div class="form-row">
                <div class="form-group col-md-5">
                  <label for="buscaridhuevoselect">Buscar</label>
                  <select class="form-control" id="buscaridhuevoselectV">
                    <option value="idHuevo">ID</option>
                    <option value="tipoHuevo">TIPO HUEVO</option>
                    <option value="periodoIncubacion">PERIODO INCUBACION</option>
                    <option value="noVueltasDia">NO° VUELTAS</option>
                    <option value="estacionAno">ESTACION DEL AÑO</option>
                    <option value="humedadUltimoDia">HUMEDAD ULTIMO DIA</option>
                    <option value="tiempoincubacion">TIEMPO INCUBACION</option>
                    <option value="tipoSensor">TIPO DE SENSOR</option>
                    <option value="rangoHuevoMax">RANGO MAXIMO</option>
                    <option value="rangoHuevoMin">RANGO MINIMO</option>
                  </select>
                </div>
                <div class="form-group col-md-5">
                  <label for="buscaridhuevo">Search</label>
                  <form class="form-inline">
                    <input type="text" class="form-control" placeholder="Search" id="buscaridhuevoV">
                    <button class="btn btn-outline-success" type="button" id="buscaridhuevoboton" onclick="buscarDato('tablamostrarhuevos', document.getElementById('buscaridhuevoselectV').value, document.getElementById('buscaridhuevoV').value)">Search</button>
                  </form>
                </div>
                <div class="form-group col-sm-8">
                  <table class="table table-bordered table-responsive-sm" style="background-color:rgba(64, 25, 66, 0.84);" id="tablamostrarhuevos">
                    <!--<thead>-->
                    <!--<tr>
                      <th>ID INCUBADORA</th>
                      <th>ID CLIENTE</th>
                      <th>TAMAÑO</th>
                      <th>CAPACIDAD MAXIMA</th>
                      <th>TIPO HUEVO</th>
                      <th>TIEMPO</th>
                      <th>RANGO DE TEMPERATURA</th>
                      <th>DIA DE REGISTRO</th>
                      <th>TEMPERATURA ACTUAL</th>
                      <th>HUMEDAD ACTUAL</th>
                    </tr>-->
                    </table>
                </div>
              </div>
            </form>
          </div>
          <!--Fin del formulario Mostrar incubadora-->

          <!--inicio del formulario Modificar incubadora-->
          <div class="tab-pane fade" id="pills-ModificarHuevo" role="tabpanel" aria-labelledby="pills-ModificarHuevo-tab">
            <form>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="buscaridhuevoselect">Buscar</label>
                  <select class="form-control" id="buscaridhuevoselectM">
                    <option value="idHuevo">ID</option>
                    <option value="tipoHuevo">TIPO HUEVO</option>
                    <option value="periodoIncubacion">PERIODO INCUBACION</option>
                    <option value="noVueltasDia">NO° VUELTAS</option>
                    <option value="estacionAno">ESTACION DEL AÑO</option>
                    <option value="humedadUltimoDia">HUMEDAD ULTIMO DIA</option>
                    <option value="tiempoincubacion">TIEMPO INCUBACION</option>
                    <!--<option value="tipoSensor">TIPO DE SENSOR</option>-->
                    <option value="rangoHuevoMax">RANGO MAXIMO</option>
                    <option value="rangoHuevoMin">RANGO MINIMO</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="buscaridhuevo">Search</label>
                  <form class="form-inline">
                    <input type="text" class="form-control" placeholder="Search" id="buscaridhuevoM">
                    <button class="btn btn-outline-success" type="button" id="buscaridhuevoboton" onclick="buscarDato('tablamodificarhuevos', document.getElementById('buscaridhuevoselectM').value, document.getElementById('buscaridhuevoM').value); mostrarDatosModificar();">Search</button>
                  </form>
                </div>
                <div class="form-group col-md-3">
                  <input type="hidden" id="idHuevoM">
                  <label for="tipohuevoModificar">Tipo de Huevo</label>
                  <input type="text" class="form-control" id="tipohuevoM" placeholder="Tipo de Huevo">
                  <label for="tiempoModificar">Periodo de incubacion</label>
                  <input type="text" class="form-control" id="periodoIncubacionM" placeholder="Tiempo">
                  <label for="rangotemperaturaModificar">Numero de vuales por dia</label>
                  <input type="text" class="form-control" id="noVueltasDiaM" placeholder="Numero de Vueltas Dia">
                  <label for="diaregistroModificar">Estacion del año</label>
                  <input type="text" class="form-control" id="estacionAnoM" placeholder="Estacion del año">
                  <label for="humedadUltimoDiaEliminar">Humedad en los ultimos dias</label>
                  <input type="text" class="form-control" id="humedadUltimoDiaM" placeholder="Huemdad ultimo dia">
                  <label for="periodoIncubacion">Tiempo Incubacion</label>
                  <input type="text" class="form-control" id="tiempoIncubacionM" placeholder="Tiempo de incubacion">
                  
                  <div class="form-group col-md-11">
                  <label for="buscarsensortemperatura">Buscar Sensor Temperatura</label>
                  <select class="form-control" id="idtipoSensorTM">
                    <option value="idHuevo">ID</option>
                    
                  </select>
                  </div>
                  
                  <label for="rangohuevomax">Rango Maximo de Temperatura</label>
                  <input type="text" class="form-control" id="rangoHuevoMaxTM" placeholder="Rango Maximo de temperatura en C°">
                  <label for="rangohuevomin">Rango Minimo de Temperatura</label>
                  <input type="text" class="form-control" id="rangoHuevoMinTM" placeholder="Rango Minimo de temperatura en C°">
                  
                  <div class="form-group col-md-11">
                  <label for="buscarsensorhumedad">Buscar Sensor Humedad</label>
                  <select class="form-control" id="idTipoSensorHM">
                    <option value="idHuevo">ID</option>
                    
                  </select>
                  </div>
                  
                  <label for="rangohuevomax">Rango Maximo de Humedad</label>
                  <input type="text" class="form-control" id="rangoHuevoMaxHM" placeholder="Rango Maximo de humedad">
                  <label for="rangohuevomax">Rango Maximo de Humedad</label>
                  <input type="text" class="form-control" id="rangoHuevoMinHM" placeholder="Rango Minimo de humedad">
                  <button type="button" class="btn btn-primary" style="margin:10px;" id="ModificarHuevoboton" onclick="modificarHuevo()"> Modificar </button>
                  
                </div>

                <div class="form-group col-sm-9 ">
                  <table class="table table-bordered table-responsive-sm" style="background-color:rgba(64, 25, 66, 0.84);" id="tablamodificarhuevos">
                    
                    
                    </table>
                </div>
              </div>
            </form>
          </div>
          <!--Fin del formulario Modificar incubadora-->

          <!--inicio del formulario Eliminar incubadora-->
          <div class="tab-pane fade" id="pills-EliminarHuevo" role="tabpanel" aria-labelledby="pills-EliminarHuevo-tab">
            <form>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="buscaridhuevoselect">Buscar</label>
                  <select class="form-control" id="buscaridhuevoselectE">
                    <option value="idHuevo">ID</option>
                    <option value="tipoHuevo">TIPO HUEVO</option>
                    <option value="periodoIncubacion">PERIODO INCUBACION</option>
                    <option value="noVueltasDia">NO° VUELTAS</option>
                    <option value="estacionAno">ESTACION DEL AÑO</option>
                    <option value="humedadUltimoDia">HUMEDAD ULTIMO DIA</option>
                    <option value="tiempoincubacion">TIEMPO INCUBACION</option>
                    <option value="rangoHuevoMax">RANGO MAXIMO</option>
                    <option value="rangoHuevoMin">RANGO MINIMO</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="buscaridhuevo">Search</label>
                  <form class="form-inline">
                    <input type="text" class="form-control" placeholder="Search" id="buscaridhuevoE">
                    <button class="btn btn-outline-success" type="button" id="buscaridhuevoboton" onclick="buscarDato('tablaeliminarhuevos', document.getElementById('buscaridhuevoselectE').value, document.getElementById('buscaridhuevoE').value); mostrarDatosEliminar();">Search</button>
                  </form>
                </div>
                <div class="form-group col-md-3">
                  <input type="hidden" id="idHuevoE">
                  <label for="tipohuevoEliminar">Tipo de Huevo</label>
                  <input type="text" class="form-control" id="tipohuevoE" placeholder="Tipo de Huevo">
                  <label for="tiempoEliminar">Periodo de incubacion</label>
                  <input type="text" class="form-control" id="periodoIncubacionE" placeholder="Tiempo">
                  <label for="rangotemperaturaEliminar">Numero de vuales por dia</label>
                  <input type="text" class="form-control" id="noVueltasDiaE" placeholder="Numero de Vueltas Dia">
                  <label for="diaregistroEliminar">Estacion del año</label>
                  <input type="text" class="form-control" id="estacionAnoE" placeholder="Estacion del año">
                  <label for="humedadUltimoDiaEliminar">Humedad en los ultimos dias</label>
                  <input type="text" class="form-control" id="humedadUltimoDiaE" placeholder="Huemdad ultimo dia">
                  <label for="periodoIncubacionEliminar">Tiempo Incbacion</label>
                  <input type="text" class="form-control" id="tiempoIncubacionE" placeholder="Tiempo de incubacion">
                  
                  <div class="form-group col-md-11">
                  <label for="buscarsensortemperatura">Buscar Sensor Temperatura</label>
                  <select class="form-control" id="idtipoSensorTE">
                    <option value="idHuevo">ID</option>
                    
                  </select>
                  </div>
                  
                  <label for="rangohuevomax">Rango Maximo de Temperatura</label>
                  <input type="text" class="form-control" id="rangoHuevoMaxTE" placeholder="Rango Maximo de temperatura en C°">
                  <label for="rangohuevomin">Rango Minimo de Temperatura</label>
                  <input type="text" class="form-control" id="rangoHuevoMinTE" placeholder="Rango Minimo de temperatura en C°">
                  
                  <div class="form-group col-md-11">
                  <label for="buscarsensorhumedad">Buscar Sensor Humedad</label>
                  <select class="form-control" id="idTipoSensorHE">
                    <option value="idHuevo">ID</option>
                    
                  </select>
                  </div>
                  
                  <label for="rangohuevomax">Rango Maximo de Humedad</label>
                  <input type="text" class="form-control" id="rangoHuevoMaxHE" placeholder="Rango Maximo de humedad">
                  <label for="rangohuevomax">Rango Maximo de Humedad</label>
                  <input type="text" class="form-control" id="rangoHuevoMinHE" placeholder="Rango Minimo de humedad">
                  
                  <input type="button" name="" value="Eliminar" class="btn btn-primary" style="margin:10px;" id="EliminarHuevoboton" onclick="eliminarHuevo()">
                </div>

                <div class="form-group col-sm-9 ">
                  <table class="table table-bordered table-responsive-sm" style="background-color:rgba(64, 25, 66, 0.84);" id="tablaeliminarhuevos">
                    
                    </table>
                </div>
              </div>
            </form>
          </div>
          <!--Fin del formulario Eliminar incubadora-->
        </div>
        </div>
    </div>
</header>

    <?php
      $opcion = @$_GET['opcion'];
      if($opcion == 1)  {
          echo "<script>";
          echo "alert('Huevo agregado');";
          echo "</script>";
      } else if($opcion == -1)   {
          echo "<script>";
          echo "alert('Error en la consulta');";
          echo "</script>";
      }
      ?>
    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <script>
        var obj, dbParam, xmlhttp, json;
        var idSensor = [];

        function cargarSensor( tipoSensor, etiqueta )     {
            obj = { "user":"Andres", "pass":"1111" };
            dbParam = JSON.stringify(obj);

            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    json = JSON.parse(this.responseText);
                    console.log(json);
                    
                    var tamano = json['sensor'].length;
                    var sensor = document.getElementById(etiqueta);
                    console.log(tamano);
                    for( var i = 0; i < tamano; i++ )   {
                        console.log(i);
                        console.log(json['sensor'][i]['tipoSensor']);
                        sensor.options[i] = new Option(json['sensor'][i]['tipoSensor'] + ": " + json['sensor'][i]['idSensor'], json['sensor'][i]['idSensor'],"0");
                    }
                    //sensor.selectedIndex=1;
                    
                }
                //document.getElementById("demo1").innerHTML = json['huevo']['movil'][0]['idHuevo'];
            };
            xmlhttp.open("GET", "php/cargarSensor.php?tipoSensor=" + tipoSensor, true);
            xmlhttp.send();
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
                //document.getElementById("demo1").innerHTML = json['huevo']['movil'][0]['idHuevo'];
            };
            xmlhttp.open("GET", "php/mostrarHuevo.php?x=" + dbParam, true);
            xmlhttp.send();
        }

        getDatos();
        function mostrarDatos( tabla ) {
            getDatos();
            var bandera = true;
            var tamano = json['huevo']['movil'].length;
            var table = document.getElementById(tabla);
            //var table = document.getElementById("tablamostrarhuevos");
            
            var row;
            var cell1, cell2, cell3, cell4, cell5, cell6, cell7, cell8, cell9, cell10;

            if(table.rows.length != 0)  {
                for(var i = table.rows.length-1; i >= 0 ; i--) {
                    document.getElementById(tabla).deleteRow(i);
                }
            }
            
            if(json['huevo']['movil'].length == json['huevo']['web'].length)    {
                for(var i = 0; i<tamano; i++) {
                    if(json['huevo']['web'][i]['idhuevo'] == json['huevo']['movil'][i]['idHuevo'])  {
                        row = table.insertRow(i);

                        cell1 = row.insertCell(0);
                        cell2 = row.insertCell(1);
                        cell3 = row.insertCell(2);
                        cell4 = row.insertCell(3);
                        cell5 = row.insertCell(4);
                        cell6 = row.insertCell(5);
                        cell7 = row.insertCell(6);
                        cell8 = row.insertCell(7);
                        cell9 = row.insertCell(8);
                        cell10 = row.insertCell(9);

                        cell1.innerHTML = json['huevo']['movil'][i]['idHuevo'];
                        cell2.innerHTML = json['huevo']['movil'][i]['tipoHuevo'];
                        cell3.innerHTML = json['huevo']['movil'][i]['periodoIncubacion'];
                        cell4.innerHTML = json['huevo']['movil'][i]['noVueltasDia'];
                        cell5.innerHTML = json['huevo']['movil'][i]['estacionAno'];
                        cell6.innerHTML = json['huevo']['movil'][i]['humedadUltimoDia'];
                        cell7.innerHTML = json['huevo']['web'][i]['tiempoincubacion'];
                        cell8.innerHTML = json['huevo']['movil'][i]['tipoSensor'];
                        cell9.innerHTML = json['huevo']['movil'][i]['rangoHuevoMax'];
                        cell10.innerHTML = json['huevo']['movil'][i]['rangoHuevoMin'];
                        
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

            row = table.insertRow(0);

            cell1 = row.insertCell(0);
            cell2 = row.insertCell(1);
            cell3 = row.insertCell(2);
            cell4 = row.insertCell(3);
            cell5 = row.insertCell(4);
            cell6 = row.insertCell(5);
            cell7 = row.insertCell(6);
            cell8 = row.insertCell(7);
            cell9 = row.insertCell(8);
            cell10 = row.insertCell(9);

            cell1.innerHTML = "ID";
            cell2.innerHTML = "TIPO HUEVO";
            cell3.innerHTML = "PERIODO INCUBACION";
            cell4.innerHTML = "NO° VUELTAS";
            cell5.innerHTML = "ESTACION DEL AÑO";
            cell6.innerHTML = "HUMEDAD ULTIMO DIA";
            cell7.innerHTML = "TIEMPO INCUBACION";
            cell8.innerHTML = "TIPO DE SENSOR";
            cell9.innerHTML = "RANGO MAX";
            cell10.innerHTML = "RANGO MIN";
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
            xmlhttp.open("GET", "php/buscarHuevo.php?atributo=" + atributo+"&dato="+dato, true);
            xmlhttp.send();
        }
        
        function buscarDato( tabla, atributo, dato )   {
            getBusqueda(atributo, dato);
            var bandera = true;
            var tamano = json['huevo']['movil'].length;
            var table = document.getElementById(tabla);
            //var table = document.getElementById("tablamostrarhuevos");
            
            var row;
            var cell1, cell2, cell3, cell4, cell5, cell6, cell7, cell8, cell9, cell10;

            if(table.rows.length != 0)  {
                for(var i = table.rows.length-1; i >= 0 ; i--) {
                    document.getElementById(tabla).deleteRow(i);
                }
            }
            
            if(idSensor.length != 0)    {
                for(var i = idSensor.length-1; i >= 0; i--) {
                    idSensor.pop();
                }
            }
            
            if(json['huevo']['movil'].length == json['huevo']['web'].length)    {
                for(var i = 0; i<tamano; i++) {
                    if(json['huevo']['web'][i]['idhuevo'] == json['huevo']['movil'][i]['idHuevo'])  {
                        row = table.insertRow(i);

                        cell1 = row.insertCell(0);
                        cell2 = row.insertCell(1);
                        cell3 = row.insertCell(2);
                        cell4 = row.insertCell(3);
                        cell5 = row.insertCell(4);
                        cell6 = row.insertCell(5);
                        cell7 = row.insertCell(6);
                        cell8 = row.insertCell(7);
                        cell9 = row.insertCell(8);
                        cell10 = row.insertCell(9);

                        cell1.innerHTML = json['huevo']['movil'][i]['idHuevo'];
                        cell2.innerHTML = json['huevo']['movil'][i]['tipoHuevo'];
                        cell3.innerHTML = json['huevo']['movil'][i]['periodoIncubacion'];
                        cell4.innerHTML = json['huevo']['movil'][i]['noVueltasDia'];
                        cell5.innerHTML = json['huevo']['movil'][i]['estacionAno'];
                        cell6.innerHTML = json['huevo']['movil'][i]['humedadUltimoDia'];
                        cell7.innerHTML = json['huevo']['web'][i]['tiempoincubacion'];
                        cell8.innerHTML = json['huevo']['movil'][i]['tipoSensor'];
                        cell9.innerHTML = json['huevo']['movil'][i]['rangoHuevoMax'];
                        cell10.innerHTML = json['huevo']['movil'][i]['rangoHuevoMin'];
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

            row = table.insertRow(0);

            cell1 = row.insertCell(0);
            cell2 = row.insertCell(1);
            cell3 = row.insertCell(2);
            cell4 = row.insertCell(3);
            cell5 = row.insertCell(4);
            cell6 = row.insertCell(5);
            cell7 = row.insertCell(6);
            cell8 = row.insertCell(7);
            cell9 = row.insertCell(8);
            cell10 = row.insertCell(9);

            cell1.innerHTML = "ID";
            cell2.innerHTML = "TIPO HUEVO";
            cell3.innerHTML = "PERIODO INCUBACION";
            cell4.innerHTML = "NO° VUELTAS";
            cell5.innerHTML = "ESTACION DEL AÑO";
            cell6.innerHTML = "HUMEDAD ULTIMO DIA";
            cell7.innerHTML = "TIEMPO INCUBACION";
            cell8.innerHTML = "TIPO DE SENSOR";
            cell9.innerHTML = "RANGO MAX";
            cell10.innerHTML = "RANGO MIN";
        }
        
        function getModificar( idHuevo, tipoHuevo, periodoIncubacion, noVueltasDia, estacionAno, humedadUltimoDia, tiempoIncubacion, idTipoSensorTNuevo, idTipoSensorHNuevo, rangoHuevoMaxT, rangoHuevoMinT, rangoHuevoMaxH, rangoHuevoMinH, tipoSensorT, tipoSensorH )     {
            obj = { "user":"Andres", "pass":"1111" };
            dbParam = JSON.stringify(obj);

            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    json = JSON.parse(this.responseText);
                    console.log(json);
                    if(json == 1)   {
                        alert('Huevo Modificado');
                        mostrarDatos("tablamodificarhuevos");
                    }
                    else    {
                        alert('Error');
                    }
                }
                //document.getElementById("demo1").innerHTML = json['huevo']['movil'][0]['idHuevo'];
            };
            
            xmlhttp.open("GET", "php/modificarHuevo.php?idHuevo=" + idHuevo+"&tipoHuevo=" + tipoHuevo + "&periodoIncubacion=" + periodoIncubacion + "&noVueltasDia=" + noVueltasDia + "&estacionAno=" + estacionAno + "&humedadUltimoDia=" + humedadUltimoDia + "&tiempoincubacion=" + tiempoIncubacion + "&idTipoSensorT=" + tipoSensorT + "&idTipoSensorH=" + tipoSensorH + "&rangoHuevoMaxT=" + rangoHuevoMaxT + "&rangoHuevoMinT=" + rangoHuevoMinT + "&rangoHuevoMaxH=" + rangoHuevoMaxH + "&rangoHuevoMinH=" + rangoHuevoMinH + "&idTipoSensorTNuevo=" + idTipoSensorTNuevo + "&idTipoSensorHNuevo=" + idTipoSensorHNuevo, true);
            xmlhttp.send();
        }
        
        function mostrarDatosModificar()    {
            
            var idHuevo, tipoHuevo, periodoIncubacion, noVueltasDia, estacionAno, humedadUltimoDia, tiempoIncubacion, tipoSensorT, tipoSensorH, rangoHuevoMaxT, rangoHuevoMinT, rangoHuevoMaxH, rangoHuevoMinH;
            
            var sensorT = document.getElementById("idtipoSensorTM");
            var sensorH = document.getElementById('idTipoSensorHM');
            cargarSensor('Temperatura', 'idtipoSensorTM');
            cargarSensor('Humedad', 'idTipoSensorHM');
            idHuevo = document.getElementById("tablamodificarhuevos").rows[1].cells[0].innerHTML;
            tipoHuevo = document.getElementById("tablamodificarhuevos").rows[1].cells[1].innerHTML;
            console.log(tipoHuevo);
            periodoIncubacion = document.getElementById("tablamodificarhuevos").rows[1].cells[2].innerHTML;
            noVueltasDia = document.getElementById("tablamodificarhuevos").rows[1].cells[3].innerHTML;
            estacionAno = document.getElementById("tablamodificarhuevos").rows[1].cells[4].innerHTML;
            humedadUltimoDia = document.getElementById("tablamodificarhuevos").rows[1].cells[5].innerHTML;
            tiempoIncubacion = document.getElementById("tablamodificarhuevos").rows[1].cells[6].innerHTML;
            tipoSensorT = document.getElementById("tablamodificarhuevos").rows[1].cells[7].innerHTML;
            rangoHuevoMaxT = document.getElementById("tablamodificarhuevos").rows[1].cells[8].innerHTML;
            rangoHuevoMinT = document.getElementById("tablamodificarhuevos").rows[1].cells[9].innerHTML;
            tipoSensorH = document.getElementById("tablamodificarhuevos").rows[2].cells[7].innerHTML;
            rangoHuevoMaxH = document.getElementById("tablamodificarhuevos").rows[2].cells[8].innerHTML;
            rangoHuevoMinH = document.getElementById("tablamodificarhuevos").rows[2].cells[9].innerHTML;
            
            document.getElementById('idHuevoM').value = idHuevo;
            document.getElementById('tipohuevoM').value = tipoHuevo;
            document.getElementById('periodoIncubacionM').value = periodoIncubacion;
            document.getElementById('noVueltasDiaM').value = noVueltasDia;
            document.getElementById('estacionAnoM').value = estacionAno;
            document.getElementById('humedadUltimoDiaM').value = humedadUltimoDia;
            document.getElementById('tiempoIncubacionM').value = tiempoIncubacion;
            //sensorT.options[0] = new Option(tipoSensorT + ": " + idSensor[0], idSensor[0],"0");
            //sensorT.options[2] = new Option("AAA" + ": " + "BBB", 2,"1");
            //sensorT.selectedIndex=2;
            document.getElementById('rangoHuevoMaxTM').value = rangoHuevoMaxT;
            document.getElementById('rangoHuevoMinTM').value = rangoHuevoMinT;
            
            //sensorH.options[0] = new Option(tipoSensorH + ": " + idSensor[1], idSensor[1],"0");
            //sensorT.selectedIndex=0;
            document.getElementById('rangoHuevoMaxHM').value = rangoHuevoMaxH;
            document.getElementById('rangoHuevoMinHM').value = rangoHuevoMinH;
            
            
            //modificarHuevo( idHuevo, tipoHuevo, periodoIncubacion, noVueltasDia, estacionAno, humedadUltimoDia, tiempoIncubacion );
            
        }
        
        function modificarHuevo(  )   {
            
            var idHuevo = document.getElementById('idHuevoM').value;
            var tipoHuevo = document.getElementById('tipohuevoM').value;
            var periodoIncubacion = document.getElementById('periodoIncubacionM').value;
            var noVueltasDia = document.getElementById('noVueltasDiaM').value;
            var estacionAno = document.getElementById('estacionAnoM').value;
            var humedadUltimoDia = document.getElementById('humedadUltimoDiaM').value;
            var tiempoIncubacion = document.getElementById('tiempoIncubacionM').value;
            
            var idTipoSensorTNuevo = document.getElementById('idtipoSensorTM').value;
            var idTipoSensorHNuevo = document.getElementById('idTipoSensorHM').value;
            var rangoHuevoMaxT = document.getElementById('rangoHuevoMaxTM').value;
            var rangoHuevoMinT = document.getElementById('rangoHuevoMinTM').value;
            var rangoHuevoMaxH = document.getElementById('rangoHuevoMaxHM').value;
            var rangoHuevoMinH = document.getElementById('rangoHuevoMinHM').value;
            
            var tipoSensorT = idSensor[0];
            var tipoSensorH = idSensor[1];
            
            //console.log(tipoHuevo);
            
            getModificar( idHuevo, tipoHuevo, periodoIncubacion, noVueltasDia, estacionAno, humedadUltimoDia, tiempoIncubacion, idTipoSensorTNuevo, idTipoSensorHNuevo, rangoHuevoMaxT, rangoHuevoMinT, rangoHuevoMaxH, rangoHuevoMinH, tipoSensorT, tipoSensorH );
            
            document.getElementById('idHuevoM').value = "";
            document.getElementById('tipohuevoM').value = "";
            document.getElementById('periodoIncubacionM').value = "";
            document.getElementById('noVueltasDiaM').value = "";
            document.getElementById('estacionAnoM').value = "";
            document.getElementById('humedadUltimoDiaM').value = "";
            document.getElementById('tiempoIncubacionM').value = "";
            document.getElementById('idtipoSensorTM').value = "";
            document.getElementById('idTipoSensorHM').value = "";
            document.getElementById('rangoHuevoMaxTM').value = "";
            document.getElementById('rangoHuevoMinTM').value = "";
            document.getElementById('rangoHuevoMaxHM').value = "";
            document.getElementById('rangoHuevoMinHM').value = "";
            
        }
        
        function mostrarDatosEliminar()    {
            
            var idHuevo, tipoHuevo, periodoIncubacion, noVueltasDia, estacionAno, humedadUltimoDia, tiempoIncubacion, tipoSensorT, tipoSensorH, rangoHuevoMaxT, rangoHuevoMinT, rangoHuevoMaxH, rangoHuevoMinH;
            
            var sensorT = document.getElementById("idtipoSensorTE");
            var sensorH = document.getElementById('idTipoSensorHE');
            cargarSensor('Temperatura', 'idtipoSensorTE');
            cargarSensor('Humedad', 'idTipoSensorHE');
            
            idHuevo = document.getElementById("tablaeliminarhuevos").rows[1].cells[0].innerHTML;
            tipoHuevo = document.getElementById("tablaeliminarhuevos").rows[1].cells[1].innerHTML;
            periodoIncubacion = document.getElementById("tablaeliminarhuevos").rows[1].cells[2].innerHTML;
            noVueltasDia = document.getElementById("tablaeliminarhuevos").rows[1].cells[3].innerHTML;
            estacionAno = document.getElementById("tablaeliminarhuevos").rows[1].cells[4].innerHTML;
            humedadUltimoDia = document.getElementById("tablaeliminarhuevos").rows[1].cells[5].innerHTML;
            tiempoIncubacion = document.getElementById("tablaeliminarhuevos").rows[1].cells[6].innerHTML;
            tipoSensorT = document.getElementById("tablaeliminarhuevos").rows[1].cells[7].innerHTML;
            rangoHuevoMaxT = document.getElementById("tablaeliminarhuevos").rows[1].cells[8].innerHTML;
            rangoHuevoMinT = document.getElementById("tablaeliminarhuevos").rows[1].cells[9].innerHTML;
            tipoSensorH = document.getElementById("tablaeliminarhuevos").rows[2].cells[7].innerHTML;
            rangoHuevoMaxH = document.getElementById("tablaeliminarhuevos").rows[2].cells[8].innerHTML;
            rangoHuevoMinH = document.getElementById("tablaeliminarhuevos").rows[2].cells[9].innerHTML;
            
            
            document.getElementById('idHuevoE').value = idHuevo;
            document.getElementById('tipohuevoE').value = tipoHuevo;
            document.getElementById('periodoIncubacionE').value = periodoIncubacion;
            document.getElementById('noVueltasDiaE').value = noVueltasDia;
            document.getElementById('estacionAnoE').value = estacionAno;
            document.getElementById('humedadUltimoDiaE').value = humedadUltimoDia;
            document.getElementById('tiempoIncubacionE').value = tiempoIncubacion;
            //sensorT.options[0] = new Option(tipoSensorT + ": " + idSensor[0], idSensor[0],"0");
            //sensorT.options[2] = new Option("AAA" + ": " + "BBB", 2,"1");
            //sensorT.selectedIndex=2;
            document.getElementById('rangoHuevoMaxTE').value = rangoHuevoMaxT;
            document.getElementById('rangoHuevoMinTE').value = rangoHuevoMinT;
            
            //sensorH.options[0] = new Option(tipoSensorH + ": " + idSensor[1], idSensor[1],"0");
            //sensorT.selectedIndex=0;
            document.getElementById('rangoHuevoMaxHE').value = rangoHuevoMaxH;
            document.getElementById('rangoHuevoMinHE').value = rangoHuevoMinH;
            
            
            //modificarHuevo( idHuevo, tipoHuevo, periodoIncubacion, noVueltasDia, estacionAno, humedadUltimoDia, tiempoIncubacion );
            
        }
        
        function getElimina( idHuevo )     {
            obj = { "user":"Andres", "pass":"1111" };
            dbParam = JSON.stringify(obj);

            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    json = JSON.parse(this.responseText);
                    console.log(json);
                    if(json == 1)   {
                        alert('Huevo Eliminado');
                        mostrarDatos("tablaeliminarhuevos");
                    }
                    else    {
                        alert('Error');
                    }
                }
                //document.getElementById("demo1").innerHTML = json['huevo']['movil'][0]['idHuevo'];
            };
            xmlhttp.open("GET", "php/eliminarHuevo.php?idHuevo=" + idHuevo, true);
            xmlhttp.send();
        }
        
        function eliminarHuevo(  )   {
            
            var idHuevo = document.getElementById('idHuevoE').value;
            
            getElimina( idHuevo );
            
            document.getElementById('idHuevoE').value = "";
            document.getElementById('tipohuevoE').value = "";
            document.getElementById('periodoIncubacionE').value = "";
            document.getElementById('noVueltasDiaE').value = "";
            document.getElementById('estacionAnoE').value = "";
            document.getElementById('humedadUltimoDiaE').value = "";
            document.getElementById('tiempoIncubacionE').value = "";
            
        }


//document.getElementById("demo1").innerHTML = dbParam;
    </script>

  </body>
  
  
</html>
