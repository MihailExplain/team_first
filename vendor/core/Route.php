<?php
namespace core;
class Route
{
    static public function init(){
        $controllerName = 'Index';
        $actionName = 'index';

        $url = $_SERVER['REDIRECT_URL']??'';
        $url =ltrim($url,'/');
        $components = explode('/', $url);

        if(count($components)>2){
            self::error404();
        }

        if(!empty($components[0])){
            $controllerName = mb_strtolower($components[0]);
        }
        if(!empty($components[1])){
            $actionName = mb_strtolower($components[1]);
        }
        $controllerClass = '\\controllers\\'.ucfirst($controllerName).'Controller';
        if(!class_exists($controllerClass)){
           self::error404();
        }
        $controller = new $controllerClass();
        if(!method_exists($controller, $actionName)){
            self::error404();
        }
        $controller->$actionName();
    }
    static public function redirect($url = '/'){
        header("Location: $url");
    }

    static public function error404(){
        header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
        include('vendor/views/error404.php');
        die();
        //http_response_code(404);
    }
}