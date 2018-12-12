<?php
require_once ("conexion.php");
$conexion = conectarBD();
require_once ("conexionMovil.php");
$conexionM = conectarBDM();

$atributo = $_GET['atributo'];
$dato = $_GET['dato'];

$tabla = 'huevo';
$arrayWeb = [];
$arrayMovil = [];
$arrayPrincipal = [];
$arraybuscar = [];

if($atributo == "rangoHuevoMax" || $atributo == "rangoHuevoMin")    {
    $tabla = "rango_huevo";
}
else if($atributo == "tipoSensor")  {
    $tabla = "tipo_sensor";
}


if($atributo == "tiempoincubacion")  {
//if($atributo == "idadministrador")  {
    // Base WEB
    $sql = "SELECT * FROM huevo WHERE valido=true AND ".$atributo." = '".$dato."' ORDER BY idhuevo";
    $rs = pg_query( $conexion, $sql );
    if( $rs )   {
        if( pg_num_rows($rs) > 0 ) {
            while( $obj = pg_fetch_object($rs) )   {
                array_push($arrayWeb, $obj);
                array_push($arrayWeb, $obj);
                //$dato = $obj['idhuevo'];
                
                array_push($arraybuscar, $obj->idhuevo);
            }
        }
    }
    // Base MOVIL
    $query = "select * from huevo, rango_huevo, tipo_sensor WHERE huevo.idHuevo=rango_huevo.idHuevo AND tipo_sensor.idTipoSensor=rango_huevo.idTipoSensor AND huevo.valido=true ORDER BY rango_huevo.idRangoHuevo;";
    $query_exec = mysqli_query($conexionM, $query);
    if(mysqli_num_rows($query_exec)){
        while($row=mysqli_fetch_assoc($query_exec)){
            foreach( $arraybuscar as $buscar)   {
                if($buscar == $row['idHuevo'])  {
                    array_push($arrayMovil, $row);
                }
            }
        }
    }
}
else    {
    // Base MOVIL
    $query = "select * from huevo, rango_huevo, tipo_sensor WHERE huevo.idHuevo=rango_huevo.idHuevo AND tipo_sensor.idTipoSensor=rango_huevo.idTipoSensor AND huevo.valido=true AND ".$tabla.".".$atributo." = '".$dato."' ORDER BY rango_huevo.idRangoHuevo;";
    $query_exec = mysqli_query($conexionM, $query);
    if(mysqli_num_rows($query_exec)){
        while($row=mysqli_fetch_assoc($query_exec)){
            array_push($arrayMovil, $row);
            //$huevo['huevo'][]=$row;
            array_push($arraybuscar, $row['idHuevo']);
            //$dato = $row['idHuevo'];
        }
    }
    
    // Base WEB
    $sql = "SELECT * FROM huevo WHERE valido=true ORDER BY idhuevo";//WHERE ".$atributo." = '".$dato."'";
    $rs = pg_query( $conexion, $sql );
    if( $rs )   {
        if( pg_num_rows($rs) > 0 ) {
            while( $obj = pg_fetch_object($rs) )   {
                foreach( $arraybuscar as $buscar)   {
                    if($buscar == $obj->idhuevo)  {
                        array_push($arrayWeb, $obj);
                        //array_push($arrayWeb, $obj);
                    }
                }
            }
        }
    }
    
}

$arrayPrincipal2 = array(
    "web" => $arrayWeb,
    "movil" => $arrayMovil);

$arrayPrincipal = array(
    "huevo" => $arrayPrincipal2);

echo json_encode($arrayPrincipal);



    

?>