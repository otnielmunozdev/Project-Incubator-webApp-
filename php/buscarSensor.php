<?php
//require_once ("conexion.php");
//$conexion = conectarBD();
require_once ("conexionMovil.php");
$conexionM = conectarBDM();

$atributo = $_GET['atributo'];
$dato = $_GET['dato'];

$arrayWeb = [];
$arrayMovil = [];
$arrayPrincipal = [];
$arraybuscar = [];


$tabla = 'sensor';
if($atributo == 'tipoSensor')   {
    $tabla = 'tipo_sensor';
}
else if($atributo == 'registro')   {
    $tabla = 'registro_sensor';
}

$query = "SELECT * FROM sensor, tipo_sensor, registro_sensor WHERE sensor.valido=true AND ".$tabla.".".$atributo." = '".$dato."' AND sensor.idSensor=tipo_sensor.idSensor AND tipo_sensor.idTipoSensor = registro_sensor.idTipoSensor ORDER BY sensor.idSensor;";

$query_exec = mysqli_query($conexionM, $query);
if(mysqli_num_rows($query_exec)){
    while($row=mysqli_fetch_assoc($query_exec)){
        array_push($arrayMovil, $row);
    }
}

$arrayPrincipal = array(
    "sensor" => $arrayMovil);

echo json_encode($arrayPrincipal);


?>