<?php
require_once ("conexion.php");
$conexion = conectarBD();
//require_once ("conexionMovil.php");
//$conexionM = conectarBDM();

$atributo = $_GET['atributo'];
$dato = $_GET['dato'];

//$usuario = $_GET['user'];
//$contrasena = $_GET['pass'];

$arrayPrincipal = [];
$arrayPrincipal2 = [];

$tabla = 'incubadora';
if($atributo == 'codigoacceso')   {
    $tabla = 'ver_incubadora';
}


$query = "SELECT * FROM incubadora, ver_incubadora WHERE incubadora.valido = true AND ".$tabla.".".$atributo." = '".$dato."' AND incubadora.idincubadora = ver_incubadora.idincubadora ORDER BY incubadora.idincubadora;";
$exito = pg_query($conexion, $query);

if( $exito )   {
    if( pg_num_rows($exito) > 0 ) {
        while( $obj = pg_fetch_object($exito) )   {
            array_push($arrayPrincipal2, $obj);
        }
    }
}

$arrayPrincipal = array(
    "incubadora" => $arrayPrincipal2);

echo json_encode($arrayPrincipal);
//echo var_dump($arrayPrincipal['huevo']['movil'][0]['idHuevo']);
    
?>