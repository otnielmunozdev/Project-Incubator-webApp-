<?php
require_once ("conexion.php");
$conexion = conectarBD();

$noHuevos = $_GET['noHuevos'];
$idIncubadora = $_GET['idIncubadora'];
$idCliente = $_GET['idCliente'];
$idHuevo = $_GET['idHuevo'];

$opcion = 0;
    

    $sql = "INSERT INTO agregar_huevo(diaregistro, nohuevos, idincubadora, idcliente, idhuevo) VALUES (CURRENT_DATE, '".$noHuevos."', ".$idIncubadora.", ".$idCliente.", ".$idHuevo.")";
    $exito = pg_query( $conexion, $sql );
    
    if( $exito )    {
        $opcion = 1;
    }

if($opcion) {
    echo 1;
}
else    {
    echo 0;
}

?>