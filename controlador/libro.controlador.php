<?php

require_once 'modelo/Libro.php';

class LibroControlador {

    private $model;

    public function __CONSTRUCT() {
        $this->model = new Libro();
    }

    /**
     * Función utilizada  cargar los componentes de html para Lista de libros
     *
     * @return html
     */
    public function Index() {
        require_once 'vista/header.php';
        require_once 'vista/libro/libro.php';
        require_once 'vista/footer.php';
    }

    /**
     * Función utilizada  cargar los componentes de Edición html para  libros
     *
     * @return html
     */
    public function Crud() {
        $alm = new Libro();

        if (isset($_REQUEST['id'])) {
            $alm = $this->model->Obtener($_REQUEST['id']);
        }

        require_once 'vista/header.php';
        require_once 'vista/libro/libro-editar.php';
        require_once 'vista/footer.php';
    }

    /**
     * Función utilizada  recuperar del formlario  de html y guardar un libro
     *
     * @return void
     */
    public function Guardar() {
        $alm = new Libro();

        $alm->setCodigo($_REQUEST['codigo']);
        $alm->setTitulo($_REQUEST['titulo']);
        $alm->setLugar($_REQUEST['lugar']);
        $alm->setAutor($_REQUEST['autor']);
        $alm->setFechaingreso($_REQUEST['fechaingreso']);
        $alm->setNumpaginas($_REQUEST['paginas']);
        $alm->setPais($_REQUEST['pais']);
        $alm->setNumero($_REQUEST['numero']);
        $alm->setEdicion($_REQUEST['edicion']);
        $alm->setEditorial($_REQUEST['editorial']);
        $alm->setCapitulos($_REQUEST['capitulos']);

        //var_dump($alm);
        // die();
        $alm->getCodigo() > 0 ? $this->model->Actualizar($alm) : $this->model->Registrar($alm);

        header('Location: redirec.php?c=libro');
    }
/**
     * Función utilizada  eliminar un libro y redireccionar
     *
     * @return void
     */
    public function Eliminar() {
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: redirec.php?c=libro');
    }

}
