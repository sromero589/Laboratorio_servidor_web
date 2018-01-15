<?php

require_once 'modelo/Documento.php';

/**
 * Clase Revista hereda de Documento
 *
 * @author casa
 */
class Revista extends Documento {

    //Atributos de la Clase Revista
    public $volumen;
    public $fechaEdicion;
    public $temas;
    public $secciones;

    function __construct() {
        parent::__construct();
    }
/**
 * Función para listar las revistas
 * @return $array 
 */
    public function Listar() {
        try {
            $query = "SELECT d.codigo, d.titulo, d.lugar, d.autor, d.fechaingreso,
            d.numpaginas, d.pais, d.numero, r.volumen,r.fechaEdicion, r.temas, r.secciones
            FROM documento d INNER JOIN revista r
            ON d.codigo = r.codigo";
            $arr = [];

            if ($resultado = $this->mysqli->query($query)) {

                /* obtener el array de objetos */
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
 * Función para recuperar una Revista
 * @param  String $id Codigo de Revista
 * @return $array 
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
 * Función para eliminar una Revista
 * @param  String $id Codigo de Revista
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
 * Función para Actualizar una Revista
 * @param  Revista $data Codigo de Revista
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
                    'ssssisii', $data->getTitulo(), $data->getLugar(), $data->getAutor(), $data->getFechaingreso(), $data->getNumpaginas(), $data->getPais(), $data->getNumero(), $data->getCodigo()
            );
            $stmt->execute();



            $sql = "UPDATE revista SET
            volumen          = ?,
            fechaEdicion        = ?,
            temas = ?,
            secciones        = ?
        WHERE codigo = ?";

            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param(
                    'ssssi', $data->getVolumen(), $data->getFechaEdicion(), $data->getTemas(), $data->getSecciones(), $data->getCodigo()
            );
            $stmt->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
/**
 * Función para Insertar una Revista
 * @param  Revista $data Codigo de Revista
 * 
 */
    public function Registrar($data) {
        try {
            $sql = "INSERT INTO documento
		        VALUES (?, ?, ?, ?, ?, ?,?,?)";
            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param(
                    'issssisi', $data->getCodigo(), $data->getTitulo(), $data->getLugar(), $data->getAutor(), $data->getFechaingreso(), $data->getNumpaginas(), $data->getPais(), $data->getNumero()
            );

            $stmt->execute();
            $asd = ($stmt->insert_id);

            $sql = "INSERT INTO revista
            VALUES (?, ?, ?, ?, ?)";
            $stmta = $this->mysqli->prepare($sql);
            $stmta->bind_param(
                    'issss', $asd, $data->getVolumen(), $data->getFechaEdicion(), $data->getTemas(), $data->getSecciones()
            );
            $a = $stmta->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
/**
 * Getters y Setters
 * 
 */
    public function getTemas() {
        return $this->temas;
    }

    public function getSecciones() {
        return $this->secciones;
    }

    public function setTemas($temas) {
        $this->temas = $temas;
    }

    public function setSecciones($secciones) {
        $this->secciones = $secciones;
    }

    public function getVolumen() {
        return $this->volumen;
    }

    public function getFechaEdicion() {
        return $this->fechaEdicion;
    }

    public function setVolumen($volumen) {
        $this->volumen = $volumen;
    }

    public function setFechaEdicion($fechaEdicion) {
        $this->fechaEdicion = $fechaEdicion;
    }

}
