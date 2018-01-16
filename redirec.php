<?php

require_once 'modelo/basededatos.php';


$controller = $_GET["c"];

// Hace el papel de un FrontController
if (!isset($_REQUEST['c'])) {
    require_once "controlador/$controller.controlador.php";
    $controller = ucwords($controller) . 'Controlador';
    $controller = new $controller;
    $controller->Index();
} else {
    // Se obtiene el controlador que se quiere cargar
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';

    // Se instancia el controlador
    require_once "controlador/$controller.controlador.php";
    $controller = ucwords($controller) . 'Controlador';
    $controller = new $controller;

    // Se llama a la acción
    call_user_func(array($controller, $accion));
}
