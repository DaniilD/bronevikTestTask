<?php

namespace App\Controllers;
use App\Models\EmailModel;
use App\Models\PhoneModel;
use App\Models\ProfileModel;
use Core\Controller;
class ProfileController extends Controller
{
    public function myProfile(){
        if($this->auth->isAuth()){
            $user_id = $this->auth->getUserId();
            $profiles = ProfileModel::where("user_id", $user_id);
            if(count($profiles) > 0){
                $profile = $profiles[0];
                $home_phones = PhoneModel::whereMany(["profile_id"=>$profile->id, "phone_type"=>0]);
                $work_phones = PhoneModel::whereMany(["profile_id"=>$profile->id, "phone_type"=>1]);
                $mob_phones = PhoneModel::whereMany(["profile_id"=>$profile->id, "phone_type"=>2]);
                $emails = EmailModel::where("profile_id", $profile->id);

                return $this->view("myProfile", ["profile"=>$profile, "home_phones"=>$home_phones,
                    "work_phones"=>$work_phones,
                    "mob_phones"=>$mob_phones,
                    "emails"=>$emails]);
            }else{
                $this->redirect("/profile/create/");
            }
        }else{
            $this->redirect("/login/");
        }
    }

    public function create(){
        if(!$this->auth->isAuth()) $this->redirect("/login/");

        $method = $_SERVER['REQUEST_METHOD'];
        if($method == 'POST'){
            $name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $patronymic = $_POST['patronymic'];
            $main_phone = $_POST['main_phone'];
            $phone_type = $_POST['phone_type'];
            $main_email = $_POST['main_email'];
            $user_id = $this->auth->getUserId();

            $profile = new ProfileModel();
            $profile->name = $name;
            $profile->last_name = $last_name;
            $profile->patronymic = $patronymic;
            $profile->phone = $main_phone;
            $profile->email = $main_email;
            $profile->phone_type = $phone_type;
            $profile->user_id = $user_id;
            $profile->save();

            foreach ($_POST['home_phone'] as $number){
                if ($number == "") continue;
                $phone = new PhoneModel();
                $phone->number = $number;
                $phone->phone_type = 0;
                $phone->profile_id = $profile->id;
                $phone->save();
            }

            foreach ($_POST['work_phone'] as $number){
                if ($number == "") continue;
                $phone = new PhoneModel();
                $phone->number = $number;
                $phone->phone_type = 1;
                $phone->profile_id = $profile->id;
                $phone->save();
            }

            foreach ($_POST['mobile_phone'] as $number){
                if ($number == "") continue;
                $phone = new PhoneModel();
                $phone->number = $number;
                $phone->phone_type = 2;
                $phone->profile_id = $profile->id;
                $phone->save();
            }

            foreach ($_POST['emails'] as $mail){
                if ($mail == "") continue;
                $email = new EmailModel();
                $email->email = $mail;
                $email->profile_id = $profile->id;
                $email->save();
            }

            $this->redirect("/profile/my/");
        }
        return $this->view("create");
    }

    public function delete(){
        if (!$this->auth->isAuth()) $this->redirect("/login/");
        $user_id = $this->auth->getUserId();
        $profiles = ProfileModel::where("user_id", $user_id);
        foreach ($profiles as $profile){
            $profile->delete();
        }
        $this->redirect("/");
    }

    public function show($data){
        $id = $data[0];
        $profile = ProfileModel::find($id);
        $home_phones = PhoneModel::whereMany(["profile_id"=>$profile->id, "phone_type"=>0]);
        $work_phones = PhoneModel::whereMany(["profile_id"=>$profile->id, "phone_type"=>1]);
        $mob_phones = PhoneModel::whereMany(["profile_id"=>$profile->id, "phone_type"=>2]);
        $emails = EmailModel::where("profile_id", $profile->id);
        $isAuth = $this->auth->isAuth();
        return $this->view("show", ["profile"=>$profile, "home_phones"=>$home_phones,
            "work_phones"=>$work_phones,
            "mob_phones"=>$mob_phones,
            "emails"=>$emails,
            "isAuth"=>$isAuth]);
    }

    public function update(){
        if(!$this->auth->isAuth()) $this->redirect("/login/");

        $profiles = ProfileModel::where("user_id", $this->auth->getUserId());
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "POST"){
            $profile = $profiles[0];
            $name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $patronymic = $_POST['patronymic'];
            $main_phone = $_POST['main_phone'];
            $phone_type = $_POST['phone_type'];
            $main_email = $_POST['main_email'];

            $profile->name = $name;
            $profile->last_name = $last_name;
            $profile->patronymic = $patronymic;
            $profile->phone = $main_phone;
            $profile->email = $main_email;
            $profile->phone_type = $phone_type;
            $profile->save();

            $phones = PhoneModel::where("profile_id", $profile->id);
            foreach ($phones as $phone){
                $phone->delete();
            }

            $emails = EmailModel::where("profile_id", $profile->id);
            foreach ($emails as $email){
                $email->delete();
            }

            foreach ($_POST['home_phone'] as $number){
                if ($number == "") continue;
                $phone = new PhoneModel();
                $phone->number = $number;
                $phone->phone_type = 0;
                $phone->profile_id = $profile->id;
                $phone->save();
            }

            foreach ($_POST['work_phone'] as $number){
                if ($number == "") continue;
                $phone = new PhoneModel();
                $phone->number = $number;
                $phone->phone_type = 1;
                $phone->profile_id = $profile->id;
                $phone->save();
            }

            foreach ($_POST['mobile_phone'] as $number){
                if ($number == "") continue;
                $phone = new PhoneModel();
                $phone->number = $number;
                $phone->phone_type = 2;
                $phone->profile_id = $profile->id;
                $phone->save();
            }

            foreach ($_POST['emails'] as $mail){
                if ($mail == "") continue;
                $email = new EmailModel();
                $email->email = $mail;
                $email->profile_id = $profile->id;
                $email->save();
            }


            $this->redirect("/profile/my/");
        }

        if(count($profiles) > 0){
            $profile = $profiles[0];
            $home_phones = PhoneModel::whereMany(["profile_id"=>$profile->id, "phone_type"=>0]);
            $work_phones = PhoneModel::whereMany(["profile_id"=>$profile->id, "phone_type"=>1]);
            $mob_phones = PhoneModel::whereMany(["profile_id"=>$profile->id, "phone_type"=>2]);
            $emails = EmailModel::where("profile_id", $profile->id);
            return $this->view("update", ["profile"=>$profile, "home_phones"=>$home_phones,
                "work_phones"=>$work_phones,
                "mob_phones"=>$mob_phones,
                "emails"=>$emails]);
        }
        $this->redirect("/profile/create/");
    }

}