<?php

class BasedeDatos {

    /**
     * Función utilizada para establecer la conexión a la base de datos
     *
     * @return void
     */
    public function Conectar() {
        $conexion = mysqli_connect("127.0.0.1", "root", "", "biblioteca");

        return $conexion;
    }

}
