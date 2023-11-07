<?php
    include_once("./app/tareas/model/tarea.model.php");

    include_once("./app/IniciaSesion/model/login.model.php");


    class TareasRepository {
        private static $_intance = [];
        
        private mysqli $mysqli;

        private function __construct() {
            $host=$_ENV['DB_HOST'];
            $user=$_ENV['DB_USER'];
            $passwoord=$_ENV['DB_PASSWORD'];
            $database=$_ENV['DB_DATABASE'];

            $this->mysqli = new mysqli($host, $root, $passwoord, $database);
        }
        
        public static function getInstance(): TareasRepository {
            $class = static::class;
            if ( !isset( $_intance[ $class ] ) ){
                $_intance[ $class ] = new static();
            }

            return $_intance[ $class ];
        }

        public function getMysqli(): mysqli {
            return $this->mysqli;
        }

        public function getAllTareas(User $usuario): array {
            $tareas = array();
            $query = "SELECT * FROM tareas where idusuario = ? ORDER BY status DESC";

            $sentencia = $this->mysqli->prepare($query);

            $idusuario = $usuario -> getIdUsuario();
            $sentencia ->bind_param("i", $idusuario);

            $sentencia->execute();

            $sentencia->bind_result( $id,$idusuario, $titulo, $descripcion, $status );
            while ($sentencia->fetch() ){
                $tareas[] = new Tarea( $id, $idusuario, $titulo, $descripcion, $status );
            }
            return $tareas;
        }

        public function saveNewTarea( Tarea $tarea ): bool {
            $this->mysqli->begin_transaction();
            $query = "INSERT INTO tareas( idusuario, titulo, descripcion) VALUES( ? , ?, ? )";

            $sentencia = $this->mysqli->prepare($query);
            echo "QUERY PTRPARADA";
            $idusuario = $tarea -> getIdusuario();
            $titulo = $tarea->getTitulo();
            $descri = $tarea->getDescripcion();
            
            
            $sentencia->bind_param("iss", $idusuario, $titulo, $descri);
echo "añadiendo parametros: $idusuario, $titulo, $descri ";
            if ( !$sentencia->execute() ){
                $this->mysqli->rollback();
                return false;
            }

            $this->mysqli->commit();
            return true;
        }


        public function completeTudu($id,$status){
            $this->mysqli->begin_transaction();

            $query = "UPDATE tareas SET status = ? WHERE id = ?";
            $sentencia = $this->mysqli->prepare($query);
        
            $sentencia->bind_param("si", $status,$id);
        
            if (!$sentencia->execute()) {
                $this->mysqli->rollback();
                return false;
            }
        
            $this->mysqli->commit();
            return true;
        }


    }