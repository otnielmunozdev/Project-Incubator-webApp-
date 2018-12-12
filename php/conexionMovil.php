<?php

    function conectarBDM()  {
        $hostname_localhost ="localhost";
        $database_localhost ="proyectosd";
        $username_localhost ="root";
        $password_localhost ="";
        
        $bd = mysqli_connect('localhost','root','','proyectosd');
        if(!$bd)    {
            echo "Error al conectar: ".mysqli_error();
        }
        else    {
            return $bd;
        }
    }

?>