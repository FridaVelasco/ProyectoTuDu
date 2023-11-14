<?php

    if (!isset($path_components[$path_index + 1])) {
        $path_components[$path_index + 1] = 'por-continente';
    }

    echo "<script src='/app/paises/helper/renderPaises.helper.js'></script>";

    switch ($path_components[$path_index + 1]) {
        case 'por-continente':
            require_once("./app/paises/por-continente/view/por-continente.view.php");
            break;
        
        case 'por-pais':
            require_once("./app/paises/por-pais/view/por-pais.view.php");
            break;

        case 'ver-pais':
            require_once("./app/paises/ver-pais/view/ver-pais.view.php");
            break;
        
        default:
            header("location: /paises/por-continente");
            break;
    }