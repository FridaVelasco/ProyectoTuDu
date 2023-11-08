<?php
switch ($request_method) {
    case 'GET':
        require_once("./app/IniciaSesion/registro/view/login.registro.php");
            break;
    
        case 'POST':
         include_once("./app/IniciaSesion/repository/login.repository.php");
            
            $nombre=$_POST['txt'];
            $correo=$_POST['email'];
            $pswd=$_POST['pswd'];
            $confPass=$_POST['confirmar'];

            if (UsuRepository::getInstance()->validarCorreo($correo)){
                $fallo="Correo ya registrado";
            }else{
                if($pswd!==$confPass){
                    $fallo="La contraseña no coincide, vuelva a intentar...";
                }else{
                    $usuario=new User(0, $nombre, $correo, $pswd);
                   
                    if(!UsuRepository::getInstance()->registrarUsuario($usuario)){
                        $fallo=UsuRepository::getInstance()->getDBConex()->error;    
                             
                    }          
                }
            }

            if(isset( $fallo)){
                echo $fallo;
              //  require_once("./app/Sesion/registro/view/login.registro.php");
            } else{
                
                //header("Location: /MVC/login");
            }
            break;
            
        default:
            header("Location: /login");
            break;
    }