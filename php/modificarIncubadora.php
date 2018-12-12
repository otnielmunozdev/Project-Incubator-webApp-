<?php
require_once ("conexion.php");
$conexion = conectarBD();

//$usuario = $_GET['user'];
//$contrasena = $_GET['pass'];

$idIncubadora = $_GET['idIncubadora'];
$tamano = $_GET['tamano'];
$capacidadMaxima = $_GET['capacidadMaxima'];
$codigoAcceso = $_GET['codigoAcceso'];

$opcion = 0;

pg_query($conexion, "BEGIN");

try {
    $sql = "UPDATE incubadora SET tamano='".$tamano."', capacidadmaxima='".$capacidadMaxima."' WHERE idincubadora=".$idIncubadora;
    $exito = pg_query( $conexion, $sql );
    //echo $sql;

    if( $exito )    {
        $query = "UPDATE ver_incubadora SET codigoacceso='".$codigoAcceso."' WHERE idincubadora=".$idIncubadora;
        $query_exec = pg_query( $conexion, $query );
        
        if( $query_exec )   {
            $opcion = 1;
        }
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