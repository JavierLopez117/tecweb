<?php

abstract class DataBase {
    protected $conexion;

    public function __construct($database="marketzone") {
        $this->conexion = @mysqli_connect(
            'localhost',
            'root',
            '',
            $database
        );
    
        /**
         * NOTA: si la conexión falló $conexion contendrá FALSE
         **/
        if(!$this->conexion) {
            die('¡¡¡ERROR DE CONCEXION A LA BASE DE DATOS!!!');
        }
    }
}
?>