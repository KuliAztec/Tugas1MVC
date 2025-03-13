<?php
spl_autoload_register(function ($className) {
    $className = str_replace('\\', '/', $className);
    require_once $className . '.php';
});

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'topic';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$controllerName = ucfirst($controller) . 'Controller';
$controllerClass = 'Controllers\\' . $controllerName;

if(class_exists($controllerClass)){
    $controllerObj = new $controllerClass();
    if(method_exists($controllerObj, $action)){
        $controllerObj->$action();
    } else {
        echo "Action tidak ditemukan.";
    }
} else {
    echo "Controller tidak ditemukan.";
}
?>
