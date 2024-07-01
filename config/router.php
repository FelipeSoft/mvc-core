<?php
class Router {
    public static array $routes = [];

    public static function get($path, $controller, $action) {
        self::$routes['GET'][$path] = [$controller, $action];
    }

    public static function post($path, $controller, $action) {
        self::$routes['POST'][$path] = [$controller, $action];
    }

    public static function init() {
        $request_method = $_SERVER['REQUEST_METHOD'];
        $request_uri = $_SERVER['REQUEST_URI'];
        $request_uri = str_replace("/" . ROOT_DIRECTORY, "", $request_uri);

        if (isset(self::$routes[$request_method][$request_uri])) {
            $route = self::$routes[$request_method][$request_uri];
            $controller_name = $route[0];
            $action = $route[1];

            require_once(__DIR__ . "/../controllers/" . $controller_name . ".php");

            $controller = new $controller_name();
            $controller->$action();
            die; 
        }

        http_response_code(404);
        echo json_encode(['error' => 'Route not found']);
        die;
    }
}
