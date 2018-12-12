<?php
require_once ("conexion.php");
$conexion = conectarBD();
require_once ("conexionMovil.php");
$conexionM = conectarBDM();

//$usuario = $_GET['user'];
//$contrasena = $_GET['pass'];

//require_once ("buscarAdministrador.php");
//$idAdministrador = buscarAdministrador( $usuario, $contrasena, $conexion);

$idHuevo = $_GET['idHuevo'];

$opcion = 0;

mysqli_autocommit($conexionM, FALSE);
pg_query($conexion, "BEGIN");

try {
    $sql =  "UPDATE huevo SET valido = false WHERE idhuevo=".$idHuevo;
    $exito = pg_query( $conexion, $sql );

    if( $exito )    {
        
        $query_search = "UPDATE huevo SET valido = false WHERE idHuevo=".$idHuevo;
        $query_exec = mysqli_query($conexionM, $query_search);    
        if( $query_exec )   {
            $opcion = 1;
        }
    }
} catch( Exception $e ){
    mysqli_rollback( $conexionM );
    pg_query($conexion, "ROLLBACK");
}

if($opcion == 1)    {
    mysqli_commit($conexionM);
    pg_query($conexion, "COMMIT");
    echo 1;
}
else    {
    mysqli_rollback( $conexionM );
    pg_query($conexion, "ROLLBACK");
    echo 0;
}
    
?>