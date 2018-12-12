<?php
require_once ("conexion.php");
$conexion = conectarBD();
$usuario = $_GET['user'];
$contrasena = $_GET['pass'];
$buscarCliente = $_GET['buscarCliente'];
$datoBuscar = $_GET['datoBuscar'];

$resultado = buscarCliente( $conexion, $buscarCliente, $datoBuscar);

$opcion = -1;
echo $resultado;
if($resultado != false)   {
    $opcion = 2;
}

echo '<form id="elForm" action="http://localhost/Proyecto%20modular/adminCliente.php#pills-MostrarCliente">
        <input type="hidden" name="user" value='.$usuario.'>
        <input type="hidden" name="pass" value='.$contrasena.'>
        <input type="hidden" name="opcion" value='.$opcion.'>
        <input type="hidden" name="resultado" value='.$resultado.'>

        </form>';
//echo '<script type="text/javascript">
//    document.forms["elForm"].submit()
//    </script>';


    function buscarCliente( $conexion, $buscarCliente, $datoBuscar ) {
        $sql = "SELECT * FROM cliente WHERE ".$buscarCliente." = '".$datoBuscar."'";
        $ok = true;
        $rs = pg_query( $conexion, $sql );
        if( $rs )   {
             if( pg_num_rows($rs) > 0 ) {
                /*echo "<tr>
                      <th>ID</th>
                      <th>NOMBRE</th>
                      <th>APELLIDO PATERNO</th>
                      <th>APELLIDO MATERNO</th>
                      <th>TEL&Eacute;FONO</th>
                      <th>DIRECCI&Oacute;N</th>
                      <th>INGRESO CLIENTE</th>
                    </tr>";*/
                //$obj = (object) array('1' => 'foo');
                $json;
                //$obj = pg_fetch_object($rs);
                while( $obj = pg_fetch_object($rs) )    {
                    /*echo "<tr>
                            <th>".$obj->idcliente."</th>
                            <th>".$obj->nombre."</th>
                            <th>".$obj->apellidopaterno."</th>
                            <th>".$obj->apellidomaterno."</th>
                            <th>".$obj->telefono."</th>
                            <th>".$obj->domicilio."</th>
                            <th>".$obj->diaingreso."</th>
                         </tr>";*/
                    $json['cliente'][] = $obj;
                }
                //echo json_encode($json);
                return json_encode($json);
            }
            else
                echo "<p>No se encontraron personas</p>";
        }
        else
            $ok = false;
        return $ok;
    }
?>