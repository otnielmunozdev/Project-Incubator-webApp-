<?php
require_once ("conexion.php");
$conexion = conectarBD();
$usuario = $_GET['user'];
$contrasena = $_GET['pass'];

require_once ("buscarAdministrador.php");
$idAdministrador = buscarAdministrador( $usuario, $contrasena, $conexion);
$nombre = $_GET['nombreCliente'];
$apellidoPaterno = $_GET['apellidoPaterno'];
$apellidoMaterno = $_GET['apellidoMaterno'];
$telefono = $_GET['telefono'];
$domicilio = $_GET['direccion'];

$ok = insertarCliente( $conexion, $nombre, $apellidoPaterno, $apellidoMaterno, $telefono, $domicilio, $idAdministrador );
$opcion = -1;

if($ok != false)   {
    $opcion = 1;
}

echo '<form id="elForm" action="http://localhost/Proyecto%20modular/adminCliente.php">
        <input type="hidden" name="user" value='.$usuario.'>
        <input type="hidden" name="pass" value='.$contrasena.'>
        <input type="hidden" name="opcion" value='.$opcion.'>
        </form>';
echo '<script type="text/javascript">
    document.forms["elForm"].submit()
    </script>';
    

    function insertarCliente( $conexion, $nombre, $apellidoPaterno, $apellidoMaterno, $telefono, $domicilio, $idAdministrador )
    {
        $sql = "INSERT INTO cliente(nombre, apellidopaterno, apellidomaterno, telefono, domicilio, diaingreso, valido, idadministrador) VALUES ('".$nombre."', '".$apellidoPaterno."', '".$apellidoMaterno."', '".$telefono."', '".$domicilio."', CURRENT_DATE, true, '".$idAdministrador."')";
        return pg_query( $conexion, $sql );
    }
?>