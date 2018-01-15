<?php

/**
 * Clase Libro hereda de Documento
 *
 * @author casa
 */
require_once 'modelo/Documento.php';

class Libro extends Documento {

    //atributos de Documento

    public $edicion;
    public $editorial;
    public $capitulos;

    function __construct() {
        parent::__construct();
    }

    /**
     * Getters y Setters
     *
     */
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
     * Función para Listar una Revista
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
     * Función para Obtener una Revista
     * @param  String $data Codigo de Revista
     * @return StdObject  Revista
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
     * Función para Eliminar una Revista
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



            $sql = "UPDATE libro SET
            edicion          = ?,
            editorial        = ?,
            capitulos = ?
        WHERE codigo = ?";

            $stmt = $this->mysqli->prepare($sql);
            $stmt->bind_param(
                    'sssi', $data->getEdicion(), $data->getEditorial(), $data->getCapitulos(), $data->getCodigo()
            );
            $stmt->execute();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Función para Ingresar una Revista
     * @param  Revista $data Codigo de Revista
     * 
     */
    public function Registrar($data) {
        try {
            $arr = (array) $data;

            $columnas = array_keys($arr);
            echo implode(',', $columnas);
            $data = implode("','", $arr);


            $sql = "INSERT INTO documento ($columnas)
		        VALUES ('$data')";
            $stmt = $this->mysqli->query($sql);


            $stmt->execute();
            $asd = ($stmt->insert_id);
            $asd = ($stmt->insert_id);
            //var_dump($data);
            //die($asd);
            $sql = "INSERT INTO libro
            VALUES (?, ?, ?, ?)";
            $stmta = $this->mysqli->prepare($sql);
            $stmta->bind_param(
                    'isss', $asd, $data->edicion, $data->editorial, $data->capitulos
            );
            $a = $stmta->execute();
            // var_dump($stmta);
            //die($a);*/
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}
