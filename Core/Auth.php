<?php


namespace Core;


use App\Models\UserModel;

class Auth extends Singelton
{
    //Метод авторизации пользователя
    public function auth($email, $password){
        $users = UserModel::whereMany(["email"=>$email, "password"=>$password]);
        if(count($users) > 0){
            $user = $users[0];
            $_SESSION['is_auth'] = true;
            $_SESSION['user_id'] = $user->id;
            return true;
        }else{
            $_SESSION['is_auth'] = false;
            return false;
        }
    }

    public function getUserId(){
        if ($this->isAuth()){
            return $_SESSION['user_id'];
        }else{
            return false;
        }
    }

    //Метод для проверки аввторизирован ли пользователь
    public function isAuth(){
        if(isset($_SESSION['is_auth'])){
            return $_SESSION['is_auth'];
        }else{
            return false;
        }
    }

    //
    public function out(){
        $_SESSION = array();
    }
}