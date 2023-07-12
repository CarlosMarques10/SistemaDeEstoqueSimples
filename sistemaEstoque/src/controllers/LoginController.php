<?php
namespace src\controllers;

use \core\Controller;
use src\models\Login;

class LoginController extends Controller {
    

    public function logar() {
        
        $flash = '';

        if(!empty($_SESSION['flash'])){
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        
        $this->render('/login', ['flash' => $flash]);
    }

    public function logarAction(){

        $login = new Login();
        $number = filter_input(INPUT_POST, 'number', FILTER_VALIDATE_FLOAT);
        $pass = filter_input(INPUT_POST, 'password');

        if($number && $pass){
            
            $token = $login->verifyLogin($number, $pass);
            if($token){
                $_SESSION['token'] = $token;
                $this->redirect('/');
            }else{
                $_SESSION['flash'] = 'E-mail e/ou senha nao conferem.';
                $this->redirect('/login');
            }

        }else{
            $_SESSION['flash'] = 'Digite os campos de e-mail e/ou senha';
            $this->redirect('/login');
        }


    }

    public function cadastro(){
        
        $this->render('cadastro');
    }

    public function cadastroAction(){

        $login = new Login();
        $number = filter_input(INPUT_POST, 'number');
        $pass = filter_input(INPUT_POST, 'password');

        if($number && $pass){

            if($login->numberExists($number) === false){
                $token = $login->addUser($number,$pass);
                $_SESSION['token'] = $token;
                $this->redirect('/');
            }else{
                $_SESSION['flash'] = 'Número já cadastrado';
                $this->redirect('/cadastro');
            }
            

        }else{
            $this->redirect('/cadastro');
        } 
    }


    public function sair(){

        $_SESSION['token'] = '';
        $this->redirect('/login');


    }

}