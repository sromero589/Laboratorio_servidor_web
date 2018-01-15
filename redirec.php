<?php

require_once 'modelo/basededatos.php';


$controller = $_GET["c"];

// Todo esta lógica hará el papel de un FrontController
if (!isset($_REQUEST['c'])) {
    require_once "controlador/$controller.controlador.php";
    $controller = ucwords($controller) . 'Controlador';
    $controller = new $controller;
    $controller->Index();
} else {
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';

    // Instanciamos el controlador
    require_once "controlador/$controller.controlador.php";
    $controller = ucwords($controller) . 'Controlador';
    $controller = new $controller;

    // Llama la accion
    call_user_func(array($controller, $accion));
}