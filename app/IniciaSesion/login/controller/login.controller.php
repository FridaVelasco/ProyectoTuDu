<?php
switch ($request_method) {
    case 'GET':
        require_once("./app/IniciaSesion/login/view/login.php");
        break;
    
        case 'POST':
            require_once("./app/IniciaSesion/repository/login.repository.php");
            

            $correo = $_POST['email'];
            $contraseña = $_POST['pswd'];

            if (isset($_POST['pswd'])) {
                $pswd = $_POST['pswd']; 
            } else {
            
            }
            

            if (!UsuRepository::getInstance()->validarCorreo($correo)) {
                $fallo = "El correo ingresado no esta registrado. Registrese o vuelva a intentar";
                include_once("./app/IniciaSesion/login/view/login.php");
                exit(); // Salir para evitar redirección
            }
    
            // UsuRepository::getInstance()->validarContraseña
            // Validar la contraseña
            if (!UsuRepository::getInstance()->validarContraseña($correo, $pswd)) {
                $fallo = "Error en la contraseña. Vuelva a intenta de nuevo.";
                include_once("./app/IniciaSesion/login/view/login.php");
                exit(); // Salir para evitar redirección
            }
            
            $usuarios = new User (0, '', $correo, $pswd);

            $infousuario = UsuRepository::getInstance()->getAllUsuarios($usuarios);
            //var_dump($infousuario);
             $_SESSION["usuarios"] =  $infousuario["idusuario"];
             $_SESSION["nombreusuario"] =  $infousuario["nombre"];

            
            header("Location: /MVC/tareas");
            exit(); // Salir después de la redirección

    default:
       header("Location .");
        break;
}