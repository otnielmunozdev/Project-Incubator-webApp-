<?php
require_once ("conexion.php");
$conexion = conectarBD();

//$usuario = $_GET['user'];
//$contrasena = $_GET['pass'];

$idIncubadora = $_GET['idIncubadora'];

$opcion = 0;

pg_query($conexion, "BEGIN");

try {
    $sql = "UPDATE incubadora SET valido=false WHERE idincubadora=".$idIncubadora;
    $exito = pg_query( $conexion, $sql );

    if( $exito )    {
        $opcion = 1;
    }
}   catch( Exception $e ){
    pg_query($conexion, "ROLLBACK");
}

if( $opcion == 1 )   {
    pg_query($conexion, "COMMIT");
    echo 1;
}
else    {
    pg_query($conexion, "ROLLBACK");
    echo 0;
}
?>