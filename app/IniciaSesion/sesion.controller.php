<?php
if (!isset($path_components[$path_index + 1])) {
    $path_components[$path_index + 1]='';

    switch ($$path_components[$path_index + 1]) {
        case '':
          
        case 'login':
            require_once("app/IniciaSesion/login/controller/login.controller.php")
            break;

        case 'registro':
            require_once("./app/IniciaSesion/registro/controller/registro.controller.php")
            break;

        default:
            header("Location /login");
            break;
    }
}