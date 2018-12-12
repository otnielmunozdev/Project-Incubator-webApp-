<?php

function validaUsuarioC( $codigo, $conexion )
    {
        $query = "SELECT * FROM ver_incubadora";
        $resultado  = mysqli_query($conexion, $query) or die ("Error en la consulta");
        $nr = mysqli_num_rows($resultado);
        if($nr > 0) {
            while($filas = mysqli_fetch_array($resultado))  {
                if($codigo == $filas["codigoAcceso"])   {
                   // echo "Exito";
                    return 1;
                }
            }
        }
        else    {
            echo "No hay datos";
        }
        echo "<script>";
        echo "window.location='/Proyectomodularreal/login1.html';";
        echo "</script>";
        //return pg_query( $conexion, $sql );
    }


        
?>