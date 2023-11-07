<?php
    class User {

         private int $IdUsuario;
        private string $Nombre;
        private string $Correo;
        private string $Contraseña;

        public function __construct(
             int $IdUsuario = 0,
            string $Nombre,
            string $Correo,
            string $Contraseña
        )
        {
             $this->IdUsuario = $IdUsuario;
            $this->Nombre = $Nombre;
            $this->Correo = $Correo;
            $this->Contraseña = $Contraseña;
        }

         public function getIdUsuario(): int {
             return $this->IdUsuario;
         }

        public function getNombre(): string {
            return $this->Nombre;
        }

        public function setNombre( string $Nombre ) {
            $this->Nombre = $Nombre;
        }

        public function getCorreo(): string {
            return $this->Correo;
        }

        public function setCorreo( string $Correo ) {
            $this->Correo = $Correo;
        }

        public function getContraseña(): string {
            return $this->Contraseña;
        }

        public function setContraseña( string $Contraseña ) {
            $this->Contraseña = $Contraseña;
        }
    }