<?php
//require_once ("conexion.php");
//$conexion = conectarBD();

    function mostrarCliente( $conexion ) {
        $sql = "SELECT * FROM cliente WHERE valido=true";
        $ok = true;
        $rs = pg_query( $conexion, $sql );
        if( $rs )   {
             if( pg_num_rows($rs) > 0 ) {
                echo "<tr>
                      <th>ID</th>
                      <th>NOMBRE</th>
                      <th>APELLIDO PATERNO</th>
                      <th>APELLIDO MATERNO</th>
                      <th>TEL&Eacute;FONO</th>
                      <th>DIRECCI&Oacute;N</th>
                      <th>INGRESO CLIENTE</th>
                    </tr>";
                while( $obj = pg_fetch_object($rs) )    {
                    echo "<tr>
                            <th>".$obj->idcliente."</th>
                            <th>".$obj->nombre."</th>
                            <th>".$obj->apellidopaterno."</th>
                            <th>".$obj->apellidomaterno."</th>
                            <th>".$obj->telefono."</th>
                            <th>".$obj->domicilio."</th>
                            <th>".$obj->diaingreso."</th>
                         </tr>";
                }
            }
            else
                echo "<p>No se encontraron personas</p>";
        }
        else
            $ok = false;
        return $ok;
    }
?>