<?php
switch ($path_components[$path_index]) {
    case 'formulario':
        require_once("./app/registro/controller/registro.controller.php");
        break;
    case 'presentacion':
        require_once("./app/presentacion/controller/presentacion.controller.php");
    break;
   
    case 'tareas':
        require_once("./app/tareas/tareas.controller.php");
    break;

    case 'login':
        if (!checkSession()) 
        require_once("./app/IniciaSesion/login/controller/login.controller.php");
        else 
        header ("Location: /tareas");
            break;

    case 'signup':
        if (!checkSession()) 
            require_once("./app/IniciaSesion/registro/controller/registro.controller.php");
        else 
            header ("Location: /tareas");
        break;
    case 'logout':
        session_destroy();
        header ("Location: /tareas");
        break;
    case "paises":
        require_once("./app/paises/paises.controller.php");
        break;default:
    header("HTTP/1.1 404 Not Found");
    break;
}