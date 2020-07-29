<?php
namespace Core;
error_reporting(E_ALL); //задает какие ошибки попадут в отчет. E_ALL - все ошибки
ini_set('display_errors', 'on'); // разрешает отображение ошибок
session_start(); // запуск сессии
//Подклучение файла с настройками подключения к базе данных
require_once $_SERVER['DOCUMENT_ROOT'] . '/project/config/connection.php';

//регистрация автозагрузки
spl_autoload_register(function ($class){
    $classPath = realpath(dirname(__FILE__).DIRECTORY_SEPARATOR.$class.".php");
    if (file_exists($classPath) && is_readable($classPath)){
        // подключаем его, если файл имеется и мы имеем к нему доступ
        require $classPath;
    }else{
        //создать исключение!!!
        echo "Class name '{$classPath}' not found";
    }
});

// Прочитываем массив из файла с роутами в переменную:
$routes = require $_SERVER['DOCUMENT_ROOT'] . "/project/config/routes.php";
//роутер обрабатывает все наши роуты и ищет совпадение по URI
$router = new Router();
$track = $router->getTrack($routes, $_SERVER['REQUEST_URI']);

/*
 * Диспетчер будет получать объект класса Track
 * и по его данным создавать объект указанного класса, вызывать метод этого класса
 * передавая в этот метод параметры.
 */
$dispatcher = new Dispatcher();
$page = $dispatcher->getPage($track);

$view = new View();
echo $view->render($page);