<?php
require __DIR__ . "/SecureLicense/Settings/init.php";
$controllers = dirToArray(__DIR__ . "/SecureLicense/Controller");

$router = new Buki\Router();

if (!empty($controllers)) {
    foreach ($controllers as $controller) {
        $controller = basename($controller, ".php");
        if ($controller != 'index') {
            $router->any('/' . $controller, function () use ($controller) {
                require controller($controller);
            });
        } else {
            $router->get('/', function () use ($controller) {
                require controller($controller);
            });
        }
    }
}

$router->run();