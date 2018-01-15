<?php

require_once 'modelo/Revista.php';

class RevistaControlador {

    private $model;

    public function __CONSTRUCT() {
        $this->model = new Revista();
    }
/**
     * Función utilizada  cargar los componentes de html para Lista de Revistas
     *
     * @return html
     */
    public function Index() {
        require_once 'vista/header.php';
        require_once 'vista/revista/revista.php';
        require_once 'vista/footer.php';
    }
/**
     * Función utilizada  cargar el html para edición de Revista
     *
     * @return void
     */
    public function Crud() {
        $alm = new Revista();

        if (isset($_REQUEST['id'])) {
            $alm = $this->model->Obtener($_REQUEST['id']);

        }

        require_once 'vista/header.php';
        require_once 'vista/revista/revista-editar.php';
        require_once 'vista/footer.php';
    }
/**
     * Función utilizada  guardar un Libro
     *
     * @return html
     */
    public function Guardar() {
        $alm = new Revista();

        $alm->setCodigo($_REQUEST['codigo']);
        $alm->setTitulo($_REQUEST['titulo']);
        $alm->setLugar($_REQUEST['lugar']);
        $alm->setAutor($_REQUEST['autor']);
        $alm->setFechaingreso($_REQUEST['fechaingreso']);
        $alm->setNumpaginas($_REQUEST['paginas']);
        $alm->setPais($_REQUEST['pais']);
        $alm->setNumero($_REQUEST['numero']);
        $alm->setVolumen($_REQUEST['volumen']);
        $alm->setFechaEdicion( $_REQUEST['fechaedicion']);
        $alm->setTemas($_REQUEST['temas']);
        $alm->setSecciones($_REQUEST['secciones']);

        $alm->getCodigo() > 0 ? $this->model->Actualizar($alm) : $this->model->Registrar($alm);

        header('Location: redirec.php?c=revista');
    }
/**
     * Función utilizada  cargar los componentes de html eliminar una Revista
     *
     * @return void
     */
    public function Eliminar() {
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: redirec.php?c=revista');
    }

}
