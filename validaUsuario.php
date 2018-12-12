<?php

function validaUsuario( $usuario, $contrasena, $conexion )
    {
        $query = "SELECT * FROM administrador";
        $resultado  = mysqli_query($conexion, $query) or die ("Error en la consulta");
        $nr = mysqli_num_rows($resultado);
        if($nr > 0) {
            while($filas = mysqli_fetch_array($resultado))  {
                if($usuario == $filas["usuario"])   {
                    if($contrasena == $filas["contrasena"]) {
                        echo "Exito";
                        return 1;
                    }
                }
            }
        }
        else    {
            echo "No hay datos";
        }
        echo "<script>";
        echo "window.location='/Proyectomodularreal/login.html';";
        echo "</script>";
        //return pg_query( $conexion, $sql );
    }


        
?>