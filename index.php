<?php
date_default_timezone_set('America/Lima');
require_once 'Config/Config.php';
require_once 'Config/Functions.php';
$ruta = !empty($_GET['url']) ? $_GET['url'] : "principal/index";
$array = explode("/", $ruta);
$controller = ucfirst($array[0]);
$metodo = "index";
$parametro = "";
if (!empty($array[1])) {
    if ($array[1] != "") {
        $metodo = $array[1];
    }
}
if (!empty($array[2])) {
    if ($array[2] != "") {
        for ($i = 2; $i < count($array); $i++) {
            $parametro .= $array[$i] . ",";
        }
        $parametro = trim($parametro, ",");
    }
}
require_once 'Config/App/Autoload.php';
$dirControllers = "Controllers/" . $controller . ".php";
if (file_exists($dirControllers)) {
    require_once $dirControllers;
    $controller = new $controller();
    if (method_exists($controller, $metodo)) {
        $controller->$metodo($parametro);
    } else {
        header('Location: ' . BASE_URL . 'errors');
    }
} else {
    header('Location: ' . BASE_URL . 'errors');
}
?>