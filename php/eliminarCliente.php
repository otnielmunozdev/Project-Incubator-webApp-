<?php
require_once ("conexion.php");
$conexion = conectarBD();
$usuario = $_GET['user'];
$contrasena = $_GET['pass'];

$idCliente = $_GET['idCliente'];
$nombre = $_GET['nombre'];
$apellidoPaterno = $_GET['apellidoPaterno'];
$apellidoMaterno = $_GET['apellidoMaterno'];
$telefono = $_GET['telefono'];
$domicilio = $_GET['domicilio'];
$diaIngreso = $_GET['diaIngreso'];

$ok = eliminarCliente( $conexion, $idCliente, $nombre, $apellidoPaterno, $apellidoMaterno, $telefono, $domicilio, $diaIngreso );
$opcion = -1;

if($ok != false)   {
    $opcion = 3;
}

echo '<form id="elForm" action="http://localhost/Proyecto%20modular/adminCliente.php">
        <input type="hidden" name="user" value='.$usuario.'>
        <input type="hidden" name="pass" value='.$contrasena.'>
        <input type="hidden" name="opcion" value='.$opcion.'>
        <input type="hidden" name="etiquetaEliminar2" value=true>
        </form>';
echo '<script type="text/javascript">
    document.forms["elForm"].submit()
    </script>';
    

    function eliminarCliente( $conexion, $idCliente, $nombre, $apellidoPaterno, $apellidoMaterno, $telefono, $domicilio, $diaIngreso )
    {
        $sql = "UPDATE cliente SET valido=false WHERE idcliente=".$idCliente;
        return pg_query( $conexion, $sql );
    }
?>