<?php
require_once ("conexion.php");
$conexion = conectarBD();
require_once ("conexionMovil.php");
$conexionM = conectarBDM();

$usuario = $_GET['user'];
$contrasena = $_GET['pass'];

require_once ("buscarAdministrador.php");
$idAdministrador = buscarAdministrador( $usuario, $contrasena, $conexion);
$tiempoIncubacion = $_GET['tiempoIncubacion'];
$tipoHuevo = $_GET['tipoHuevo'];
$periodoIncubacion = $_GET['periodoIncubacion'];
$noVueltasDia = $_GET['noVueltasDia'];
$estacionAno = $_GET['estacionAno'];
$humedadUltimoDia = $_GET['humedadUltimoDia'];
$idTipoSensorT = $_GET['idTipoSensorT'];
$idTipoSensorH = $_GET['idTipoSensorH'];
$rangoHuevoMaxT = $_GET['rangoHuevoMaxT'];
$rangoHuevoMinT = $_GET['rangoHuevoMinT'];
$rangoHuevoMaxH = $_GET['rangoHuevoMaxH'];
$rangoHuevoMinH = $_GET['rangoHuevoMinH'];

$ok = insertarHuevo($conexion, $conexionM, $tiempoIncubacion, $idAdministrador, $tipoHuevo, $periodoIncubacion, $noVueltasDia, $estacionAno, $humedadUltimoDia, $rangoHuevoMaxT, $rangoHuevoMinT, $rangoHuevoMaxH, $rangoHuevoMinH, $idTipoSensorT, $idTipoSensorH);
$opcion = -1;

if($ok != false)   {
    $opcion = 1;
}

echo $opcion;

echo '<form id="elForm" action="http://localhost/Proyecto%20modular/adminHuevo.php">
        <input type="hidden" name="user" value='.$usuario.'>
        <input type="hidden" name="pass" value='.$contrasena.'>
        <input type="hidden" name="opcion" value='.$opcion.'>
        </form>';
echo '<script type="text/javascript">
    document.forms["elForm"].submit()
    </script>';
    

    function insertarHuevo( $conexion, $conexionM, $tiempoIncubacion, $idAdministrador, $tipoHuevo, $periodoIncubacion, $noVueltasDia, $estacionAno, $humedadUltimoDia, $rangoHuevoMaxT, $rangoHuevoMinT, $rangoHuevoMaxH, $rangoHuevoMinH, $idTipoSensorT, $idTipoSensorH )
    {
        $opc = 0;
        mysqli_autocommit($conexionM, FALSE);
        pg_query($conexion, "BEGIN");
        try {
            $sql = "INSERT INTO huevo(tiempoincubacion, valido, idadministrador) VALUES (".$tiempoIncubacion.", true, '".$idAdministrador."')";
            $exito = pg_query( $conexion, $sql );
            
            if( $exito )    {
                $query_search = "INSERT INTO huevo(tipoHuevo, periodoIncubacion, noVueltasDia, estacionAno, humedadUltimoDia, valido) VALUES ('".$tipoHuevo."', '".$periodoIncubacion."', '".$noVueltasDia."', '".$estacionAno."', '".$humedadUltimoDia."', true)";
                $query_exec = mysqli_query($conexionM, $query_search);
                
                $ultimo_id = mysqli_insert_id( $conexionM );
                
                if( $query_exec )   {
                    $query = "INSERT INTO rango_huevo(rangoHuevoMax, rangoHuevoMin, idHuevo, idTipoSensor, valido) VALUES ('".$rangoHuevoMaxT."', '".$rangoHuevoMinT."', ".$ultimo_id.", ".$idTipoSensorT.", true)";
                    $query_exec2 = mysqli_query($conexionM, $query);
                    
                    if( $query_exec2 )   {
                        $query2 = "INSERT INTO rango_huevo(rangoHuevoMax, rangoHuevoMin, idHuevo, idTipoSensor, valido) VALUES ('".$rangoHuevoMaxH."', '".$rangoHuevoMinH."', ".$ultimo_id.", ".$idTipoSensorH.", true)";
                        $query_exec3 = mysqli_query($conexionM, $query2);
                        
                        if( $query_exec3 )  {
                            $opc = 1;
                        }
                    }
                }
            }
            
        } catch( Exception $e ){
            //echo "Roll back";
            mysqli_rollback( $conexionM );
            pg_query($conexion, "ROLLBACK");
            return false;
        }
        if($opc == 1)   {
            mysqli_commit($conexionM);
            pg_query($conexion, "COMMIT");
            return true;
        }
        else    {
            mysqli_rollback( $conexionM );
            pg_query($conexion, "ROLLBACK");
            return false;
        }
    }


?>