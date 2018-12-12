<?php

    function buscarAdministrador( $usuario, $contrasena, $conexion )
    {
        $query = "SELECT * FROM administrador";
        $resultado  = pg_query($conexion, $query) or die ("Error en la consulta");
        $nr = pg_num_rows($resultado);
        if($nr > 0) {
            while($filas = pg_fetch_array($resultado))  {
                if($usuario == $filas["usuario"])   {
                    if($contrasena == $filas["contrasena"]) {
                        //echo "Exito";
                        return $filas["idadministrador"];
                    }
                }
            }
        }
        else    {
            echo "No hay datos";
        }
        return 0;
    }
?>