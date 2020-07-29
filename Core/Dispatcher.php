<?php


namespace Core;


class Dispatcher
{
    private $controller;
    private $controllerAction;
    private $track;

    public function getPage(Track $track){
        $this->track = $track;
        $controllerClass = "App\\Controllers\\".ucfirst($this->track->controller)."Controller";
        $this->controllerAction = $this->track->action;
        $this->controller = new $controllerClass();
        $data = $this->getDataAction();//данные полученные от конотроллера
        return $this->controller->render($data[0], $data[1]);
    }

    private function  getDataAction(){
        $data = [];
        if(empty($this->track->params)){
            $data = $this->track->params;
            $action = $this->controllerAction;
            return $this->controller->$action($data);
        }
        return $this->controller->$this->controllerAction();
    }
}