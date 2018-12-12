<!--<html>
<head>
<script type="text/javascript">
function redireccionar(){
  alert('Error en la contraseña');
  window.locationf="http://www.cristalab.com";
} 
setTimeout ("redireccionar()", 5000); //tiempo expresado en milisegundos
</script>
</head>
<body>
<p> Espere por favor, será redireccionado en 5 segundos.</p>
</body>
</html>
-->

<?php

require_once ("conexion.php");
$conexion = conectarBD();

$usuario = $_GET['user'];
$contrasena = $_GET['pass'];
$error = -1;

$query = "SELECT * FROM administrador";
    $resultado  = mysqli_query($conexion, $query) or die ("Error en la consulta");
    $nr = mysqli_num_rows($resultado);
    if($nr > 0) {
        /*echo "<table border=1 bgcolor=skyblue>
                <tr><td>Usuario</td><td>Contraseña</td></tr>";*/
            while($filas = mysqli_fetch_array($resultado))  {
                /*echo "<tr><td>".$filas["usuario"]."</td>";
                echo "<td>".$filas["contrasena"]."</td></tr>";*/
                if($usuario == $filas["usuario"])   {
                    if($contrasena == $filas["contrasena"]) {
                        echo "Exito";
                        header('Location: /Proyectomodularreal/admin.php?user='.$usuario.'&pass='.$contrasena);
                    }
                    else    {
                        //Error en la contraseña
                        $error = 1;
                    }
                }
                else    {
                    //Usuario Invalido
                    $error = 2;
                }
            }
    }
    else    {
        echo "No hay datos";
    }
    if($error == 1) {
        echo "<script>";
        echo "alert('Error en la contraseña');";
        echo "window.location='/Proyectomodularreal/login.html';";
        echo "</script>";
    } else if($error == 2)  {
        echo "<script>";
        echo "alert('Error en el usuario');";
        echo "</script>";
    }
    echo "<script>";
    echo "window.location='/Proyectomodularreal/login.html';";
    echo "</script>";


/*function listarPersonas( $conexion )
    {
        $sql = "SELECT * FROM administrador";
        $ok = true;
        // Ejecutar la consulta:
         $rs = pg_query( $conexion, $sql );
        if( $rs )
        {
            // Obtener el número de filas:
             if( pg_num_rows($rs) > 0 )
            {
                echo "<p/>LISTADO DE PERSONAS<br/>";
                echo "===================<p />";
                // Recorrer el resource y mostrar los datos:
                 while( $obj = pg_fetch_object($rs) )
                     echo $obj->idAdministrador." - ".$obj->usuario."<br />";
            }
            else
                echo "<p>No se encontraron personas</p>";
        }
        else
            $ok = false;
        return $ok;
    }*/

/*$con=mysqli_connect("localhost","id2595279_andres","extremo1996","id2595279_datos");
if(mysqli_connect_errno($con)) {
echo "Fallo la conexion con el servidor: ".mysqli_connect_error();
}

echo "<br>";
echo "<h2>";
echo "Datos de la busqueda";
echo "</h2>";

if($opcion == "nombre") {
 $sql1 = 'SELECT * FROM Personas WHERE Nombre='.'"'.$buscar.'"';
}
else if($opcion == "apellido") {
 $sql1 = 'SELECT * FROM Personas WHERE Apellido='.'"'.$buscar.'"';
}
else if($opcion == "fechaInicio") {
 $sql1 = 'SELECT * FROM Personas WHERE FechaInicio='.'"'.$buscar.'"';
}

$result = mysqli_query($con, $sql1);
echo "<table>";
echo "<tr><th>Nombre</th><th>Apellido</th><th>Correo</th><th>FechaInicio</th><th>PaginaWeb</th></tr>";
 if(mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
   echo "<tr><td>".$row["Nombre"]."</td><td>".$row["Apellidos"]."</td><td>".$row["Correo"]."</td><td>".$row["FechaInicio"]."</td><td>".$row["PaginaWeb"]."</td></tr>";
  }
 }
 else {
  echo "No hay registros";
 }
echo "</table>";
mysqli_close($con);*/



?>