<?php
include_once("./app/IniciaSesion/model/login.model.php");

class UsuRepository{
    private static $_intace = [];

    private mysqli $mysqli;

    private function __construct(){
            $host=$_ENV['DB_HOST'];
            $user=$_ENV['DB_USER'];
            $password=$_ENV['DB_PASSWORD'];
            $database=$_ENV['DB_DATABASE'];

            $this->mysqli = new mysqli($host, $user, $password, $database);
    }
    

    public static function getInstance(): UsuRepository {
        $class = static::class;
        if ( !isset( $_intance[ $class ] ) ){
            $_intance[ $class ] = new static();
        }

        return $_intance[ $class ];
    }

    public function getDBConex(): mysqli{
        return $this->mysqli;
    }

    public function getAllUsuarios(User $usuario ): array {
        $usuarios;
        $query = "SELECT idusuario, nombre FROM usuarios  where correo= ? and contraseña= ?";

        $sentencia = $this->mysqli->prepare($query);
         
        $correo = $usuario -> getCorreo();
        $contraseña = $usuario ->  getContraseña();

        $sentencia -> bind_param("ss", $correo, $contraseña);

        $sentencia->execute();

        $sentencia->bind_result( $id, $nombre);
        while ($sentencia->fetch() ){
            $usuarios  = array('idusuario' => $id, 'nombre' => $nombre);
        }
        return $usuarios;
    }

    public function registrarUsuario(User $usuario):bool{
        $this->mysqli->begin_transaction();

        $query="INSERT INTO usuarios (nombre, correo, contraseña) VALUES(?,?,?)";
        $sentencia=$this->mysqli->prepare($query);

        $nombre=$usuario->getNombre();
        $correo=$usuario->getCorreo();
        $pswd=$usuario->getContraseña();

        $sentencia->bind_param("sss",$nombre,$correo,$pswd);

        if (!$sentencia->execute()) {
            $this->mysqli->rollback();
            return false;
        }

        $this->mysqli->commit();
        return true;
    }

    public function validarCorreo($correo): bool {
        $query = "SELECT COUNT(*) FROM usuarios WHERE correo = ?";
        $sentencia = $this->mysqli->prepare($query);
        $sentencia->bind_param("s", $correo);
        $sentencia->execute();
        $sentencia->bind_result($count);
        $sentencia->fetch(); 
        $sentencia->close();
    
        return $count>0;
    }

    public function validarContraseña($correo, $pwsd): bool {
        $query = "SELECT contraseña FROM usuarios WHERE correo = ?";
        $sentencia = $this->mysqli->prepare($query);
        $sentencia->bind_param("s", $correo);
        $sentencia->execute();
        $sentencia->bind_result($pswd_tudu);
        $sentencia->fetch();
        $sentencia->close();
    
        return $pwsd === $pswd_tudu;
    }
    
}