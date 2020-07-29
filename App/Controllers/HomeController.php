<?php

namespace App\Controllers;
use App\Models\ProfileModel;
use App\Models\UserModel;
use Core\Controller;


class HomeController extends Controller
{
    public function index(){
        $profiles = ProfileModel::all();
        $isAuth = $this->auth->isAuth();
        return $this->view('main', ["profiles"=>$profiles, "isAuth" => $isAuth]);
    }
}