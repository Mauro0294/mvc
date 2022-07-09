<?php
$path = $_SERVER['REQUEST_URI'];
$path = explode('/', $path);
$directory = "controllers/";
$classname =  ucfirst($path[1]) . "Controller";

if (!empty($path[2])) {
    $method = $path[2];
}

if (file_exists($directory . $classname . ".class.php")) {
    require_once $directory . $classname . ".class.php";
    if (method_exists($classname, $method)) {
        $controller = new $classname();
        $controller->$method();
    } else {
        echo "Method not found";
    }
} else {
    echo "Controller not found";
}
?>
