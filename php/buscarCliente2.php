<?php
require_once ("conexion.php");
$conexion = conectarBD();
//$usuario = $_GET['user'];
//$contrasena = $_GET['pass'];

$atributo = $_GET['atributo'];
$dato = $_GET['dato'];


$opcion = 0;
$json;

$sql = "SELECT * FROM cliente WHERE ".$atributo." = '".$dato."'";
$rs = pg_query( $conexion, $sql );
if( $rs )   {
     if( pg_num_rows($rs) > 0 ) {
        while( $obj = pg_fetch_object($rs) )    {
            $json['cliente'][] = $obj;
        }
        $opcion = 1;
    }
}

if($opcion) {
    echo json_encode($json);
}
else    {
    echo 0;
}
?>