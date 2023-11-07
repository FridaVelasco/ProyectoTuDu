<?php

    switch ($request_method) {
        case 'GET':
            require_once("./app/tareas/mi-lista/view/mi-lista.php");
            break;
        

            case 'POST':
                include_once("./app/tareas/repository/tareas.repository.php");
                $idTarea = $_POST['completar'];
    
                if (TareasRepository::getInstance()->completeTudu($idTarea,'Completado')) {
                    $exito="Tarea completa";
                }else {
                    $error ="No actulizo tarea";
                }
    
                if (isset($exito)) {
                    require_once("./app/tareas/mi-lista/view/mi-lista.php");
                }
                elseif (isset($error)) {
                    
                    require_once("./app/tareas/mi-lista/view/mi-lista.php");
                }
    
    
                break;


        default:
            header("Location: .");
            break;
    }