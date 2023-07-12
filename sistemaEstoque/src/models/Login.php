<?php
namespace src\models;

use \src\models\User;

class Login {

    public function checkLogin(){

        if(!empty($_SESSION['token'])){
            $token = $_SESSION['token'];

            $user = User::select()->where('user_token', $token)->one();
            if(count($user) > 0){

                $loggedUser = new User;
                $loggedUser->setNumber($user['user_number']);

                return $loggedUser;
            }
        }
        return false;
    }

    public function verifyLogin($number, $pass){

        $user = User::select()->where('user_number',$number)->one();

        if($user){
            if(password_verify($pass, $user['user_pass'])){
                $token = md5(time().rand(0,9999).time());
                
                User::update()
                ->set('user_token', $token)
                ->where('user_number', $number)
                ->execute();

                return $token;
            }
        }
        return false;
    }

    public function numberExists($number){

        $user = User::select()->where('user_number',$number)->one();
        return $user ? true : false;
    }

    public function addUser($number, $password){

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $token = md5(time().rand(0,9999).time());

        User::insert([
            'user_number' => $number,
            'user_pass' => $hash,
            'user_token' => $token
        ])->execute();

        return $token;
    }

    
}