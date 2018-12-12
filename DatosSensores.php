<?php

    $codigo = $_GET['codigo'];
    header('Content-Type: application/json; charset-UTF-8');
    header("Access-Control-Allow-Origin: *");



    $mysqli = new mysqli("localhost","root","","proyectosd");

    if(!$mysqli){
        die("Connection failes: " . $mysqli->error);
    }

    $query = sprintf("SELECT agregar_huevo.idHuevo, rango_huevo.temperaturaActual, rango_huevo.temperaturaRecomendada,
    rango_huevo.humedadRecomendada , huevo.humedadUltimoDia, rango_huevo.idHuevo , huevo.idHuevo FROM  incubadora.agregar_huevo 
    INNER JOIN  proyectosd.rango_huevo  ON agregar_huevo.idHuevo=rango_huevo.idHuevo INNER JOIN proyectosd.huevo ON agregar_huevo.idHuevo=huevo.idHuevo 
    WHERE agregar_huevo.idIncubadora = ".$codigo." ORDER BY idRangoHuevo DESC LIMIT 0,1");
    $resultado = $mysqli->query($query);

    $datos = array();
    foreach ($resultado as $row){
        $datos[] = $row;
    }

    $resultado->close();

    $mysqli->close();

    print json_encode($datos);
   /* header("Conent-Type: application/json; charset-UTF-8");
    $pdo = new PDO("mysql:dbname=proyectosd;host=127.0.0.1","root","");
    //Buscar Ultimo Dato
    switch($_GET['q']){

        case 1:
        $statement=$pdo->prepare("SELECT temperaturaActual FROM rango_huevo ORDER BY idRangoHuevo ASC");
        $statement = $pdo->prepare("");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $json = json_encode($result);
        echo $json;
    break;
    //Buscar Todos los datos
    default:
        $statement=$pdo->prepare("SELECT temperaturaActual FROM rango_huevo ORDER BY idRangoHuevo ASC");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $json = json_encode($result);
        echo $json;
    break;
    }*/

?>