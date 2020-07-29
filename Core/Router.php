<?php


namespace Core;


class Router
{
    private $routes;

    public function getTrack($routes, $uri){
        //заменим :var на карманы preg_replace
        //выполним поиск по url preg_match
        $outArray = [];
        foreach ($routes as $route){
            // проверка $uri и $route
            $uri_reg = preg_replace('/:\w+/', '(\w+)', $route->path);
            if(preg_match("#^".$uri_reg."$#", $uri, $outArray)){//проверка соответствия роута и URI
                $params = array_slice($outArray, 1); // обрезаем первый эллемнта массива
                return new Track($route->controller, $route->action, $params);
            }
        }
        //создать исключение!!!
    }
}