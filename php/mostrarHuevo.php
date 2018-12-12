<?php
require_once ("conexion.php");
$conexion = conectarBD();
require_once ("conexionMovil.php");
$conexionM = conectarBDM();

//$usuario = $_GET['user'];
//$contrasena = $_GET['pass'];

$arrayWeb = [];
$arrayMovil = [];
$arrayPrincipal = [];
$arraySensor = [];


// Base WEB
$sql = "SELECT * FROM huevo WHERE valido=true ORDER BY idhuevo;";
$rs = pg_query( $conexion, $sql );
if( $rs )   {
    if( pg_num_rows($rs) > 0 ) {
        while( $obj = pg_fetch_object($rs) )   {
            array_push($arrayWeb, $obj);
            array_push($arrayWeb, $obj);
        }
    }
}

// Base MOVIL
$query = "select * from huevo, rango_huevo, tipo_sensor WHERE huevo.idHuevo=rango_huevo.idHuevo AND tipo_sensor.idTipoSensor=rango_huevo.idTipoSensor AND huevo.valido=true ORDER BY rango_huevo.idRangoHuevo;";
$query_exec = mysqli_query($conexionM, $query);
//$salida = array("dato" => "a", "nombre" => "Andres");
if(mysqli_num_rows($query_exec)){
    while($row=mysqli_fetch_assoc($query_exec)){
        array_push($arrayMovil, $row);
        //$huevo['huevo'][]=$row;
    }
}

$arrayPrincipal2 = array(
    "web" => $arrayWeb,
    "movil" => $arrayMovil);

$arrayPrincipal = array(
    "huevo" => $arrayPrincipal2);

echo json_encode($arrayPrincipal);
//echo var_dump($arrayPrincipal['huevo']['movil'][0]['idHuevo']);

?>