<?php
require_once ("conexion.php");
$conexion = conectarBD();

$usuario = $_GET['user'];
$contrasena = $_GET['pass'];

require_once ("buscarAdministrador.php");
$idAdministrador = buscarAdministrador( $usuario, $contrasena, $conexion);

$tamano = $_GET['tamano'];
$capacidadMaxima = $_GET['capacidadMaxima'];
$codigoAcceso = $_GET['codigoAcceso'];

$opcion = 0;
$ultimoId;

pg_query($conexion, "BEGIN");
    
try {
    $sql = "INSERT INTO incubadora(tamano, capacidadmaxima, valido, idadministrador) VALUES ('".$tamano."', '".$capacidadMaxima."', true,  ".$idAdministrador.") RETURNING idincubadora";
    $exito = pg_query( $conexion, $sql );

    if( $exito )   {
        if( pg_num_rows($exito) > 0 ) {
            while( $obj = pg_fetch_object($exito) )   {
                $ultimoId = $obj->idincubadora;
            }
        }
    }
    
    if( $exito )    {
        $query = "INSERT INTO ver_incubadora(codigoacceso, idincubadora, idadministrador) VALUES ('".$codigoAcceso."', ".$ultimoId." , ".$idAdministrador.")";
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