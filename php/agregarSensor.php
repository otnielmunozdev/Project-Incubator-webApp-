<?php
require_once ("conexionMovil.php");
$conexionM = conectarBDM();

//$usuario = $_GET['user'];
//$contrasena = $_GET['pass'];

//require_once ("buscarAdministrador.php");
//$idAdministrador = buscarAdministrador( $usuario, $contrasena, $conexion);
$codigo = $_GET['codigo'];
$rangoSensorMin = $_GET['rangoSensorMin'];
$rangoSensorMax = $_GET['rangoSensorMax'];
$precisionSensor = $_GET['precisionSensor'];
$distanciaTransmicion = $_GET['distanciaTransmicion'];
$voltaje = $_GET['voltaje'];
$tipoSensor = $_GET['tipoSensor'];

$opcion = 0;

mysqli_autocommit($conexionM, FALSE);
    
try {
    $sql = "INSERT INTO sensor(codigo, rangoSensorMin, rangoSensorMax, precisionSensor, distanciaTransmicion, voltaje, estadoActual, valido) VALUES ('".$codigo."', '".$rangoSensorMin."', '" .$rangoSensorMax."', '".$precisionSensor."', '".$distanciaTransmicion."', '".$voltaje."', true, true)";
    $exito = mysqli_query( $conexionM, $sql );

    $ultimo_id = mysqli_insert_id( $conexionM );

    if( $exito )    {
        $query = "INSERT INTO tipo_sensor(tipoSensor, valido, idSensor) VALUES ('".$tipoSensor."', true, ".$ultimo_id.")";
        $query_exec = mysqli_query($conexionM, $query);
        
        $ultimo_id2 = mysqli_insert_id( $conexionM );
        
        if( $query_exec )   {
            $query2 = "INSERT INTO registro_sensor(registro, valido, idTipoSensor) VALUES (0, true, ".$ultimo_id2.")";
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
    
}   catch( Exception $e ){
    echo "Roll back";
    mysqli_rollback( $conexionM );
}

if( $opcion == 1 )   {
    mysqli_commit($conexionM);
    echo 1;
}
else    {
    echo 0;
    mysqli_rollback( $conexionM );
}
    
?>