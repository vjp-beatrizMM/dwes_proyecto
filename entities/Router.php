<?php

namespace proyecto\entities;

use Exception;

class Router
{
    private $routes;

    public function __construct()
    {
        $this->routes = [
            'GET' => [],
            'POST' => []
        ];
    }

    public static function load(string $file): Router
    {
        $router = new Router();
        require $file;
        return $router;
    }

    public function get(array $controller)
    {
        $this->routes['GET'] = $controller;
    }

    public function post(string $uri, string $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct(string $uri, string $method): string
    {
        if (array_key_exists($uri, $this->routes[$method])) {
            return $this->routes[$method][$uri];
        } else {
            throw new Exception("No se ha definido una ruta para la uri seleccionada");
        }
    }

    //Función redirect no la hacemos porque realiza lo mismo que hace header()
}
