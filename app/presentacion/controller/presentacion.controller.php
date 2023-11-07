<?php
switch ($request_method) {
    case 'GET':
        require_once("./app/presentacion/view/MI_PAGINA.html");
        break;
    
    default:
    header("HTTP/1.1 404 Not Found");
        break;
}