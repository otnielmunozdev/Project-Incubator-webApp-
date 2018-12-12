<?php
require_once ("conexionMovil.php");
$conexionM = conectarBDM();

//$usuario = $_GET['user'];
//$contrasena = $_GET['pass'];

$idSensor = $_GET['idSensor'];
$codigo = $_GET['codigo'];
$rangoSensorMin = $_GET['rangoSensorMin'];
$rangoSensorMax = $_GET['rangoSensorMax'];
$precisionSensor= $_GET['precisionSensor'];
$distanciaTransmicion = $_GET['distanciaTransmicion'];
$voltaje = $_GET['voltaje'];
$estadoActual = $_GET['estadoActual'];
$tipoSensor = $_GET['tipoSensor'];
$registro = $_GET['registro'];

$opcion = 0;

mysqli_autocommit($conexionM, FALSE);

try {
    $sql = "UPDATE sensor SET codigo='".$codigo."', rangoSensorMin='".$rangoSensorMin."', rangoSensorMax='".$rangoSensorMax."', precisionSensor='".$precisionSensor."', distanciaTransmicion='".$distanciaTransmicion."', voltaje='".$voltaje."', estadoActual='".$estadoActual."' WHERE idSensor=".$idSensor;
    $exito = mysqli_query( $conexionM, $sql );
    //echo $sql;

    if( $exito )    {
        $query = "UPDATE tipo_sensor SET tipoSensor='".$tipoSensor."' WHERE idSensor=".$idSensor;
        $query_exec = mysqli_query($conexionM, $query);
        
        
        if( $query_exec )   {
            $query2 = "UPDATE registro_sensor SET registro='". $registro."' WHERE idTipoSensor=".$idSensor;
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