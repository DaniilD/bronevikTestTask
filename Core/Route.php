<?php


namespace Core;


class Route
{
    private $path; // url путь
    private $controller; //контроллер
    private $action; //метод обработки

    public function __construct($path, $controller, $action)
    {
        $this->path = $path;
        $this->controller = $controller;
        $this->action = $action;
    }

    public function __get($property)
    {
        // TODO: Implement __get() method.
        return $this->$property;
    }

}