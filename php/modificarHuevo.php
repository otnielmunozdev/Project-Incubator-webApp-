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
$tiempoIncubacion = $_GET['tiempoincubacion'];
$tipoHuevo = $_GET['tipoHuevo'];
$periodoIncubacion = $_GET['periodoIncubacion'];
$noVueltasDia = $_GET['noVueltasDia'];
$estacionAno = $_GET['estacionAno'];
$humedadUltimoDia = $_GET['humedadUltimoDia'];
$idTipoSensorT = $_GET['idTipoSensorT'];
$idTipoSensorH = $_GET['idTipoSensorH'];
$idTipoSensorTNuevo = $_GET['idTipoSensorTNuevo'];
$idTipoSensorHNuevo = $_GET['idTipoSensorHNuevo'];
$rangoHuevoMaxT = $_GET['rangoHuevoMaxT'];
$rangoHuevoMinT = $_GET['rangoHuevoMinT'];
$rangoHuevoMaxH = $_GET['rangoHuevoMaxH'];
$rangoHuevoMinH = $_GET['rangoHuevoMinH'];

$opcion = 0;

mysqli_autocommit($conexionM, FALSE);
pg_query($conexion, "BEGIN");

try {
    $sql =  "UPDATE huevo SET tiempoincubacion='".$tiempoIncubacion."' WHERE idhuevo=".$idHuevo;
    $exito = pg_query( $conexion, $sql );

    if( $exito )    {
        $query_search = "UPDATE huevo SET tipoHuevo='".$tipoHuevo."', periodoIncubacion='".$periodoIncubacion."', novueltasDia='".$noVueltasDia."', estacionAno='".$estacionAno."', humedadUltimoDia='".$humedadUltimoDia."' WHERE idHuevo=".$idHuevo;
        $query_exec = mysqli_query($conexionM, $query_search);    
        
        if( $query_exec )   {
            $query = "UPDATE rango_huevo SET rangoHuevoMax= '".$rangoHuevoMaxT."', rangoHuevoMin='".$rangoHuevoMinT."',  idTipoSensor=".$idTipoSensorTNuevo." WHERE idHuevo=".$idHuevo." AND idTipoSensor=".$idTipoSensorT;
            $query_exec2 = mysqli_query($conexionM, $query);
            

            if( $query_exec2 )   {
                $query2 = "UPDATE rango_huevo SET rangoHuevoMax= '".$rangoHuevoMaxH."', rangoHuevoMin='".$rangoHuevoMinH."',  idTipoSensor=".$idTipoSensorHNuevo." WHERE idHuevo=".$idHuevo." AND idTipoSensor=".$idTipoSensorH;
                $query_exec3 = mysqli_query($conexionM, $query2);

                if( $query_exec3 )  {
                    $opcion = 1;
                }
            }
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