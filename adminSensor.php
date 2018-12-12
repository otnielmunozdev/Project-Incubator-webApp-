<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Administración</title>
    <meta name="description" content="Aplicacion web de incubadora">
    <meta name="keywords" content="Encubadora, Incubadora, Huevos , Pollos">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0, minimum-scale=1.0" >
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="estilosadminsensor.css">
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
          Panel de Administración de Huevos Emplumados Sección de Sensores
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
            <a class="nav-link active" id="pills-AgregarSensor-tab" data-toggle="pill" href="#pills-AgregarSensor" role="tab" aria-controls="pills-AgregarSensor" aria-selected="true">Agregar Sensor</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-MostrarSensor-tab" data-toggle="pill" href="#pills-MostrarSensor" role="tab" aria-controls="pills-MostrarSensor" aria-selected="false" onclick="mostrarDatos('tablamostrarsensor')">Mostrar Sensor</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-ModificarSensor-tab" data-toggle="pill" href="#pills-ModificarSensor" role="tab" aria-controls="pills-ModificarSensor" aria-selected="false" onclick="mostrarDatos('tablamodificarsensor')">Modificar Sensor</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-EliminarSensor-tab" data-toggle="pill" href="#pills-EliminarSensor" role="tab" aria-controls="pills-EliminarSensor" aria-selected="false" onclick="mostrarDatos('tablaeliminarsensor')">Eliminar Sensor</a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">

          <!--inicio del formulario Agregar Sensor-->
          <div class="tab-pane fade show active" id="pills-AgregarSensor" role="tabpanel" aria-labelledby="pills-AgregarSensor-tab">
            <form>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="codigosensor">Codigo del Sensor</label>
                  <input type="text" class="form-control" id="codigoA" placeholder="Codigo">
                  <label for="rangosensormin">Rango minimo del sensor</label>
                  <input type="text" class="form-control" id="rangoSensorMinA" placeholder="Rango del sensor Min">
                  <label for="rangosensormax">Rango maximo del sensor</label>
                  <input type="text" class="form-control" id="rangoSensorMaxA" placeholder="Rango del sensor Max">
                  <label for="precisionsensor">Precision del sensor</label>
                  <input type="text" class="form-control" id="precisionSensorA" placeholder="Precision del sensor">
                  <label for="distanciatransmicion">Distancia de transmicion</label>
                  <input type="text" class="form-control" id="distanciaTransmicionA" placeholder="Distancia de transmicion">
                  <label for="voltajesensor">Voltaje del sensor</label>
                  <input type="text" class="form-control" id="voltajeA" placeholder="voltaje del sensor">
                  <label for="tiposensor">Tipo del sensor</label>
                  <input type="text" class="form-control" id="tipoSensorA" placeholder="Tipo del sensor">
                  <?php $usuario = $_GET['user']; $contrasena = $_GET['pass']; 
                  //echo '<input type="hidden" name="user" value='.$usuario.'>';
                  //echo '<input type="hidden" name="pass" value='.$contrasena.'>';
                  ?>
                  <!--<input type="submit" value="Cliente" class="display-4 text-center" role="button" aria-pressed="true">-->
                  <br>
                  <button type="button" class="btn btn-primary" id="agregarsensorboton" onclick="agregarDatos( document.getElementById('codigoA').value, document.getElementById('rangoSensorMinA').value, document.getElementById('rangoSensorMaxA').value, document.getElementById('precisionSensorA').value, document.getElementById('distanciaTransmicionA').value, document.getElementById('voltajeA').value, document.getElementById('tipoSensorA').value )">Agregar Sensor</button> <br>
                </div>
                <div class="form-group col-md-6">
                  <div class="container">
                      <h1 class="display-2 text-center">Panel de Administración</h1>
                      <h2 class="display-3 text-center">(Sensor)</h2>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <!--Fin del formulario Agregar Sensor-->

          <!--inicio del formulario Mostrar Sensor-->
          <div class="tab-pane fade" id="pills-MostrarSensor" role="tabpanel" aria-labelledby="pills-MostrarSensor-tab">
            <form>
              <div class="form-row">
                <div class="form-group col-md-5">
                  <label for="buscaridsensorselect">Buscar</label>
                  <select class="form-control" id="buscaridsensorselectV">
                    <option value="idSensor">ID</option>
                    <option value="codigo">CODIGO</option>
                    <option value="rangoSensorMin">RANGO MINIMO DEL SENSOR</option>
                    <option value="rangoSensorMax">RANGO MAXIMO DEL SENSRO</option>
                    <option value="precisionSensor">PRECISION DEL SENSOR</option>
                    <option value="distanciaTransmicion">DISTANCIA DE TRANSMICION</option>
                    <option value="voltaje">VOLTAJE</option>
                    <option value="estadoActual">ESTADO SENSOR</option>
                    <option value="tipoSensor">TIPO SENSOR</option>
                    <option value="registro">REGISTRO</option>
                  </select>
                </div>
                <div class="form-group col-md-5">
                  <label for="buscaridsensor">Search</label>
                  <form class="form-inline">
                    <input type="text" class="form-control" placeholder="Search" id="buscaridsensorV">
                    <button class="btn btn-outline-success" type="button" id="buscaridsensorboton" onclick="buscarDato('tablamostrarsensor', document.getElementById('buscaridsensorselectV').value, document.getElementById('buscaridsensorV').value)">Search</button>
                  </form>
                </div>
                <div class="form-group col-sm-8">
                  <table class="table table-bordered table-responsive-sm" style="background-color:rgba(64, 25, 66, 0.84);" id="tablamostrarsensor">
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
          <div class="tab-pane fade" id="pills-ModificarSensor" role="tabpanel" aria-labelledby="pills-ModificarSensor-tab">
            <form>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="buscaridsensorselect">Buscar</label>
                  <select class="form-control" id="buscaridsensorselectM">
                    <option value="idSensor">ID</option>
                    <option value="codigo">CODIGO</option>
                    <option value="rangoSensorMin">RANGO MINIMO DEL SENSOR</option>
                    <option value="rangoSensorMax">RANGO MAXIMO DEL SENSRO</option>
                    <option value="precisionSensor">PRECISION DEL SENSOR</option>
                    <option value="distanciaTransmicion">DISTANCIA DE TRANSMICION</option>
                    <option value="voltaje">VOLTAJE</option>
                    <option value="estadoActual">ESTADO SENSOR</option>
                    <option value="tipoSensor">TIPO SENSOR</option>
                    <option value="registro">REGISTRO</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="buscaridsensor">Search</label>
                  <form class="form-inline">
                    <input type="text" class="form-control" placeholder="Search" id="buscaridsensorM">
                    <button class="btn btn-outline-success" type="button" id="buscaridsensorboton" onclick="buscarDato('tablamodificarsensor', document.getElementById('buscaridsensorselectM').value, document.getElementById('buscaridsensorM').value); mostrarDatosModificar();">Search</button>
                  </form>
                </div>
                <div class="form-group col-md-3">
                  <input type="hidden" id="idSensorM">
                  <label for="codigosensorModificar">Codigo del Sensor</label>
                  <input type="text" class="form-control" id="codigoM" placeholder="Codigo">
                  <label for="rangosensorminModificar">Rango minimo del sensor</label>
                  <input type="text" class="form-control" id="rangoSensorMinM" placeholder="Rango del sensor Min">
                  <label for="rangosensormaxModificar">Rango maximo del sensor</label>
                  <input type="text" class="form-control" id="rangoSensorMaxM" placeholder="Rango del sensor Max">
                  <label for="precisionsensorModificar">Precision del sensor</label>
                  <input type="text" class="form-control" id="precisionSensorM" placeholder="Precision del sensor">
                  <label for="distanciatransmicionModificar">Distancia de transmicion</label>
                  <input type="text" class="form-control" id="distanciaTransmicionM" placeholder="Distancia de transmicion">
                  <label for="voltajesensorModificar">Voltaje del sensor</label>
                  <input type="text" class="form-control" id="voltajeM" placeholder="voltaje del sensor">
                  <label for="estadoactualModificar">Estaod Actual del sensor</label>
                  <input type="text" class="form-control" id="estadoActualM" placeholder="0 o 1">
                  <label for="tiposensorModificar">Tipo del sensor</label>
                  <input type="text" class="form-control" id="tipoSensorM" placeholder="Tipo del sensor">
                  <label for="registrosensorModificar">Registro</label>
                  <input type="text" class="form-control" id="registroM" placeholder="RegistroSensor">
                  
                  <button type="button" class="btn btn-primary" style="margin:10px;" id="ModificarSensorboton" onclick="modificarSensor()"> Modificar </button>
                  
                </div>

                <div class="form-group col-sm-9 ">
                  <table class="table table-bordered table-responsive-sm" style="background-color:rgba(64, 25, 66, 0.84);" id="tablamodificarsensor">
                    
                    
                    </table>
                </div>
              </div>
            </form>
          </div>
          <!--Fin del formulario Modificar incubadora-->

          <!--inicio del formulario Eliminar incubadora-->
          <div class="tab-pane fade" id="pills-EliminarSensor" role="tabpanel" aria-labelledby="pills-EliminarSensor-tab">
            <form>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="buscaridsensorselect">Buscar</label>
                  <select class="form-control" id="buscaridsensorselectE">
                    <option value="idSensor">ID</option>
                    <option value="codigo">CODIGO</option>
                    <option value="rangoSensorMin">RANGO MINIMO DEL SENSOR</option>
                    <option value="rangoSensorMax">RANGO MAXIMO DEL SENSRO</option>
                    <option value="precisionSensor">PRECISION DEL SENSOR</option>
                    <option value="distanciaTransmicion">DISTANCIA DE TRANSMICION</option>
                    <option value="voltaje">VOLTAJE</option>
                    <option value="estadoActual">ESTADO SENSOR</option>
                    <option value="tipoSensor">TIPO SENSOR</option>
                    <option value="registro">REGISTRO</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="buscaridsensor">Search</label>
                  <form class="form-inline">
                    <input type="text" class="form-control" placeholder="Search" id="buscaridsensorE">
                    <button class="btn btn-outline-success" type="button" id="buscaridsensorboton" onclick="buscarDato('tablaeliminarsensor', document.getElementById('buscaridsensorselectE').value, document.getElementById('buscaridsensorE').value); mostrarDatosEliminar();">Search</button>
                  </form>
                </div>
                <div class="form-group col-md-3">
                  <input type="hidden" id="idSensorE">
                  <label for="codigosensorEliminar">Codigo del Sensor</label>
                  <input type="text" class="form-control" id="codigoE" placeholder="Codigo">
                  <label for="rangosensorminEliminar">Rango minimo del sensor</label>
                  <input type="text" class="form-control" id="rangoSensorMinE" placeholder="Rango del sensor Min">
                  <label for="rangosensormaxEliminar">Rango maximo del sensor</label>
                  <input type="text" class="form-control" id="rangoSensorMaxE" placeholder="Rango del sensor Max">
                  <label for="precisionsensorEliminar">Precision del sensor</label>
                  <input type="text" class="form-control" id="precisionSensorE" placeholder="Precision del sensor">
                  <label for="distanciatransmicionEliminar">Distancia de transmicion</label>
                  <input type="text" class="form-control" id="distanciaTransmicionE" placeholder="Distancia de transmicion">
                  <label for="voltajesensorEliminar">Voltaje del sensor</label>
                  <input type="text" class="form-control" id="voltajeE" placeholder="voltaje del sensor">
                  <label for="estadoactualEliminar">Estaod Actual del sensor</label>
                  <input type="text" class="form-control" id="estadoActualE" placeholder="0 o 1">
                  <label for="tiposensorEliminar">Tipo del sensor</label>
                  <input type="text" class="form-control" id="tipoSensorE" placeholder="Tipo del sensor">
                  <label for="registrosensorEliminar">Registro</label>
                  <input type="text" class="form-control" id="registroE" placeholder="RegistroSensor">
                  
                  <input type="button" name="" value="Eliminar" class="btn btn-primary" style="margin:10px;" id="EliminarSensorboton" onclick="eliminarSensor()">
                </div>

                <div class="form-group col-sm-9 ">
                  <table class="table table-bordered table-responsive-sm" style="background-color:rgba(64, 25, 66, 0.84);" id="tablaeliminarsensor">
                    
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
        
        function agregarDatos( codigo, rangoSensorMin, rangoSensorMax, precisionSensor, distanciaTransmicion, voltaje, tipoSensor ) {
            obj = { "user":"Andres", "pass":"1111" };
            dbParam = JSON.stringify(obj);

            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    json = this.responseText;
                    console.log("OK");
                    if(json == 1)   {
                        alert('Sensor Agregado');
                    }
                    else    {
                        alert('Error');
                    }
                }
            };
            
            /*function miFuncion()  {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    json = xmlhttp.responseText;
                    //json = JSON.parse(this.responseText);
                    console.log("OK");
                    if(json == 1)   {
                        alert('Sensor Agregado');
                    }
                    else    {
                        alert('Error');
                    }
                }
            }*/
            
            //xmlhttp.onreadystatechange = miFuncion;
            xmlhttp.open("GET", "php/agregarSensor.php?codigo=" + codigo+"&rangoSensorMin=" + rangoSensorMin + "&rangoSensorMax=" + rangoSensorMax + "&precisionSensor=" + precisionSensor + "&distanciaTransmicion=" + distanciaTransmicion + "&voltaje=" + voltaje + "&tipoSensor=" + tipoSensor, true);
            xmlhttp.send();
            document.getElementById('codigoA').value = "";
            document.getElementById('rangoSensorMinA').value = "";
            document.getElementById('rangoSensorMaxA').value = "";
            document.getElementById('precisionSensorA').value = "";
            document.getElementById('distanciaTransmicionA').value = "";
            document.getElementById('voltajeA').value = "";
            document.getElementById('tipoSensorA').value = "";
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
            xmlhttp.open("GET", "php/mostrarSensor.php?x=" + dbParam, true);
            xmlhttp.send();
        }

        getDatos();
        function mostrarDatos( tabla ) {
            getDatos();
            var bandera = true;
            console.log(json);
            var tamano = json['sensor'].length;
            var table = document.getElementById(tabla);
            
            var row;
            var cell1, cell2, cell3, cell4, cell5, cell6, cell7, cell8, cell9, cell10;

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
                cell8 = row.insertCell(7);
                cell9 = row.insertCell(8);
                cell10 = row.insertCell(9);

                cell1.innerHTML = json['sensor'][i]['idSensor'];
                cell2.innerHTML = json['sensor'][i]['codigo'];
                cell3.innerHTML = json['sensor'][i]['rangoSensorMin'];
                cell4.innerHTML = json['sensor'][i]['rangoSensorMax'];
                cell5.innerHTML = json['sensor'][i]['precisionSensor'];
                cell6.innerHTML = json['sensor'][i]['distanciaTransmicion'];
                cell7.innerHTML = json['sensor'][i]['voltaje'];
                cell8.innerHTML = json['sensor'][i]['estadoActual'];
                cell9.innerHTML = json['sensor'][i]['tipoSensor'];
                cell10.innerHTML = json['sensor'][i]['registro'];

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
            cell2.innerHTML = "CODIGO";
            cell3.innerHTML = "RANGO MIN";
            cell4.innerHTML = "RANGO MAX";
            cell5.innerHTML = "PRECISION";
            cell6.innerHTML = "DISTANCIA TRANSMICION";
            cell7.innerHTML = "VOLTAJE";
            cell8.innerHTML = "ESTADO ACTUAL";
            cell9.innerHTML = "TIPO DE SENSOR";
            cell10.innerHTML = "REGISTRO";
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
            xmlhttp.open("GET", "php/buscarSensor.php?atributo=" + atributo+"&dato="+dato, true);
            xmlhttp.send();
        }
        
        function buscarDato( tabla, atributo, dato )   {
            getBusqueda(atributo, dato);
            var bandera = true;
            var tamano = json['sensor'].length;
            var table = document.getElementById(tabla);
            //var table = document.getElementById("tablamostrarhuevos");
            
            var row;
            var cell1, cell2, cell3, cell4, cell5, cell6, cell7, cell8, cell9, cell10;

            console.log(atributo);
            console.log(dato);
            //console.log(json);
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
                cell8 = row.insertCell(7);
                cell9 = row.insertCell(8);
                cell10 = row.insertCell(9);

                cell1.innerHTML = json['sensor'][i]['idSensor'];
                cell2.innerHTML = json['sensor'][i]['codigo'];
                cell3.innerHTML = json['sensor'][i]['rangoSensorMin'];
                cell4.innerHTML = json['sensor'][i]['rangoSensorMax'];
                cell5.innerHTML = json['sensor'][i]['precisionSensor'];
                cell6.innerHTML = json['sensor'][i]['distanciaTransmicion'];
                cell7.innerHTML = json['sensor'][i]['voltaje'];
                cell8.innerHTML = json['sensor'][i]['estadoActual'];
                cell9.innerHTML = json['sensor'][i]['tipoSensor'];
                cell10.innerHTML = json['sensor'][i]['registro'];

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
            cell2.innerHTML = "CODIGO";
            cell3.innerHTML = "RANGO MIN";
            cell4.innerHTML = "RANGO MAX";
            cell5.innerHTML = "PRECISION";
            cell6.innerHTML = "DISTANCIA TRANSMICION";
            cell7.innerHTML = "VOLTAJE";
            cell8.innerHTML = "ESTADO ACTUAL";
            cell9.innerHTML = "TIPO DE SENSOR";
            cell10.innerHTML = "REGISTRO";
            
        }
        
        function getModificar( idSensor, codigo, rangoSensorMin, rangoSensorMax, precisionSensor, distanciaTransmicion, voltaje, estadoActual, tipoSensor, registro )     {
            obj = { "user":"Andres", "pass":"1111" };
            dbParam = JSON.stringify(obj);

            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    json = this.responseText;
                    console.log(json);
                    if(json == 1)   {
                        alert('Sensor Modificado');
                        mostrarDatos("tablamodificarsensor");
                    }
                    else    {
                        alert('Error');
                    }
                }
                //document.getElementById("demo1").innerHTML = json['huevo']['movil'][0]['idHuevo'];
            };
            //console.log(tipoHuevo);
            xmlhttp.open("GET", "php/modificarSensor.php?idSensor=" + idSensor + "&codigo=" + codigo + "&rangoSensorMin=" + rangoSensorMin + "&rangoSensorMax=" + rangoSensorMax + "&precisionSensor=" + precisionSensor + "&distanciaTransmicion=" + distanciaTransmicion + "&voltaje=" + voltaje + "&estadoActual=" + estadoActual + "&tipoSensor=" + tipoSensor + "&registro=" + registro, true);
            xmlhttp.send();
        }
        
        function mostrarDatosModificar()    {
            
            var idSensor, codigo, rangoSensorMin, rangoSensorMax, precisionSensor, distanciaTransmicion, voltaje, estadoActual, tipoSensor, registro;
            
            idSensor = document.getElementById("tablamodificarsensor").rows[1].cells[0].innerHTML;
            codigo = document.getElementById("tablamodificarsensor").rows[1].cells[1].innerHTML;
            rangoSensorMin = document.getElementById("tablamodificarsensor").rows[1].cells[2].innerHTML;
            rangoSensorMax = document.getElementById("tablamodificarsensor").rows[1].cells[3].innerHTML;
            precisionSensor = document.getElementById("tablamodificarsensor").rows[1].cells[4].innerHTML;
            distanciaTransmicion = document.getElementById("tablamodificarsensor").rows[1].cells[5].innerHTML;
            voltaje = document.getElementById("tablamodificarsensor").rows[1].cells[6].innerHTML;
            estadoActual = document.getElementById("tablamodificarsensor").rows[1].cells[7].innerHTML;
            tipoSensor = document.getElementById("tablamodificarsensor").rows[1].cells[8].innerHTML;
            registro = document.getElementById("tablamodificarsensor").rows[1].cells[9].innerHTML;
            
            document.getElementById('idSensorM').value = idSensor;
            document.getElementById('codigoM').value = codigo;
            document.getElementById('rangoSensorMinM').value = rangoSensorMin;
            document.getElementById('rangoSensorMaxM').value = rangoSensorMax;
            document.getElementById('precisionSensorM').value = precisionSensor;
            document.getElementById('distanciaTransmicionM').value = distanciaTransmicion;
            document.getElementById('voltajeM').value = voltaje;
            document.getElementById('estadoActualM').value = estadoActual;
            document.getElementById('tipoSensorM').value = tipoSensor;
            document.getElementById('registroM').value = registro;
            //modificarHuevo( idHuevo, tipoHuevo, periodoIncubacion, noVueltasDia, estacionAno, humedadUltimoDia, tiempoIncubacion );
            
        }
        
        function modificarSensor(  )   {
            
            var idSensor = document.getElementById('idSensorM').value;
            var codigo = document.getElementById('codigoM').value;
            var rangoSensorMin = document.getElementById('rangoSensorMinM').value;
            var rangoSensorMax = document.getElementById('rangoSensorMaxM').value;
            var precisionSensor = document.getElementById('precisionSensorM').value;
            var distanciaTransmicion = document.getElementById('distanciaTransmicionM').value;
            var voltaje = document.getElementById('voltajeM').value;
            var estadoActual = document.getElementById('estadoActualM').value;
            var tipoSensor = document.getElementById('tipoSensorM').value;
            var registro = document.getElementById('registroM').value;
            
            //console.log(tipoHuevo);
            
            getModificar( idSensor, codigo, rangoSensorMin, rangoSensorMax, precisionSensor, distanciaTransmicion, voltaje, estadoActual, tipoSensor, registro );
            
            document.getElementById('idSensorM').value = "";
            document.getElementById('codigoM').value = "";
            document.getElementById('rangoSensorMinM').value = "";
            document.getElementById('rangoSensorMaxM').value = "";
            document.getElementById('precisionSensorM').value = "";
            document.getElementById('distanciaTransmicionM').value = "";
            document.getElementById('voltajeM').value = "";
            document.getElementById('estadoActualM').value = "";
            document.getElementById('tipoSensorM').value = "";
            document.getElementById('registroM').value = "";
            
        }
        
        function mostrarDatosEliminar()    {
            
            var idSensor, codigo, rangoSensorMin, rangoSensorMax, precisionSensor, distanciaTransmicion, voltaje, estadoActual, tipoSensor, registro;
            
            idSensor = document.getElementById("tablaeliminarsensor").rows[1].cells[0].innerHTML;
            codigo = document.getElementById("tablaeliminarsensor").rows[1].cells[1].innerHTML;
            rangoSensorMin = document.getElementById("tablaeliminarsensor").rows[1].cells[2].innerHTML;
            rangoSensorMax = document.getElementById("tablaeliminarsensor").rows[1].cells[3].innerHTML;
            precisionSensor = document.getElementById("tablaeliminarsensor").rows[1].cells[4].innerHTML;
            distanciaTransmicion = document.getElementById("tablaeliminarsensor").rows[1].cells[5].innerHTML;
            voltaje = document.getElementById("tablaeliminarsensor").rows[1].cells[6].innerHTML;
            estadoActual = document.getElementById("tablaeliminarsensor").rows[1].cells[7].innerHTML;
            tipoSensor = document.getElementById("tablaeliminarsensor").rows[1].cells[8].innerHTML;
            registro = document.getElementById("tablaeliminarsensor").rows[1].cells[9].innerHTML;
            
            document.getElementById('idSensorE').value = idSensor;
            document.getElementById('codigoE').value = codigo;
            document.getElementById('rangoSensorMinE').value = rangoSensorMin;
            document.getElementById('rangoSensorMaxE').value = rangoSensorMax;
            document.getElementById('precisionSensorE').value = precisionSensor;
            document.getElementById('distanciaTransmicionE').value = distanciaTransmicion;
            document.getElementById('voltajeE').value = voltaje;
            document.getElementById('estadoActualE').value = estadoActual;
            document.getElementById('tipoSensorE').value = tipoSensor;
            document.getElementById('registroE').value = registro;
            
            //modificarHuevo( idHuevo, tipoHuevo, periodoIncubacion, noVueltasDia, estacionAno, humedadUltimoDia, tiempoIncubacion );
            
        }
        
        function getElimina( idSensor )     {
            obj = { "user":"Andres", "pass":"1111" };
            dbParam = JSON.stringify(obj);

            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    json = JSON.parse(this.responseText);
                    console.log(json);
                    if(json == 1)   {
                        alert('Sensor Eliminado');
                        mostrarDatos("tablaeliminarsensor");
                    }
                    else    {
                        alert('Error');
                    }
                }
                //document.getElementById("demo1").innerHTML = json['huevo']['movil'][0]['idHuevo'];
            };
            xmlhttp.open("GET", "php/eliminarSensor.php?idSensor=" + idSensor, true);
            xmlhttp.send();
        }
        
        function eliminarSensor(  )   {
            
            var idSensor = document.getElementById('idSensorE').value;
            
            getElimina( idSensor );
            
            document.getElementById('idSensorE').value = "";
            document.getElementById('codigoE').value = "";
            document.getElementById('rangoSensorMinE').value = "";
            document.getElementById('rangoSensorMaxE').value = "";
            document.getElementById('precisionSensorE').value = "";
            document.getElementById('distanciaTransmicionE').value = "";
            document.getElementById('voltajeE').value = "";
            document.getElementById('estadoActualE').value = "";
            document.getElementById('tipoSensorE').value = "";
            document.getElementById('registroE').value = "";
            
        }
        
    </script>

  </body>
  
  
</html>
