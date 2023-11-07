<?php

$maxlifetime=3; //Tiempo maximo de vida de la sesion en segundos
$secure=true; //Habilitar seguridad de la sesion
$http_only=true; //Otro tipo de peticion aparte de http es SOAP
$samesite='lax';//lax es el valor para indicar que solo venga del propio servidor y no de un externo
$host=$_SERVER['HTTP_HOST'];

// session_set_cookie_params([
//     'lifetime' => $maxlifetime,
//     'path' => './',
//     'domain' => $host,
//     'secure' => $secure,
//     'httpOnly' => $http_only,
//     'samesite' => $samesite
// ]);

session_start([
    // 'cookie_lifetime' => 60*60*4
]);

function checkSession():bool{
    return isset($_SESSION['usuarios']) && $_SESSION['usuarios']!=null;
}

// Chambeando con variales de entorno
$env = parse_ini_file(".env");

foreach ($env as $key => $value) { 
    $_ENV[$key] = $value;
}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="Frida" content="fridavelascob@gmail.com">
    <title>Practica mvc</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="./style.css">


</head>
<body>

    <!-- <h1>Hola Gente</h1> -->
    <?php 

    $request_url = $_SERVER['REQUEST_URI'];
    $request_method = $_SERVER['REQUEST_METHOD'];
    //echo $request_url;

    $request_components = parse_url($request_url);
    if(count($request_components)> 1)
    {
    parse_str($request_components['query'], $query_params);
    $params = json_encode($query_params);
    }
    $path = ltrim($request_components['path'],"/");
    $path_components = explode("/", $path);
    $components = json_encode($path_components);

    // $query
    //echo"
    //<br>

    //<h2>Recuro Solicitado: {$request_components['path']}</h2>
    //<h3>Query params: {$params}</h3>
    //<h3>Componentes URL: {$components}</h3>
    //";

    require_once("./app.controller.php");

    ?>
    <?php
        if (checkSession()) {
            echo"<div class='card mt-5 bg-dark p-3 text-center'>
            <h4 class='text-white'>Correo: {$_SESSION['usuarios']}</h4>
            </div>";
        }else{
            echo"<div class='card mt-5 bg-dark p-3 text-center'>
                <h4 class='text-white'>No se ha seteado la variable session</h4>
                </div>";
        }
    ?>

</body>

</html>
