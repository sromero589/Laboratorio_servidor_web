<?php

require_once 'modelo/Libro.php';

class LibroControlador {

    private $model;

    public function __CONSTRUCT() {
        $this->model = new Libro();
    }

    /**
     * Función utilizada para cargar los componentes del html para libros
     *
     * @return html
     */
    public function Index() {
        require_once 'vista/header.php';
        require_once 'vista/libro/libro.php';
        require_once 'vista/footer.php';
    }

    /**
     * Función utilizada para cargar los componentes de edición del html para libros
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
     * Función utilizada para recuperar los datos ingresados en el formulario html y guardar el libro en la base de datos
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

        $alm->getCodigo() > 0 ? $this->model->Actualizar($alm) : $this->model->Registrar($alm);

        header('Location: redirec.php?c=libro');
    }
/**
     * Función utilizada para eliminar un libro y redireccionar al html libro
     *
     * @return void
     */
    public function Eliminar() {
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: redirec.php?c=libro');
    }

}
