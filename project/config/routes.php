<?php
// в этом файле создаются ваши роуты

use Core\Route;

return [
    new Route("/", "home", "index"), // главная страница со всеми профайлами
    new Route("/profile/my/", "profile", "myProfile"),
    new Route("/profile/create/", "profile", "create"),// страница создания профайла
    new Route("/profile/delete/", "profile", "delete"),// url удаления профайла
    new Route("/profile/update/", "profile", "update"), // страница обновления профайла
    new Route("/profile/show/:id/", "profile", "show"),// страница с информацией об определенном профайле


    new Route('/register/', 'user', 'register'),//url для регистрации
    new Route('/login/', 'user', 'login'),//url для входа в аккаунт
    new Route('/logout/', 'user', 'logout'),//url для выхода из аккаунта

];
