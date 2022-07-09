<?php
// Krijg path van de url 
$path = $_SERVER['REQUEST_URI'];

// Split de path op in een array
$path = explode('/', $path);

// De directory waar de controllers in staan
$directory = "controllers/";

// De naam van de controller
$classname =  ucfirst($path[1]) . "Controller";

// De methode die moet worden aangeroepen binnen de controller
$method = $path[2];

// Controleer of de controller bestaat
if (file_exists($directory . $classname . ".class.php")) {
    // Laad de controller
    require_once $directory . $classname . ".class.php";
    // Controleer of de methode bestaat binnen de controller
    if (method_exists($classname, $method)) {
        // Maak een nieuw object aan van de controller
        $controller = new $classname();
        // Roep de methode aan
        $controller->$method();
    } else {
        echo "Method not found";
    }
} else {
    echo "Controller not found";
}
?>
