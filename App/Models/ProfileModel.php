<?php

namespace App\Models;
use Core\Model;

class ProfileModel extends Model
{
    public $table = "profiles";

    public function getTypePhone(){
        $types = ["Домашний", "Рабочий", "Мобильный"];
        return $types[$this->phone_type];
    }

}