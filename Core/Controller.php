<?php


namespace Core;


class Controller
{
    public $layout = "default";
    public $title = "title";
    public $auth;

    public function __construct()
    {
        $this->auth = Auth::getInstance();
    }

    // метод который отправляет данные в представление
    public function render($view, $data){
        return new Page($this->layout, $this->title, $view, $data);
    }

    public function view($view, $data=[]){
        return [
            $view,
            $data
        ];
    }


    public function redirect($url){
        header('Location: '.$url,true, 301);
        exit;
    }
}