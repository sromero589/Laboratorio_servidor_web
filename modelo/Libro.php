<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Clase Libro hereda de Documento
 * 
 */

require_once 'modelo/Documento.php';

class Libro extends Documento {
    //put your code here

    //atributos únicos de Libro


    public $edicion;
    public $editorial;
    public $capitulos;

    function __construct() {
        parent::__construct();

    }
     
     function getCapitulos() {
         return $this->capitulos;
     }

     function setCapitulos($capitulos) {
         $this->capitulos = $capitulos;
     }

          function getEdicion() {
         return $this->edicion;
     }

     function getEditorial() {
         return $this->editorial;
     }

     function setEdicion($edicion) {
         $this->edicion = $edicion;
     }

     function setEditorial($editorial) {
         $this->editorial = $editorial;
     }

    /**
     * Función para listar una revista
     * 
     * 
     */
    public function Listar() {
        try {
            $query = "SELECT d.codigo, d.titulo, d.lugar, d.autor, d.fechaingreso,
            d.numpaginas, d.pais, d.numero, r.edicion,r.editorial, r.capitulos
            FROM documento d INNER JOIN libro r
            ON d.codigo = r.codigo";
            $arr = [];

            if ($resultado = $this->mysqli->query($query)) {

                /* obtiene el array de objetos */
                while ($obj = $resultado->fetch_object()) {
                    array_push($arr, $obj);
                }

                $resultado->close();
                return $arr;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Función para obtener una revista
     * 
     */
    public function Obtener($id) {
        try {
            foreach ($this->Listar() as $obj) {
                if ($obj->codigo == $id) {

                    return $obj;
                }
            }

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Función para eliminar una revista
     * 
     */
    public function Eliminar($id) {
        try {

            $stmt = $this->mysqli->prepare("DELETE FROM documento WHERE codigo = ?");
            $stmt->bind_param('i', $id);
            ($stmt->execute());

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Función para actualizar una revista
     * 
     */
    public function Actualizar($data) {
        try {
            $sql = "UPDATE documento SET
			titulo          = ?,
			lugar        = ?,
                        autor = ?,
                        fechaingreso        = ?,
                        numpaginas = ?,
                        pais = ?,
                        numero = ?
		    WHERE codigo = ?";

            $stmt = $this->mysqli->prepare($sql);

            $stmt->bind_param(
                'ssssisii',
                $data->getTitulo(), $data->getLugar(), $data->getAutor(),
                $data->getFechaingreso(), $data->getNumpaginas(), $data->getPais(), $data->getNumero(), $data->getCodigo()
            );
            $stmt->execute();


            $sql = "UPDATE libro SET
            edicion          = ?,
            editorial        = ?,
            capitulos = ?
        WHERE codigo = ?";

            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param(
                'sssi',
                $data->getEdicion(), $data->getEditorial(), $data->getCapitulos(), $data->getCodigo()
            );
            $stmt->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Función para ingresar una revista
     * 
     */
    public function Registrar($data) {
        try {
            $sql = "INSERT INTO documento
		        VALUES (?, ?, ?, ?, ?, ?,?,?)";
            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param(
                'issssisi',
                $data->getCodigo(), $data->getTitulo(), $data->getLugar(), $data->getAutor(),
                $data->getFechaingreso(), $data->getNumpaginas(), $data->getPais(), $data->getNumero()
            );

            $stmt->execute();
            $asd = ($stmt->insert_id);
            $asd = ($stmt->insert_id);
            $sql = "INSERT INTO libro
            VALUES (?, ?, ?, ?)";
            $stmta = $this->mysqli->prepare($sql);
             $stmta->bind_param(
                'isss',
                 $asd,$data->edicion, $data->editorial, $data->capitulos
            );
            $a = $stmta->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }



}
