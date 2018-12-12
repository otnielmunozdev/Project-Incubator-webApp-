<?php
//require_once ("conexion.php");
//$conexion = conectarBD();
require_once ("conexionMovil.php");
$conexionM = conectarBDM();

//$usuario = $_GET['user'];
//$contrasena = $_GET['pass'];

$arrayPrincipal = [];
$arrayPrincipal2 = [];


$query = "select * from sensor, tipo_sensor, registro_sensor WHERE sensor.valido=true AND sensor.idSensor=tipo_sensor.idSensor AND tipo_sensor.idTipoSensor = registro_sensor.idTipoSensor ORDER BY sensor.idSensor;";
$query_exec = mysqli_query($conexionM, $query);
//$salida = array("dato" => "a", "nombre" => "Andres");
if(mysqli_num_rows($query_exec)){
    while($row=mysqli_fetch_assoc($query_exec)){
        array_push($arrayPrincipal2, $row);
        //$huevo['huevo'][]=$row;
    }
}


$arrayPrincipal = array(
    "sensor" => $arrayPrincipal2);

echo json_encode($arrayPrincipal);
//echo var_dump($arrayPrincipal['huevo']['movil'][0]['idHuevo']);
    
?>