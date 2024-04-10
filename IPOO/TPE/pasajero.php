<?php

    class pasajero {
        private $nombre;
        private $apellido;
        private $nroDocumento;
        private $nroTelefono;

        public function __construct($nombre, $apellido, $nroDocumento, $nroTelefono)
        {
            $this -> nombre = $nombre;
            $this -> apellido = $apellido;
            $this -> nroDocumento = $nroDocumento;
            $this -> nroTelefono = $nroTelefono;
        }

        public function getNombre (){
            return $this -> nombre;
        }

        public function setNombre ($nombre){
            $this -> nombre = $nombre;
        }

        public function getApellido (){
            return $this -> apellido;
        }

        public function setApellido ($apellido){
            $this -> apellido = $apellido;
        }

        public function getNroDocumento (){
            return $this -> nroDocumento;
        }

        public function setNroDocumento ($nroDocumento){
            $this -> nroDocumento = $nroDocumento;
        }

        public function getNroTelefono (){
            return $this -> nroTelefono;
        }

        public function setNroTelefono ($nroTelefono){
            $this -> nroTelefono = $nroTelefono;
        }

        public function __toString()
        {
            return "Nombre:".$this -> getNombre()."\nApellido:".$this -> getApellido()."\nNro de documento:".$this -> getNroDocumento()."\nNro de telefono::".$this -> getNroTelefono();
        }

}
