
<?php

require_once ("conexion.php");
$conexion = conectarBD();

$codigo = $_GET['codigo'];
$error = -1;

    $query = "SELECT * FROM ver_incubadora  ";
    $resultado  = mysqli_query($conexion, $query) or die ("Error en la consulta");
    $nr = mysqli_num_rows($resultado);
    if($nr > 0) {
            while($filas = mysqli_fetch_array($resultado))  {
                if($codigo == $filas["codigoAcceso"])   {
                   // echo "Exito";
                    header('Location: /Proyectomodularreal/cuenta.php?codigo='.$codigo);
                }
                else    {
                    $error = 1;
                }
            }
    }
    else    {
        echo "No hay datos";
    }
    /*if($error == 1) {
        echo "<script>";
        echo "alert('Error en el codigo');";
        echo "window.location='/Proyectomodularreal/login1.html';";
        echo "</script>";
    }*/
   // echo "<script>";
    //echo "window.location='/Proyectomodularreal/login1.html';";
    //echo "</script>";


?>