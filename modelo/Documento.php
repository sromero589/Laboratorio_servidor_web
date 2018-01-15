<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Clase Documento
 *
 * @author casa
 */
class Documento {

    //put your code here
    public $codigo;
    public $titulo;
    public $lugar;
    public $autor;
    public $fechaingreso;
    public $numpaginas;
    public $pais;
    public $numero;
    public $mysqli;

    /**
     * Constructor de la clase, genera conexión base de datos.
     */
    public function __construct() {

        try {
            $this->mysqli = BasedeDatos::Conectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Getters y Setters
     *
     * @return void
     */
    public function getCodigo() {
        return $this->codigo;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getLugar() {
        return $this->lugar;
    }

    function getAutor() {
        return $this->autor;
    }

    function getFechaingreso() {
        return $this->fechaingreso;
    }

    function getNumpaginas() {
        return $this->numpaginas;
    }

    function getPais() {
        return $this->pais;
    }

    function getNumero() {
        return $this->numero;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setLugar($lugar) {
        $this->lugar = $lugar;
    }

    function setAutor($autor) {
        $this->autor = $autor;
    }

    function setFechaingreso($fechaingreso) {
        $this->fechaingreso = $fechaingreso;
    }

    function setNumpaginas($numpaginas) {
        $this->numpaginas = $numpaginas;
    }

    function setPais($pais) {
        $this->pais = $pais;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

}
