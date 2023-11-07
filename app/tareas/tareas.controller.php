<?php
    if ( !isset($path_components[$path_index + 1]) )
        $path_components[$path_index + 1] = '';
        
    switch ($path_components[$path_index + 1]) {
        case '':
        case 'mi-lista':
            if (checkSession()) 
            require_once("./app/tareas/mi-lista/controller/mi-lista.controller.php");
            else 
            header("Location: /MVC/login");
            break;

        case 'registro':
            if (checkSession()) 
            require_once("./app/tareas/registro/controller/registro.controller.php");
            else 
            header("Location: /MVC/login");
            break;

          case 'logout':
           session_destroy();
           header("Location:  /MVC/login");
            break;
          
          
          
            // case 'completar':
            //     // require_once("./app/tareas/registro/controller/registro.controller.php");
            //     echo "<h1>Hola</h1>";
            //     break;
        
        default:
            header("Location: /MVC/tareas");
            break;
    }