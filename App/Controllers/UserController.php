<?php


namespace App\Controllers;


use App\Models\UserModel;
use Core\Controller;

class UserController extends Controller
{
    public function register(){
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "POST"){
            $user = new UserModel();
            $user->email = $_POST['email'];
            $user->password = $_POST['password'];
            $user->save();

            if ($this->auth->auth($user->email, $user->password)){
                $this->redirect("/");
            }else{
                $this->redirect("/register/");
            }
        }
        $isAuth = $this->auth->isAuth();
        return $this->view('register', ["isAuth"=>$isAuth]);
    }

    public function login(){
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "POST"){
            $email = $_POST['email'];
            $password = $_POST['password'];
            if($this->auth->auth($email, $password)){
                $this->redirect("/");
            }else{
                $this->redirect("/login/");
            }
        }
        $isAuth = $this->auth->isAuth();
        return $this->view('login', ["isAuth"=>$isAuth]);
    }

    public function logout(){
        $this->auth->out();
        $this->redirect("/");
    }
}