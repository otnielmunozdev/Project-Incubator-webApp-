<?php

//$pdo2 = new PDO2("mysql:dbname=incubadora;host=localhost","root","");
$pdo = new PDO("mysql:dbname=proyectosd;host=127.0.0.1","root","");


    function conectarBD()  {
       // $host = "host=localhost";
        //$port = "port=3606";
       // $dbname = "dbname=Incubadora";
        //$user = "user=mysql";
        //$password = "";
        
        $bd = mysqli_connect('localhost','root','','Incubadora');
        if(!$bd)    {
            echo "Error al conectar: ".mysqli_last_error();
        }
        else    {
            return $bd;
        }
    }


?>


