<?php
class BasedeDatos
{
    public static function Conectar()
    {
        $conexion = mysqli_connect("127.0.0.1", "root", "", "biblioteca");

        return $conexion;
        
    }
}