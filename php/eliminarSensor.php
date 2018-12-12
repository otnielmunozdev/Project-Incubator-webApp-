<?php
require_once ("conexionMovil.php");
$conexionM = conectarBDM();

//$usuario = $_GET['user'];
//$contrasena = $_GET['pass'];

$idSensor = $_GET['idSensor'];

$opcion = 0;

mysqli_autocommit($conexionM, FALSE);

try {
    $sql = "UPDATE sensor SET valido=false WHERE idSensor=".$idSensor;
    $exito = mysqli_query( $conexionM, $sql );
    //echo $sql;

    if( $exito )    {
        $query = "UPDATE tipo_sensor SET valido=false WHERE idSensor=".$idSensor;
        $query_exec = mysqli_query($conexionM, $query);
        
        if( $query_exec )   {
            $query2 = "UPDATE registro_sensor SET valido=false WHERE idTipoSensor=".$idSensor;
            $query_exec2 = mysqli_query($conexionM, $query2);
            
            if( $query_exec2 )  {
                $opcion = 1;
            }
            else    {
                $opcion = 0;
            }
        }
        else    {
            $opcion = 0;
        }
    }
    else    {
        $opcion = 0;
    }
}catch( Exception $e )  {
    echo "Roll back";
    mysqli_rollback( $conexionM );
}

if( $opcion == 1 )   {
    mysqli_commit( $conexionM );
    echo 1;
}
else    {
    echo 0;
    mysqli_rollback( $conexionM );
}

?>